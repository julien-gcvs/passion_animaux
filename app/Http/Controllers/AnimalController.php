<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Requests\AnimalRequest;

use App\Entity\TypeAnimal;
use App\Entity\Animal;

use App\Repositories\TypeAnimalRepository;
use App\Repositories\AnimalRepository;

class AnimalController extends Controller
{
  public function create($n=-1)
  {

    $typeAnimalRep = new TypeAnimalRepository ;
    $animalRep = new AnimalRepository ;
    $view = view('ajouter_animal')
      ->withTypes($typeAnimalRep->get()) //retourne tout les types
      ->withTypesNoms($typeAnimalRep->getNoms()); //retourne seulement les noms des types, avec un array "simplifié" pour le Form::select
    if ($n!=-1) {
      $view->withAnimalUpdate($animalRep->getById($n));
    }

    return $view;
  }

  public function store(AnimalRequest $request)
  {
    $animalRep = new AnimalRepository ;

    $typeAnimal = new TypeAnimal();
    $typeAnimal->setId($request->input('type')); //on construit l'objet TypeAnimal

    $animal = new Animal();
    $animal->setNom($request->input('nom'));
    $animal->setSkin($request->input('peau'));
    $animal->setType($typeAnimal); //on construit l'objet Animal

    $animalRep->save($animal); //on stock l'objet Animal
    return $this->create();
  }

  public function update($n, AnimalRequest $request)
  {
    $animalRep = new AnimalRepository ;

    $typeAnimal = new TypeAnimal();
    $typeAnimal->setId($request->input('type')); //on construit l'objet TypeAnimal

    $animal = new Animal();
    $animal->setId($n);
    $animal->setNom($request->input('nom'));
    $animal->setSkin($request->input('peau'));
    $animal->setType($typeAnimal); //on construit l'objet Animal

    $animalRep->update($animal); //on stock l'objet Animal
    return redirect()->route('home');
  }
  public function delete($n)
  {
    $animalRep = new AnimalRepository ;
    $animalRep->delete($n);
    return redirect()->route('home');
  }
}
