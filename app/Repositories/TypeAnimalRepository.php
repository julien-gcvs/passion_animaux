<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

use App\Entity\TypeAnimal;
use ArrayObject;

class TypeAnimalRepository
{
    public function get() //retourne un ArrayObject d'objets de classe TypeAnimal
    {
      $results = DB::select("SELECT * from type_animal");

      $typeAnimals = new ArrayObject();
      foreach ($results as $result) {
        $typeAnimal = new TypeAnimal();
        $typeAnimal->setId($result->id);
        $typeAnimal->setNom($result->nom);
        $typeAnimal->setSkinType($result->peau);
        $typeAnimal->setBootstrapCouleur($result->bootstrap_color); //on construit l'objet TypeAnimal
        $typeAnimals->append($typeAnimal); // on renseigne un array de type d'animaux
      }
      return $typeAnimals;
    }

    public function getById($id) //retourne un objet de classe TypeAnimal
    {
      $result = DB::select(" SELECT * from type_animal" .
                           " WHERE id = ".$id );

      $typeAnimal = new TypeAnimal();
      $typeAnimal->setId($result[0]->id);
      $typeAnimal->setNom($result[0]->nom);
      $typeAnimal->setSkinType($result[0]->peau);
      $typeAnimal->setBootstrapCouleur($result[0]->bootstrap_color); //on construit l'objet TypeAnimal

      return $typeAnimal;
    }

    public function getNoms()
    {
      $results = DB::select(" SELECT nom from type_animal");
      $noms = array();
      $i=1;
      foreach ($results as $result) {
        $noms[$i]=$result->nom;
        $i++;
      }
      return $noms;
    }

}
