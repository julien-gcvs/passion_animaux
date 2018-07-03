<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entity\TypeAnimal;
use App\Entity\Animal;

use App\Repositories\TypeAnimalRepository;
use App\Repositories\AnimalRepository;

use ArrayObject;

class ListingController extends Controller
{
  public function index()
  {
    $animalRep = new AnimalRepository;
    /*
    $animals = new ArrayObject();
    $animalsGet=$animalRep->get();
    foreach ($animalsGet as $animalGet) {
      $typeAnimal = new TypeAnimal();
      $typeAnimal->setNom($animalGet->type_nom);
      $typeAnimal->setSkinType($animalGet->type_peau);
      $typeAnimal->setBootstrapCouleur($animalGet->bootstrap_color); //on construit l'objet TypeAnimal

      $animal = new Animal();
      $animal->setId($animalGet->id);
      $animal->setNom($animalGet->nom);
      $animal->setSkin($animalGet->peau);
      $animal->setType($typeAnimal); //on construit l'objet Animal

      $animals->append($animal); // on renseigne un array d'animaux
    }*/
    return view('listing')
      ->withAnimals($animalRep->get());
  }
}
