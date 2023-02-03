<?php

declare(strict_types=1);

namespace App\Controller;

/**
 * PropertyCategories Controller
 *
 * @property \App\Model\Table\PropertyCategoriesTable $PropertyCategories
 * @method \App\Model\Entity\Propertyproperty_category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
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
     * @param string|null $id Property property_category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function view($id = null)
    // {
    //     $propertyproperty_category = $this->PropertyCategories->get($id, [
    //         'contain' => [],
    //     ]);

    //     $this->set(compact('propertyproperty_category'));
    // }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertyproperty_category = $this->PropertyCategories->newEmptyEntity();
        if ($this->request->is('post')) {
            $propertyproperty_category = $this->PropertyCategories->patchEntity($propertyproperty_category, $this->request->getData());
            if ($this->PropertyCategories->save($propertyproperty_category)) {
                $this->Flash->success(__('The property property_category has been saved.'));

                return $this->redirect(['controller' => 'Properties', 'action' => 'index']);
            }
            $this->Flash->error(__('The property property_category could not be saved. Please, try again.'));
        }
        $this->set(compact('propertyproperty_category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property property_category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function edit($id = null)
    // {
    //     $propertyproperty_category = $this->PropertyCategories->get($id, [
    //         'contain' => [],
    //     ]);
    //     if ($this->request->is(['patch', 'post', 'put'])) {
    //         $propertyproperty_category = $this->PropertyCategories->patchEntity($propertyproperty_category, $this->request->getData());
    //         if ($this->PropertyCategories->save($propertyproperty_category)) {
    //             $this->Flash->success(__('The property property_category has been saved.'));

    //             return $this->redirect(['action' => 'index']);
    //         }
    //         $this->Flash->error(__('The property property_category could not be saved. Please, try again.'));
    //     }
    //     $this->set(compact('propertyproperty_category'));
    // }

    /**
     * Delete method
     *
     * @param string|null $id Property property_category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    // public function delete($id = null)
    // {
    //     $this->request->allowMethod(['post', 'delete']);
    //     $propertyproperty_category = $this->PropertyCategories->get($id);
    //     if ($this->PropertyCategories->delete($propertyproperty_category)) {
    //         $this->Flash->success(__('The property property_category has been deleted.'));
    //     } else {
    //         $this->Flash->error(__('The property property_category could not be deleted. Please, try again.'));
    //     }

    //     return $this->redirect(['action' => 'index']);
    // }
}
