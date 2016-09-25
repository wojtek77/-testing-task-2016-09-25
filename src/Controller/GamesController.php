<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Games Controller
 *
 * @property \App\Model\Table\GamesTable $Games
 */
class GamesController extends AppController
{

    /**
     * Index method
     *
     * @param int $speciesId species ID
     * @return \Cake\Network\Response|null
     */
    public function index($speciesId)
    {
        $this->paginate = [
            'contain' => ['Species', 'Publishers']
        ];
        $games = $this->paginate($this->Games->find()->where(['games.species_id' => $speciesId, 'games.quantity > 0']));

        $this->set(compact('games'));
        $this->set('_serialize', ['games']);
    }

    /**
     * Buy method
     *
     * @param string|null $id Game id.
     * @return \Cake\Network\Response|void Redirects on successful buy, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function buy($id = null)
    {
        $game = $this->Games->get($id, [
            'contain' => ['Species']
        ]);
        if ($this->request->is('post')) {
            $data = $this->request->data;
            $speciesId = $game->species->id;

            /* wysłanie emaila */
            $email = $data['email'];
            mail($email, 'Zakup gry', 'Gra została kupiona...');

            /* zapisanie subskrypcji */
            $subscriptionsTable = \Cake\ORM\TableRegistry::get('Subscriptions');
            $count = $subscriptionsTable->find()->where(['species_id' => $speciesId, 'email' => $email])->count();
            if ($count == 0) {
                $subscription = $subscriptionsTable->newEntity([
                    'species_id' => $speciesId,
                    'email' => $email,
                ]);
                $subscriptionsTable->save($subscription);
            }

            /* aktualizacja gry */
            $game->quantity = $game->quantity - 1;
            if ($this->Games->save($game)) {
                $this->Flash->success(__('Gra została kupiona.'));

                return $this->redirect(['action' => 'index', 'controller' => 'Games', $speciesId]);
            } else {
                $this->Flash->error(__('Wystąpił problem podczas kupowania gry.'));
            }
        }
        $this->set(compact('game'));
        $this->set('_serialize', ['game']);
    }
}
