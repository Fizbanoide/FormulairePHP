<?php

namespace App\Users\Entity;

class User
{
    protected $id;

    protected $nom;

    protected $prenom;

    protected $arretMaison;

    protected $arretTravail;

    public function __construct($id, $nom, $prenom, $arretMaison, $arretTravail)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->arretMaison = $arretMaison;
        $this->arretTravail = $arretTravail;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function setArretMaison($arretMaison)
    {
    	$this->arretMaison = $arretMaison;
    }

    public function setArretTravail($arretTravail)
    {
      $this->arretTravail = $arretTravail;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getNom()
    {
        return $this->nom;
    }

    public function getArretMaison()
    {
    	return $this->arretMaison;
    }

    public function getArretTravail()
    {
      return $this->arretTravail;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nom'] = $this->nom;
        $array['prenom'] = $this->prenom;
        $array['arretMaison'] = $this->arretMaison;
        $array['arretTravail'] = $this->arretTravail;

        return $array;
    }
}
