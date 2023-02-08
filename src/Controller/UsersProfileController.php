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
        $uid = $this->Auth->user('id');
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $usersProfile = $this->paginate($this->UsersProfile);

        $this->set(compact('usersProfile', 'uid'));

        $status = $this->request->getQuery('status');
        //  dd($status);
        if ($status == null) {
            $usersProfile = $this->UsersProfile->find('all')->contain(['Users']);
        } else {
            $usersProfile = $this->UsersProfile->find('all')->contain(['Users'])->where(['status' => $status]);
        }

        if ($this->request->is('ajax')) {
            //$usersProfile = $this->paginate($this->users);
            $this->set(compact('usersProfile'));
            // start code will work in case of json return from here
            //     echo json_encode($users);
            //    die;
            // end code will work in case of json return from here

            // start code will work in case of element rander from here
            $this->autoRender = false;

            $this->layout = false;
            $this->render('/element/flash/userlist');
            // end code will work in case of element rander from here
        }
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

        if ($status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $data = array();
        $data['status'] = $status;
        $user = $this->Users->patchEntity($user, $data);
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The users status has changed.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
