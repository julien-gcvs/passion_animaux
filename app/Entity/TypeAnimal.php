<?php
namespace App\Entity;

class TypeAnimal
{
  private $id;
  private $nom;
  private $bootstrap_couleur; // un theme par type d'animal.
  private $skinType; // *on plumage est / *a fourrure est / *es ecailles ston... (On a *on/*a/*es pour pouvoir écrire par la suite "son", "ma"..) @TODO trouver quelque chose mieux?

  //Getter
  public function getId()
  {
    return $this->id;
  }
  public function getNom()
  {
    return $this->nom;
  }
  public function getBootstrapCouleur()
  {
    return $this->bootstrap_couleur;
  }
  public function getSkinType()
  {
    return $this->skinType;
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
  public function setBootstrapCouleur($newValue)
  {
    return $this->bootstrap_couleur = $newValue;
  }
  public function setSkinType($newValue)
  {
    return $this->skinType = $newValue;
  }

}
