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

    // non utilisée
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

        $i = 0;
        foreach ($restaurants as $restaurant){
            $listeAdresse[$i] = $restaurant->adresse;
            $listeCp[$i] = $restaurant->cp;
            $listeIdVille[$i] = $restaurant->town_id;
            //$listeLat[$i] = $restaurant->latitude;
            //$listeLng[$i] = $restaurant->longitude;
            $listeId[$i] = $restaurant->id;
            $i++;
        }

        $this->loadModel('Towns');

        $i = 0;
        foreach ($listeIdVille as $idVille) {
            $listeVille[$i] = $this->Towns->get($idVille)->nom;
            $i++;
        }

        $listeAdresse = json_encode($listeAdresse);
        $listeCp = json_encode($listeCp);
        $listeVille = json_encode($listeVille);
        $listeId = json_encode($listeId);

        $this->set('listeAdresse', $listeAdresse);
        $this->set('listeCp', $listeCp);
        $this->set('listeVille', $listeVille);
        $this->set('listeId', $listeId);
        
        //$this->set('restaurants', $restaurants);
        //$this->set('_serialize', ['restaurants']);
    }

    // non utilisée
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
