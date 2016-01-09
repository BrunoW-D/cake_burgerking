<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Form\ProductForm;

/**
 * Products Controller
 *
 * @property \App\Model\Table\ProductsTable $Products
 */
class ProductsController extends AppController
{

    public function show($id = 10)
    {
        $this->loadModel('Categories');
        $categories = $this->Categories->find('all');
        $this->set('categories', $categories);
        $this->set('_serialize', ['categories']);

        $products = $this->Products->findAllByCategory_id($id);
        $this->set('products', $products);
        $this->set('_serialize', ['products']);

        $form = new ProductForm();
        if ($this->request->is('post')) {
            if ($form->execute($this->request->data)) {
                $data = $this->request->data();
                $session = $this->request->session();

                if(null !== $session->read('produits')){
                    $produits = $session->read('produits');
                    $lng = count($produits);
                    $in = false;
                    
                    for($i = 0; $i < $lng; $i++){
                        if($produits[$i][0] === $data['id']){
                            $produits[$i][1] += $data['qte'];
                            $in = true;
                        }
                    }
                    
                    if(!$in){
                        array_push($produits, array($data['id'], $data['qte']));
                    }

                } else {
                    $produits = array(array($data['id'], $data['qte']));
                }

                $session->write('produits', $produits);
                
                $this->Flash->success('Produit ajouté.');
            } else {
                $this->Flash->error('Il y a eu un problème lors de la soumission de votre formulaire.');
            }
        }
        $this->set('form', $form);
    }

}
