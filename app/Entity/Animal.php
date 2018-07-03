<?php
namespace App\Entity;

use App\Entity\TypeAnimal;

class Animal
{
  private $id;
  private $nom;
  private $skin;
  private $type;

  //Getter
  public function getId()
  {
    return $this->id;
  }
  public function getNom()
  {
    return $this->nom;
  }
  public function getSkin()
  {
    return $this->skin;
  }
  public function getType()
  {
    return $this->type;
  }

  //Setter
  public function setId($newValue)
  {
    return $this->id = $newValue;
  }
  public function setNom($newValue)
  {
    return $this->nom = $newValue;
  }
  public function setSkin($newValue)
  {
    return $this->skin = $newValue;
  }
  public function setType(TypeAnimal $newValue)
  {
    return $this->type = $newValue;
  }

  //Methods
  public function speak() {
    return "Je suis un " . $this->nom;
  }
}
