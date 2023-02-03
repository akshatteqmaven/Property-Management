<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * PropertyCategories Controller
 *
 * @property \App\Model\Table\PropertyCategoriesTable $PropertyCategories
 * @method \App\Model\Entity\Propertycategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyCategoriesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    // public function index()
    // {
    //     $propertyCategories = $this->paginate($this->PropertyCategories);

    //     $this->set(compact('propertyCategories'));
    // }

    /**
     * View method
     *
     * @param string|null $id Property category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $propertycategory = $this->PropertyCategories->get($id, [
    //         'contain' => [],
    //     ]);

    //     $this->set(compact('propertycategory'));
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertycategory = $this->PropertyCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $propertycategory = $this->PropertyCategories->patchEntity($propertycategory, $this->request->getData());
            if ($this->PropertyCategories->save($propertycategory)) {
                $this->Flash->success(__('The property category has been saved.'));

                return $this->redirect(['controller' => 'Users', 'action' => 'admin']);
            }
            $this->Flash->error(__('The property category could not be saved. Please, try again.'));
        }
        $this->set(compact('propertycategory'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $propertycategory = $this->PropertyCategories->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $propertycategory = $this->PropertyCategories->patchEntity($propertycategory, $this->request->getData());
    //         if ($this->PropertyCategories->save($propertycategory)) {
    //             $this->Flash->success(__('The property category has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The property category could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('propertycategory'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Property category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $propertycategory = $this->PropertyCategories->get($id);
    //     if ($this->PropertyCategories->delete($propertycategory)) {
    //         $this->Flash->success(__('The property category has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The property category could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
