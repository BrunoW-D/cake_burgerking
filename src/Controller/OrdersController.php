<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\I18n\Time;

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

    // page de retour de l'action add (voir Template/Orders/index.ctp)
    public function index()
    {
        /*$session = $this->request->session();
        $produits = $session->read('produits');

        $this->set('produits', $produits);
        $this->set('_serialize', ['produits']);

        $menus = $session->read('menus');

        $this->set('menus', $menus);
        $this->set('_serialize', ['menus']);*/
    }

    // non utilisée
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

    public function ajax()
    {
        if ($this->request->is('post')){
            $cart = $this->request->data('cart');
            $total = $this->request->data('total');
        }
        $session = $this->request->session();
        $session->write('cart', $cart);
        $session->write('total', $total);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $order = $this->Orders->newEntity();
        $mealLinesTable = TableRegistry::get('MealLines');
        $productLinesTable = TableRegistry::get('ProductLines');

        $session = $this->request->session();
        $auth = $this->Auth;

        $order->restaurant_id = intval($session->read('restaurant'));
        $order->town_id = intval($auth->user('ville'));
        $order->user_id = $auth->user('id');
        $order->cp = $auth->user('cp');
        $order->adresse = $auth->user('adresse');
        $order->prix = intval($session->read('total'));
        $order->date = $time = Time::now();
        $order->active = true;

        if ($this->Orders->save($order)) { 
            $id = $order->id;

            $cart = $session->read('cart');
            $cart = json_decode($cart, true);
            foreach ($cart as $product) {
                $data = $product['_data'];
                $options = $product['_options'];
                if(strpos($data['item_number'], '_') === 0){
                    $mealLine = $mealLinesTable->newEntity();
                    $mealLine->meal_id = substr($data['item_number'], 1);
                    if($options[0]['value'] == 'Normale')
                        $type = 1;
                    elseif($options[0]['value'] == 'King Size')
                        $type = 2;
                    $mealLine->meal_type_id = $type;
                    $mealLine->qte = $data['quantity'];
                    $mealLine->order_id = $id;

                    if($mealLinesTable->save($mealLine)){
                        //$this->Flash->success(__('meal ok'));
                    } else{
                        debug($mealLine);
                        $this->Flash->error(__('meal not ok'));
                    }

                } else {
                    $productLine = $productLinesTable->newEntity();
                    $productLine->product_id = $data['item_number'];
                    $productLine->qte = $data['quantity'];
                    $productLine->order_id = $id;

                    if($productLinesTable->save($productLine)){
                        //$this->Flash->success(__('product ok'));
                    } else{
                        debug($productLine);
                        $this->Flash->error(__('product not ok'));
                    }
                }
            }
            $this->request->session()->delete('cart');
            $this->request->session()->delete('total');
            $this->Flash->success(__('The order has been saved.'));
            return $this->redirect(['action' => 'index']);
        } else {
            debug($order);
            $this->Flash->error(__('The order could not be saved. Please, try again.'));
        }
        
    }

    // non utilisée
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


    // non utilisée
    public function deleteProduct($id)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $this->loadModel('Products');
        $session = $this->request->session();

        $produits = $session->read('produits');
        array_splice($produits, $i, $i-1);
                    
        $session->write('produits', $produits);
                
        return $this->redirect(['action' => 'index']);
        
    }

}
