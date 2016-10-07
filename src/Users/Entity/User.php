<?php

namespace App\Users\Entity;

class User
{
    protected $id;

    protected $nom;

    protected $prenom;

    protected $adresse;

    protected $ville;

    protected $cp;

    public function __construct($id, $nom, $prenom, $adresse, $ville, $cp)
    {
        $this->id = $id;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->adresse = $adresse;
        $this->ville = $ville;
        $this->cp = $cp;
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

    public function setAdresse($adresse)
    {
    	$this->adresse = $adresse;
    }

    public function setVille($ville)
    {
      $this->ville = $ville;
    }

    public function setCp($cp)
    {
      $this->cp = $cp;
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

    public function getAdresse()
    {
    	return $this->adresse;
    }

    public function getVille()
    {
      return $this->ville;
    }

    public function getCp()
    {
      return $this->cp;
    }

    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nom'] = $this->nom;
        $array['prenom'] = $this->prenom;
        $array['adresse'] = $this->adresse;
        $array['ville'] = $this->ville;
        $array['cp'] = $this->cp;

        return $array;
    }
}
