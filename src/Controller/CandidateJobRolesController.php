<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CandidateJobRoles Controller
 *
 * @property \App\Model\Table\CandidateJobRolesTable $CandidateJobRoles
 */
class CandidateJobRolesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Candidates', 'JobRoles']
        ];
        $this->set('candidateJobRoles', $this->paginate($this->CandidateJobRoles));
        $this->set('_serialize', ['candidateJobRoles']);
    }

    /**
     * View method
     *
     * @param string|null $id Candidate Job Role id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidateJobRole = $this->CandidateJobRoles->get($id, [
            'contain' => ['Candidates', 'JobRoles']
        ]);
        $this->set('candidateJobRole', $candidateJobRole);
        $this->set('_serialize', ['candidateJobRole']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidateJobRole = $this->CandidateJobRoles->newEntity();
        if ($this->request->is('post')) {
            $candidateJobRole = $this->CandidateJobRoles->patchEntity($candidateJobRole, $this->request->data);
            if ($this->CandidateJobRoles->save($candidateJobRole)) {
                $this->Flash->success(__('The candidate job role has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The candidate job role could not be saved. Please, try again.'));
            }
        }
        $candidates = $this->CandidateJobRoles->Candidates->find('list', ['limit' => 200]);
        $jobRoles = $this->CandidateJobRoles->JobRoles->find('list', ['limit' => 200]);
        $this->set(compact('candidateJobRole', 'candidates', 'jobRoles'));
        $this->set('_serialize', ['candidateJobRole']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidate Job Role id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidateJobRole = $this->CandidateJobRoles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidateJobRole = $this->CandidateJobRoles->patchEntity($candidateJobRole, $this->request->data);
            if ($this->CandidateJobRoles->save($candidateJobRole)) {
                $this->Flash->success(__('The candidate job role has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The candidate job role could not be saved. Please, try again.'));
            }
        }
        $candidates = $this->CandidateJobRoles->Candidates->find('list', ['limit' => 200]);
        $jobRoles = $this->CandidateJobRoles->JobRoles->find('list', ['limit' => 200]);
        $this->set(compact('candidateJobRole', 'candidates', 'jobRoles'));
        $this->set('_serialize', ['candidateJobRole']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidate Job Role id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidateJobRole = $this->CandidateJobRoles->get($id);
        if ($this->CandidateJobRoles->delete($candidateJobRole)) {
            $this->Flash->success(__('The candidate job role has been deleted.'));
        } else {
            $this->Flash->error(__('The candidate job role could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
