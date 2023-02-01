<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * UsersProfile Controller
 *
 * @property \App\Model\Table\UsersProfileTable $UsersProfile
 * @method \App\Model\Entity\UsersProfile[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersProfileController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $usersProfile = $this->paginate($this->UsersProfile);
        $this->set(compact('usersProfile'));
    }

    /**
     * View method
     *
     * @param string|null $id Users Profile id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usersProfile = $this->UsersProfile->get($id, [
            'contain' => ['Users'],
        ]);


        $this->set(compact('usersProfile'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    // public function add()
    // {
    //     $usersProfile = $this->UsersProfile->newEmptyEntity();
    //     if ($this->request->is('post')) {
    //         $usersProfile = $this->UsersProfile->patchEntity($usersProfile, $this->request->getData());
    //         if ($this->UsersProfile->save($usersProfile)) {
    //             $this->Flash->success(__('The users profile has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The users profile could not be saved. Please, try again.'));
    //     }
    //     $users = $this->UsersProfile->Users->find('list', ['limit' => 200])->all();
    //     $this->set(compact('usersProfile', 'users'));
    // }

    /**
     * Edit method
     *
     * @param string|null $id Users Profile id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $usersProfile = $this->UsersProfile->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $usersProfile = $this->UsersProfile->patchEntity($usersProfile, $this->request->getData());
    //         if ($this->UsersProfile->save($usersProfile)) {
    //             $this->Flash->success(__('The users profile has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The users profile could not be saved. Please, try again.'));
    //     }
    //     $users = $this->UsersProfile->Users->find('list', ['limit' => 200])->all();
    //     $this->set(compact('usersProfile', 'users'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Users Profile id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usersProfile = $this->UsersProfile->get($id);
        if ($this->UsersProfile->delete($usersProfile)) {
            $this->Flash->success(__('The users profile has been deleted.'));
        } else {
            $this->Flash->error(__('The users profile could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function userStatus($id, $status)
    {
        //$this->request->allowMethod(['post']);
        $this->loadModel('Users');
        $user = $this->Users->get($id);

        if ($status == 1)
            $status = 0;
        else
            $status = 1;

        $data = array();
        $data['status'] = $status;
        $user = $this->Users->patchEntity($user, $data);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The users status has changed.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
