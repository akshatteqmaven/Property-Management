<?php

declare(strict_types=1);

namespace App\Controller;


/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Properties', 'PropertyComments', 'UsersProfile'],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function signup()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $image = $this->request->getData('users_profile.profile_image');
            $name = $image->getClientFilename();
            $path = WWW_ROOT . "img" . DS . $name;
            if ($name)
                $image->moveTo($path);
            $user->usersprofile->profile_image = $name;
            if ($this->Users->save($user)) {
                $this->Flash->success('Your are registered now');
            } else {
                $this->Flash->error('Something went wrong');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialzie', ['user']);
    }
    public function beforeFilter($event)
    {
        $this->Auth->allow(['signup']);
        $this->Auth->allow(['userLogin']);
        $this->Auth->allow(['adminlogin']);
        // $this->Auth->allow(['forgot']);
        // $this->Auth->allow(['reset']);
        // $this->Auth->allow(['getotp']);
        $this->Auth->allow('logout');
    }
    //User login function
    public function userLogin()
    {
        if ($this->request->is('post')) {
            $users = $this->Auth->identify();
            if ($users) {
                $this->Auth->setUser($users);
                $this->Flash->success('You are logged in now');
                return $this->redirect(['controller' => 'users']);
            }
            //not login
            $this->Flash->error('Please enter your correct login credentials');
        }
    }
    //admin login function
    public function adminlogin()
    {
    }
    public function logout()
    {
        $this->Flash->success('You are Loged out now ');
        return $this->redirect($this->Auth->logout());
    }
}
