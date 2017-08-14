<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FeaturedCompanies Controller
 *
 * @property \App\Model\Table\FeaturedCompaniesTable $FeaturedCompanies
 */
class FeaturedCompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Entities']
        ];
        $this->set('featuredCompanies', $this->paginate($this->FeaturedCompanies));
        $this->set('_serialize', ['featuredCompanies']);
    }

    /**
     * View method
     *
     * @param string|null $id Featured Company id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $featuredCompany = $this->FeaturedCompanies->get($id, [
            'contain' => ['Entities']
        ]);
        $this->set('featuredCompany', $featuredCompany);
        $this->set('_serialize', ['featuredCompany']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $featuredCompany = $this->FeaturedCompanies->newEntity();
        if ($this->request->is('post')) {
            $featuredCompany = $this->FeaturedCompanies->patchEntity($featuredCompany, $this->request->data);
            if ($this->FeaturedCompanies->save($featuredCompany)) {
                $this->Flash->success(__('The featured company has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The featured company could not be saved. Please, try again.'));
            }
        }
        $entities = $this->FeaturedCompanies->Entities->find('list', ['limit' => 200]);
        $this->set(compact('featuredCompany', 'entities'));
        $this->set('_serialize', ['featuredCompany']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Featured Company id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $featuredCompany = $this->FeaturedCompanies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $featuredCompany = $this->FeaturedCompanies->patchEntity($featuredCompany, $this->request->data);
            if ($this->FeaturedCompanies->save($featuredCompany)) {
                $this->Flash->success(__('The featured company has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The featured company could not be saved. Please, try again.'));
            }
        }
        $entities = $this->FeaturedCompanies->Entities->find('list', ['limit' => 200]);
        $this->set(compact('featuredCompany', 'entities'));
        $this->set('_serialize', ['featuredCompany']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Featured Company id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $featuredCompany = $this->FeaturedCompanies->get($id);
        if ($this->FeaturedCompanies->delete($featuredCompany)) {
            $this->Flash->success(__('The featured company has been deleted.'));
        } else {
            $this->Flash->error(__('The featured company could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
