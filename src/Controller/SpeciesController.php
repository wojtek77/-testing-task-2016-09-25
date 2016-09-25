<?php
namespace App\Controller;

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
}
