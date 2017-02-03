<?php

namespace App\Lines\Entity;

class Line
{
    private $line_id;
    private $line_number;
    private $line_terminuses;
    private $line_way;
    
    public function __construct($id, $number, $terminuses, $way)
    {
        $this->line_id = $id;
        $this->line_number = $number;
        $this->line_terminuses = $terminuses;
        $this->line_way = $way;
    }
    
    public function getId()
    {
        return $this->line_id;
    }
    
    public function getNumber()
    {
        return $this->line_number;
    }
    
    public function getTerminuses()
    {
        return $this->line_terminuses;
    }
    
    public function getWay()
    {
        return $this->line_way;
    }
    
    public function setNumber($number)
    {
        $this->line_number = $number;
    }
    
    public function setTerminuses($terminuses)
    {
        $this->line_terminuses = $terminuses;
    }
    
    public function setWay($way)
    {
        $this->line_way = $way;
    }
    
    public function toArray()
    {
        $array = array();
        $array['id'] = $this->line_id;
        $array['number'] = $this->line_number;
        $array['terminuses'] = $this->line_terminuses;
        $array['way'] = $this->line_way;
        
        return $array;
    }
}