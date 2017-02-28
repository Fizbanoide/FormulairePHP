<?php

namespace App\LineStop\Entity;

class LineStop
{
    private $linestop_id;
    private $linestop_lineid;
    private $linestop_stopid;
    
    public function __construct($id, $lineid, $stopid)
    {
        $this->linestop_id = $id;
        $this->linestop_lineid = $lineid;
        $this->linestop_stopid = $stopid;
    }
    
    public function getId()
    {
        return $this->linestop_id;
    }
    
    public function getLineId()
    {
        return $this->linestop_lineid;
    }
    
    public function getStopId()
    {
        return $this->linestop_stopid;
    }
    
    public function setLineId($lineid)
    {
        $this->linestop_lineid = $lineid;
    }
    
    public function setStopId($stopid)
    {
        $this->linestop_stopid = $stopid;
    }
    
    public function toArray()
    {
        $array = array();
        $array['id'] = $this->linestop_id;
        $array['id_line'] = $this->linestop_lineid;
        $array['id_stop'] = $this->linestop_stopid;
        
        return $array;
    }
}