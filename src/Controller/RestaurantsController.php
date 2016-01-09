<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Restaurants Controller
 *
 * @property \App\Model\Table\RestaurantsTable $Restaurants
 */
class RestaurantsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Towns']
        ];
        $this->set('restaurants', $this->paginate($this->Restaurants));
        $this->set('_serialize', ['restaurants']);
    }

    public function map(){
        $restaurants = $this->Restaurants->find('all');
        $this->set('restaurants', $restaurants);
        $this->set('_serialize', ['restaurants']);
    }

    /**
     * View method
     *
     * @param string|null $id Restaurant id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $restaurant = $this->Restaurants->get($id, [
            'contain' => ['Towns', 'Orders', 'Stocks']
        ]);
        $this->set('restaurant', $restaurant);
        $this->set('_serialize', ['restaurant']);
    }
    
}
