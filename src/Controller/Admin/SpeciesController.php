<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Species Controller
 *
 * @property \App\Model\Table\SpeciesTable $Species
 */
class SpeciesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $species = $this->paginate($this->Species);

        $this->set(compact('species'));
        $this->set('_serialize', ['species']);
    }

    /**
     * View method
     *
     * @param string|null $id Species id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $species = $this->Species->get($id, [
            'contain' => ['Games', 'Subscriptions']
        ]);

        $this->set('species', $species);
        $this->set('_serialize', ['species']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $species = $this->Species->newEntity();
        if ($this->request->is('post')) {
            $species = $this->Species->patchEntity($species, $this->request->data);
            if ($this->Species->save($species)) {
                $this->Flash->success(__('The species has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The species could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('species'));
        $this->set('_serialize', ['species']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Species id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $species = $this->Species->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $species = $this->Species->patchEntity($species, $this->request->data);
            if ($this->Species->save($species)) {
                $this->Flash->success(__('The species has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The species could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('species'));
        $this->set('_serialize', ['species']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Species id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $species = $this->Species->get($id);
        if ($this->Species->delete($species)) {
            $this->Flash->success(__('The species has been deleted.'));
        } else {
            $this->Flash->error(__('The species could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
