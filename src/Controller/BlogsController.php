<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;
use Cake\Routing\Router;
use Cake\Network\Email\Email;


/**
 * Blogs Controller
 *
 * @property \App\Model\Table\BlogsTable $Blogs
 */
class BlogsController extends AppController
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
        $nav_selected = ["blogs"];
        $this->Auth->allow(['list','front_listing','front_view','category_front_listing','post_comment']);
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
            'contain' => ['BlogCategories']
        ];
        $this->set('blogs', $this->paginate($this->Blogs));
        $this->set('_serialize', ['blogs']);
    }

    /**
     * View method
     *
     * @param string|null $id Blog id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => ['BlogCategories']
        ]);
        $this->set('blog', $blog);
        $this->set('_serialize', ['blog']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $blog = $this->Blogs->newEntity();
        if ($this->request->is('post')) {            
            $this->request->data['vcount'] = 0;            
            $blog = $this->Blogs->patchEntity($blog, $this->request->data);            
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'add']);
                }                    
            } else {
                $this->Flash->error(__('The blog could not be saved. Please, try again.'));
            }
        }
        $blogCategories = $this->Blogs->BlogCategories->find('list', ['limit' => 200]);
        $this->set(compact('blog', 'blogCategories'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Blog id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $blog = $this->Blogs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $blog = $this->Blogs->patchEntity($blog, $this->request->data);
            if ($this->Blogs->save($blog)) {
                $this->Flash->success(__('The blog has been saved.'));
                $action = $this->request->data['save'];
                if( $action == 'save' ){
                    return $this->redirect(['action' => 'index']);
                }else{
                    return $this->redirect(['action' => 'edit', $id]);
                }         
            } else {
                $this->Flash->error(__('The blog could not be saved. Please, try again.'));
            }
        }
        $blogCategories = $this->Blogs->BlogCategories->find('list', ['limit' => 200]);
        $this->set(compact('blog', 'blogCategories'));
        $this->set('_serialize', ['blog']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Blog id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $blog = $this->Blogs->get($id);
        if ($this->Blogs->delete($blog)) {
            $this->Flash->success(__('The blog has been deleted.'));
        } else {
            $this->Flash->error(__('The blog could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Front : Listing    
     * @return void
     */

    public function front_listing()
    {           
        if( isset($this->request->query['blog_query']) ){            
            $blogs = $this->Blogs->find('all')
                ->contain(['BlogCategories'])
                ->where(['Blogs.publish' => 1])
                ->andWhere(['OR' => ['Blogs.title LIKE' => '%' . $this->request->query['blog_query'] . '%', 'Blogs.body LIKE' => '%' . $this->request->query['blog_query'] . '%']])
                ->order(['Blogs.created' => 'DESC'])
                ->limit(3)
            ;
        }else{
            $blogs = $this->Blogs->find('all')
                ->contain(['BlogCategories'])
                ->where(['Blogs.publish' => 1])
                ->order(['Blogs.created' => 'DESC'])
                ->limit(3)
            ;
        }
        
        $this->set('blogs', $this->paginate($blogs));        
        $this->set('_serialize', ['blogs']);        
        $this->viewBuilder()->layout('blog');                
    }

    /**
     * Front : By Category Listing    
     * @return void
     */

    public function category_front_listing( $id = null )
    {            
        $this->BlogCategories = TableRegistry::get('BlogCategories');
        $blogs = $this->Blogs->find('all')
            ->contain(['BlogCategories'])
            ->where(['Blogs.publish' => 1, 'Blogs.blog_category_id' => $id])
            ->order(['Blogs.created' => 'DESC'])
        ;
        $blogCategory = $this->BlogCategories->get($id);

        $this->set(compact('blogCategory'));
        $this->set('blogs', $this->paginate($blogs));        
        $this->set('_serialize', ['blogs']);        
        $this->viewBuilder()->layout('front');                
    }

    /**
     * Front : View    
     * @return void
     */

    public function front_view( $id = null )
    {        
        $blog = $this->Blogs->find()
            ->contain(['BlogCategories'])
            ->where(['Blogs.id' => $id])
            ->first()
        ;

        if ($this->request->is(['patch', 'post', 'put'])) {
            debug($this->request->data);exit;
            $blogComment = $this->Blogs->BlogComments->patchEntity($blogComment, $this->request->data);
            if ($this->Blogs->BlogComments->save($blogComment)) {
                $this->Flash->success(__('The blog has been saved.'));
                return $this->redirect(['action' => $id, $this->request->data['blog_slug']]);
            } else {
                $this->Flash->error(__('The blog could not be saved. Please, try again.'));
            }
        }

        $this->set(compact('blog'));        
        $this->viewBuilder()->layout('blog_view');                
    }

    /**
     * Front : Post Comment    
     * @return void
     */

    public function post_comment()
    {        
        if ($this->request->is(['patch', 'post', 'put'])) {            
            $blogComment = $this->Blogs->BlogComments->newEntity();
            $this->request->data['is_public'] = 1;
            $blogComment = $this->Blogs->BlogComments->patchEntity($blogComment, $this->request->data);            
            
            if ($this->Blogs->BlogComments->save($blogComment)) {
                $this->Flash->success(__('The blog has been saved.'));                
            } else {
                $this->Flash->error(__('The blog could not be saved. Please, try again.'));
            }
            return $this->redirect(['action' => $this->request->data['blog_id'], $this->request->data['blog_slug']]);
        }else{
            return $this->redirect(['controller' => 'blog_list']);
        }
        $this->viewBuilder()->layout('');                                
    }

    /**
     * updatePublish method     
     *
     */
    public function updatePublish() 
    {
        $this->viewBuilder()->layout('');     

        $id   = $this->request->data['id'];        
        $blog = $this->Blogs->get($id);
        if($blog->publish == 1) {
            $blog->publish = 0;
            $message = __("Unpublish");
        }else{
            $blog->publish = 1;
            $message = __("Publish");
        }

        // Update is_publish
        if ($this->Blogs->save($blog)) {
            $return['message'] = __('You have successfully set as ').$message;
        } else {
            $return['message'] = __('Unable to update publish.');
        }

        echo json_encode($return);
        exit;
    }
}
