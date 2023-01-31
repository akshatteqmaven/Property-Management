<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * PropertyComments Controller
 *
 * @property \App\Model\Table\PropertyCommentsTable $PropertyComments
 * @method \App\Model\Entity\PropertyComment[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PropertyCommentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Properties', 'Users'],
        ];
        $propertyComments = $this->paginate($this->PropertyComments);

        $this->set(compact('propertyComments'));
    }

    /**
     * View method
     *
     * @param string|null $id Property Comment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $propertyComment = $this->PropertyComments->get($id, [
            'contain' => ['Properties', 'Users'],
        ]);

        $this->set(compact('propertyComment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $propertyComment = $this->PropertyComments->newEmptyEntity();
        if ($this->request->is('post')) {
            $propertyComment = $this->PropertyComments->patchEntity($propertyComment, $this->request->getData());
            if ($this->PropertyComments->save($propertyComment)) {
                $this->Flash->success(__('The property comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property comment could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyComments->Properties->find('list', ['limit' => 200])->all();
        $users = $this->PropertyComments->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('propertyComment', 'properties', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Property Comment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $propertyComment = $this->PropertyComments->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $propertyComment = $this->PropertyComments->patchEntity($propertyComment, $this->request->getData());
            if ($this->PropertyComments->save($propertyComment)) {
                $this->Flash->success(__('The property comment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The property comment could not be saved. Please, try again.'));
        }
        $properties = $this->PropertyComments->Properties->find('list', ['limit' => 200])->all();
        $users = $this->PropertyComments->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('propertyComment', 'properties', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Property Comment id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $propertyComment = $this->PropertyComments->get($id);
        if ($this->PropertyComments->delete($propertyComment)) {
            $this->Flash->success(__('The property comment has been deleted.'));
        } else {
            $this->Flash->error(__('The property comment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
