<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 * @method \App\Model\Entity\Property[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertiesController extends AppController
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
        $properties = $this->paginate($this->Properties);

        $this->set(compact('properties'));
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $this->Model = $this->loadModel('UsersProfile');

        $property = $this->Properties->get($id, [
            'contain' => ['Users', 'PropertyComments']
        ]);

        $this->paginate = [
            'contain' => ['Users'],
        ];
        $usersProfile = $this->paginate($this->UsersProfile);

        // echo "<pre>";
        // print_r($property);
        // die;
        $this->set(compact('property', 'usersProfile'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()

    {
        $property = $this->Properties->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $propertyimage = $this->request->getData("property_image");
            $filename = $propertyimage->getClientFilename();
            $fileSize = $propertyimage->getSize();
            $data["property_image"] = $filename;
            $property = $this->Properties->patchEntity($property, $data);
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('The property has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The property could not be saved. Please, try again.'));
            }
        }
        $users = $this->Properties->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('property', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        // $propertyCategories = $this->paginate($this->PropertyCategories);
        // $this->set(compact('propertyCategories'));

        $property = $this->Properties->get($id, [
            'contain' => [],
        ]);
        $fileName2 = $property['property_image'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $propertyimage = $this->request->getData("property_image");
            $filename = $propertyimage->getClientFilename();
            $fileSize = $propertyimage->getSize();
            if ($filename == '') {
                $filename = $fileName2;
            }
            $data["property_image"] = $filename;
            $property = $this->Properties->patchEntity($property, $data);
            if ($this->Properties->save($property)) {
                $this->Flash->success(__('Your data is updated.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $users = $this->Properties->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('property', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success(__('The property has been deleted.'));
        } else {
            $this->Flash->error(__('The property could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function propertyStatus($id, $status)
    {
        $property = $this->Properties->get($id);


        if ($status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }

        $arr = array();
        $arr['status'] = $status;
        $property = $this->Properties->patchEntity($property, $arr);
        if ($this->Properties->save($property)) {
            $this->Flash->success(__('Property status has been changed.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
