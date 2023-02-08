<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController; //use is used to include the class.
use Cake\Event\Event;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;

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
        $this->load = $this->loadModel('Properties');

        $users = $this->paginate($this->Users, ['contain' => ['Properties']]);
        // dd($users);

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
    // ----------------------------------ended-------------------------------------------------//

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
    // ----------------------------------ended-------------------------------------------------//
    // login page forgot password function
    public function forgot()
    {
        // $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $email = $this->request->getData('email');
            $user->email = $email;
            $result = $this->Users->checkemail($email);
            if ($result) {
                $token = rand(10000, 99999);
                $result = $this->Users->insertToken($email, $token);

                $mailer = new Mailer('default');
                $mailer->setTransport('gmail'); //your email configuration name
                $mailer->setFrom(['akshatsood1234@gmail.com' => 'Code The Pixel']);
                $mailer->setTo($email);
                $mailer->setEmailFormat('html');
                $mailer->setSubject('O.T.P');
                $mailer->deliver("$token is your one time password for dragon layer");

                $this->Flash->success(__('Reset email send successfully.'));

                return $this->redirect(['action' => 'getotp']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }
    // ----------------------------------ended-------------------------------------------------//
    // function for getting the OTP
    public function getotp()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $token = $this->request->getData('token');
            $result = $this->Users->checktokenexist($token);

            if ($result) {
                $session = $this->getRequest()->getSession(); //get session
                $session->write('token', $token); //write name value to session
                return $this->redirect(['action' => 'reset']);
            }
            $this->Flash->error(__('Please enter valid password'));
            // } else {
            //     return $this->redirect(['action' => 'login']);
        }
        $this->set(compact('user'));
    }
    // ----------------------------------ended-------------------------------------------------//
    //reset password
    public function reset()
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('token') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }
        $token = $session->read('token');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $password = $this->request->getData('password');
            $result = preg_match('(^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]*).{8,}$)', $password);
            $confirm_password = $this->request->getData('confirm_password');
            if ($result == 1 && $password == $confirm_password) {
                $res = $this->Users->resetPassword($token, $password);
                if ($res) {
                    $session->destroy();
                    $this->Flash->success(__('Password updated successfully.'));
                    return $this->redirect(['action' => 'userLogin']);
                }
            }
            $this->Flash->error(__('Please enter valid password'));
        }
        $this->set(compact('user'));
    }
    public function indexpage()
    {
    }

    // -------------------------------------end here----------------------------------------------

    public function signup()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $image = $this->request->getData('users_profile.profile_image');
            $name = $image->getClientFilename();
            $fileSize = $image->getSize();
            $targetpath = WWW_ROOT . "img" . DS . $name;
            if ($name) {
                $image->moveTo($targetpath);
            }
            $user->users_profile->profile_image = $name;
            if ($this->Users->save($user)) {
                $this->Flash->success('Your are registered now');
                return $this->redirect(['action' => 'userLogin']);
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
        $this->Auth->allow(['adminLogin']);
        $this->Auth->allow(['forgot']);
        $this->Auth->allow(['reset']);
        $this->Auth->allow(['getotp']);
        $this->Auth->allow(['indexpage']);
    }
    // ----------------------------------ended-------------------------------------------------//
    //User login function
    public function adminLogin()
    {
        if ($this->request->is('post')) {
            $users = $this->Auth->identify();
            if ($users) {
                $this->Auth->setUser($users);

                if ($users['user_type'] == 0) {
                    $this->Flash->error(__('You are not autherized to login '));
                } else {
                    $this->Flash->success('You are logged in now');
                    return $this->redirect(['controller' => 'Users', 'action' => 'admin']);
                }
            }
            //not login
            $this->Flash->error('Please enter your correct login credentials');
        }
    }
    //log out function
    public function logout()
    {
        $this->Flash->success('You are Loged out now ');
        return $this->redirect($this->Auth->logout());
    }
    // ----------------------------------ended-------------------------------------------------//
    //index for users
    public function propertyListing()
    {

        $this->load = $this->loadModel('Properties');

        $this->paginate = [
            'contain' => ['Users', 'PropertyCategories'],
        ];
        $properties = $this->paginate($this->Properties);

        // dd($properties);

        $this->set(compact('properties'));
    }
    // ----------------------------------ended-------------------------------------------------//
    public function propertyListView($id = null, $property_id = null)
    {


        $this->Model = $this->loadModel('PropertyComments');
        $this->Model = $this->loadModel('Properties');

        $property = $this->Properties->get($id, [
            'contain' => ['Users', 'PropertyComments', 'PropertyCategories'],
        ]);
        $this->paginate = [
            'contain' => ['Properties', 'Users'],
        ];
        // pr($property->id);
        // die;
        $propertyComments = $this->paginate($this->PropertyComments);



        $propertyComments = $this->PropertyComments->newEmptyEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $data['property_id'] = $id;
            $data['user_id'] = $id;

            $propertyComments = $this->PropertyComments->patchEntity($propertyComments, $data);

            if ($this->PropertyComments->save($propertyComments)) {
                $this->Flash->success('Your comment is saved');
                return $this->redirect(['action' => 'propertyListing']);
            }
            $this->Flash->error(__('The property comment could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyComments->Properties->find('list', ['limit' => 200])->all();
        $users = $this->PropertyComments->Users->find('list', ['limit' => 200])->all();



        $this->set(compact('property', 'propertyComments', 'properties', 'users'));
    }
    // ----------------------------------ended-------------------------------------------------//
    public function admin()
    {
    }
    // ----------------------------------ended-------------------------------------------------//
    public function userStatus($id, $status)
    {
        $this->request->allowMethod(['post']);
        $user = $this->Users->get($id);

        if (
            $status == 0
        ) {
            $user->status = 1;
        } else {
            $user->status = 0;
        }

        if ($this->Users->save($user)) {
            $this->Flash->success(__('The users status has changed.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    // --------------------------user Login------------------------------------------
    public function userLogin()
    {
        if ($this->request->is('post')) {
            $users = $this->Auth->identify();
            if ($users) {
                $this->Auth->setUser($users);

                if ($users['status'] == 1) {
                    $this->Flash->error(__('you have no permission to login'));
                } else if ($users['user_type'] == 1) {
                    $this->Flash->error(__('You are not autherized to login '));
                } else {
                    $this->Flash->success('You are logged in now');
                    return $this->redirect(['controller' => 'Users', 'action' => 'propertyListing']);
                }
            }
            //not login
            $this->Flash->error('Please enter your correct login credentials');
        }
    }
    // ----------------------------------ended-------------------------------------------------//

}
