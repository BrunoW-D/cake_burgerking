<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\MealForm;

/**
 * Meals Controller
 *
 * @property \App\Model\Table\MealsTable $Meals
 */
class MealsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */

    public function index()
    {
        if($this->request->is('get') && isset($_GET['id'])) {
            $session = $this->request->session();
            $session->write('restaurant', $_GET['id']);
        }

        $meals = $this->Meals->find('all');
        $this->set('meals', $meals);
        //$this->set('_serialize', ['meals']);

        $this->loadModel('MealsTypes');
        $this->loadModel('Products');

        foreach ($meals as $meal):
            $prix[$meal->id][0] = $this->MealsTypes->findByMeal_idAndType_id($meal->id, 1)->first()['prix'];
            $prix[$meal->id][1] = $this->MealsTypes->findByMeal_idAndType_id($meal->id, 2)->first()['prix'];
        endforeach;

        $this->set('prix', $prix);
        //$this->set('_serialize', ['prix']);

        $this->loadModel('Categories');

        $categories = $this->Categories->find('all');
        $this->set('categories', $categories);
        //$this->set('_serialize', ['categories']);

        //$this->set('_serialize', true);

        $form = new MealForm();

        if ($this->request->is('post')) {
            if ($form->execute($this->request->data)) {
                
                $this->Flash->success('Formulaire ok.');

                $data = $this->request->data();
                $data['type']++;
                $session = $this->request->session();

                if(null !== $session->read('menus')){
                    $menus = $session->read('menus');
                    $lng = count($menus);
                    $in = false;
                    
                    for($i = 0; $i < $lng; $i++){
                        if($menus[$i][0] === $data['id'] && $menus[$i][1] === $data['type']){
                            $menus[$i][2] += $data['qte'];
                            $in = true;
                        }
                    }
                    
                    if($in === false){
                        array_push($menus, array($data['id'], $data['type'], $data['qte']));
                    }

                } else {
                    $menus = array(array($data['id'], $data['type'], $data['qte']));
                }

                $session->write('menus', $menus);
                
                $this->Flash->success('Menu ajouté.');
            } else {
                $this->Flash->error('Il y a eu un problème lors de la soumission de votre formulaire.');
            }
        }
    }

    public function choose1($plat)
    {
        $this->loadModel('Products');
        $products = $this->Products->findAllByCategory_id(11);
        $this->set('plat', $plat);
        $this->set('_serialize', ['plat']);
        $this->set('products', $products);
        $this->set('_serialize', ['products']);

        $this->loadModel('Categories');

        $categories = $this->Categories->find('all');
        $this->set('categories', $categories);
        $this->set('_serialize', ['categories']);
    }

    public function choose2($plat, $accompagnement)
    {
        $this->loadModel('Products');
        $products = $this->Products->findAllByCategory_id(12);
        $this->set('plat', $plat);
        $this->set('_serialize', ['plat']);
        $this->set('accompagnement', $accompagnement);
        $this->set('_serialize', ['accompagnement']);
        $this->set('products', $products);
        $this->set('_serialize', ['products']);

        $this->loadModel('Categories');

        $categories = $this->Categories->find('all');
        $this->set('categories', $categories);
        $this->set('_serialize', ['categories']);
    }

    public function choose3($plat, $accompagnement, $boisson)
    {
        $this->loadModel('MealsProducts');
        $mealsProducts = $this->MealsProducts->findByMeal_idAndAccompagnement_idAndBoisson_id($plat, $accompagnement, $boisson)->first()['id'];
        
        $this->set('mealsProducts', $mealsProducts);
        $this->set('_serialize', ['mealsProducts']);

        $meal = $this->Meals->get($plat);

        $this->set('meal', $meal);
        $this->set('_serialize', ['meal']);

        $this->loadModel('MealsTypes');

        $prix[$meal->id][0] = $this->MealsTypes->findByMeal_idAndType_id($meal->id, 1)->first()['prix'];
        $prix[$meal->id][1] = $this->MealsTypes->findByMeal_idAndType_id($meal->id, 2)->first()['prix'];

        $this->set('prix', $prix);
        $this->set('_serialize', ['prix']);

        $form = new MealForm();
        
        $this->set('form', $form);

        $this->loadModel('Categories');

        $categories = $this->Categories->find('all');
        $this->set('categories', $categories);
        $this->set('_serialize', ['categories']);
    }
    
}
