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

    public function map(){
        $restaurants = $this->Restaurants->find('all');

        $i = 0;
        foreach ($restaurants as $restaurant){
            $listeAdresse[$i] = $restaurant->adresse;
            $listeCp[$i] = $restaurant->cp;
            $listeVille[$i] = $restaurant->ville;
            //$listeLat[$i] = $restaurant->latitude;
            //$listeLng[$i] = $restaurant->longitude;
            $listeId[$i] = $restaurant->id;
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
    }
    
}
