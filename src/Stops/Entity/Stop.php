<?php

namespace App\Stops\Entity;

class Stop
{
    protected $id;

    protected $nom;

    protected $numLigne;

    public function __construct($id, $nom, $idLigne)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->idLigne = $idLigne;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setIdLigne($idLigne)
    {
        $this->idLigne = $idLigne;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getIdLigne()
    {
        return $this->idLigne;
    }


    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['nom'] = $this->nom;
        $array['idLigne'] = $this->idLigne;

        return $array;
    }
}
