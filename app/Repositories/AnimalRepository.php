<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Entity\Animal;
use App\Entity\TypeAnimal;
use ArrayObject;

class AnimalRepository
{
    public function save(Animal $animal)
    {
      DB::insert("insert into animal (nom, peau, type) values (?, ?, ?)", [$animal->getNom(), $animal->getSkin(), $animal->getType()->getId()]);
    }
    public function update(Animal $animal)
    {
      DB::update("update animal set nom = ?, peau = ?, type = ? where id = ?", [$animal->getNom(), $animal->getSkin(),$animal->getType()->getId(), $animal->getId()]);
    }
    public function delete($id)
    {
      DB::table('animal')->where('id', '=', $id)->delete();
    }
    public function get() //retourne tout les animaux sous forme d'un array d'objet de classe Animal
    {
      $results = DB::select(" SELECT a.id, "           .
                               " a.nom,"               .
                               " a.peau,"              .
                               " ta.bootstrap_color,"  .
                               " ta.id   AS type_id,"  .
                               " ta.nom  AS type_nom," .
                               " ta.peau AS type_peau" .
                        " FROM animal a" .
                        " JOIN type_animal ta ON type = ta.id");

      //'conversion' vers ArrayObject<Animal>
      $animals = new ArrayObject();
      foreach ($results as $result) {
        $typeAnimal = new TypeAnimal();
        $typeAnimal->setId($result->type_id);
        $typeAnimal->setNom($result->type_nom);
        $typeAnimal->setSkinType($result->type_peau);
        $typeAnimal->setBootstrapCouleur($result->bootstrap_color); //on construit l'objet TypeAnimal

        $animal = new Animal();
        $animal->setId($result->id);
        $animal->setNom($result->nom);
        $animal->setSkin($result->peau);
        $animal->setType($typeAnimal); //on construit l'objet Animal

        $animals->append($animal); // on renseigne un array d'animaux
      }
      return $animals;
    }

    public function getById($id) //retourne un objet de classe Animal
    {
      $result = DB::select(" SELECT a.id, "            .
                               " a.nom,"               .
                               " a.peau,"              .
                               " ta.bootstrap_color,"  .
                               " ta.id   AS type_id,"  .
                               " ta.nom  AS type_nom," .
                               " ta.peau AS type_peau" .
                           " FROM animal a" .
                           " JOIN type_animal ta ON type = ta.id" .
                           " WHERE a.id = ".$id );

      $typeAnimal = new TypeAnimal();
      $typeAnimal->setId($result[0]->type_id);
      $typeAnimal->setNom($result[0]->type_nom);
      $typeAnimal->setSkinType($result[0]->type_peau);
      $typeAnimal->setBootstrapCouleur($result[0]->bootstrap_color); //on construit l'objet TypeAnimal

      $animal = new Animal();
      $animal->setId($result[0]->id);
      $animal->setNom($result[0]->nom);
      $animal->setSkin($result[0]->peau);
      $animal->setType($typeAnimal); //on construit l'objet Animal

      return $animal;
    }
}
