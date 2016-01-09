<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Orders Controller
 *
 * @property \App\Model\Table\OrdersTable $Orders
 */
class OrdersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    /*
    public function index()
    {
        $this->paginate = [
            'contain' => ['Restaurants', 'Towns', 'Users']
        ];
        $this->set('orders', $this->paginate($this->Orders));
        $this->set('_serialize', ['orders']);
    }
    */

    public function index()
    {
        $session = $this->request->session();
        $produits = $session->read('produits');

        $this->set('produits', $produits);
        $this->set('_serialize', ['produits']);

        $menus = $session->read('menus');

        $this->set('menus', $menus);
        $this->set('_serialize', ['menus']);
    }

    /**
     * View method
     *
     * @param string|null $id Order id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => ['Restaurants', 'Towns', 'Users', 'MealLines', 'ProductLines']
        ]);
        $this->set('order', $order);
        $this->set('_serialize', ['order']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        if ($this->request->is('post')) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $restaurants = $this->Orders->Restaurants->find('list', ['limit' => 200]);
        $towns = $this->Orders->Towns->find('list', ['limit' => 200]);
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $this->set(compact('order', 'restaurants', 'towns', 'users'));
        $this->set('_serialize', ['order']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Order id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $order = $this->Orders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $order = $this->Orders->patchEntity($order, $this->request->data);
            if ($this->Orders->save($order)) {
                $this->Flash->success(__('The order has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The order could not be saved. Please, try again.'));
            }
        }
        $restaurants = $this->Orders->Restaurants->find('list', ['limit' => 200]);
        $towns = $this->Orders->Towns->find('list', ['limit' => 200]);
        $users = $this->Orders->Users->find('list', ['limit' => 200]);
        $this->set(compact('order', 'restaurants', 'towns', 'users'));
        $this->set('_serialize', ['order']);
    }

}
