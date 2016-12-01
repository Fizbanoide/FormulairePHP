<?php

namespace App\Hours\Entity;

class Hour
{
    protected $id;

    protected $idStop;

    protected $idLigne;

    protected $way;

    protected $hour;

    public function __construct($id, $idStop, $idLigne, $way, $hour)
    {
        $this->id = $id;
        $this->idStop = $idStop;
        $this->idLigne = $idLigne;
        $this->way = $way;
        $this->hour = $hour;
    }


    public function setNom($stop)
    {
        $this->idStop = $stop;
    }

    public function setIdLigne($idLigne)
    {
        $this->idLigne = $idLigne;
    }

    public function setWay($way)
    {
      $this->way = $way;
    }

    public function setHour($hour)
    {
      $this->hour = $hour;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getNom()
    {
        return $this->idStop;
    }
    public function getIdLigne()
    {
        return $this->idLigne;
    }

    public function getWay()
    {
      return $this->way;
    }

    public function getHour()
    {
      return $this->hour;
    }


    public function toArray()
    {
        $array = array();
        $array['id'] = $this->id;
        $array['idNom'] = $this->idStop;
        $array['idLigne'] = $this->idLigne;
        $array['way'] = $this->way;
        $array['hour'] = $this->hour;

        return $array;
    }
}
