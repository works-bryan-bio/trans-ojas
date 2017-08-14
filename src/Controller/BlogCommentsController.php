<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;

/**
 * BlogComments Controller
 *
 * @property \App\Model\Table\BlogCommentsTable $BlogComments
 */
class BlogCommentsController extends AppController
{

    /**
     * Initialize method     
     *
     */
    public function initialize()
    {
        parent::initialize();
    
        // Add the selected sidebar-menu 'active' class
        // Valid value can be found in NavigationSelectorHelper        
        $nav_selected = ["blog_comments"];        
        $this->set('nav_selected', $nav_selected);

    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Blogs']
        ];
        $this->set('blogComments', $this->paginate($this->BlogComments));
        $this->set('_serialize', ['blogComments']);
    }

    /**
     * View method
     *
     * @param string|null $id Blog Comment id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blogComment = $this->BlogComments->get($id, [
            'contain' => ['Blogs']
        ]);
        $this->set('blogComment', $blogComment);
        $this->set('_serialize', ['blogComment']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blogComment = $this->BlogComments->newEntity();
        if ($this->request->is('post')) {
            $blogComment = $this->BlogComments->patchEntity($blogComment, $this->request->data);
            if ($this->BlogComments->save($blogComment)) {
                $this->Flash->success(__('The blog comment has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The blog comment could not be saved. Please, try again.'));
            }
        }
        $blogs = $this->BlogComments->Blogs->find('list', ['limit' => 200]);
        $this->set(compact('blogComment', 'blogs'));
        $this->set('_serialize', ['blogComment']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog Comment id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blogComment = $this->BlogComments->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blogComment = $this->BlogComments->patchEntity($blogComment, $this->request->data);
            if ($this->BlogComments->save($blogComment)) {
                $this->Flash->success(__('The blog comment has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The blog comment could not be saved. Please, try again.'));
            }
        }
        $blogs = $this->BlogComments->Blogs->find('list', ['limit' => 200]);
        $this->set(compact('blogComment', 'blogs'));
        $this->set('_serialize', ['blogComment']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog Comment id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blogComment = $this->BlogComments->get($id);
        if ($this->BlogComments->delete($blogComment)) {
            $this->Flash->success(__('The blog comment has been deleted.'));
        } else {
            $this->Flash->error(__('The blog comment could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Blog comment method
     *
     * @return void
     */
    public function blog( $id = null )
    {
        $this->paginate = [
            'contain' => ['Blogs'],
            'condition' => ['Blogs.id' => $id]
        ];
        $blog = $this->BlogComments->Blogs->get($id);
        $this->set(compact('blog'));
        $this->set('blogComments', $this->paginate($this->BlogComments));
        $this->set('_serialize', ['blogComments']);
    }

    /**
     * updatePublish method     
     *
     */
    public function updatePublic() 
    {
        $this->viewBuilder()->layout('');     

        $id   = $this->request->data['id'];        
        $blogComment = $this->BlogComments->get($id);
        if($blogComment->is_public == 1) {
            $blogComment->is_public = 0;
            $message = __("Unpublish");
        }else{
            $blogComment->is_public = 1;
            $message = __("Publish");
        }

        // Update is_publish
        if ($this->BlogComments->save($blogComment)) {
            $return['message'] = __('You have successfully set as ').$message;
        } else {
            $return['message'] = __('Unable to update publish.');
        }

        echo json_encode($return);
        exit;
    }
}
