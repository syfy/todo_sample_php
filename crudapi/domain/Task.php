<?php

class Task 
{
    function __construct($idp,$taskp,$date)
    {
        $this->id = $idp;
        $this->task = $taskp;
        $this->date = $date;
    }
    
 
    public $id; // made it public because of scope problems on JsonSerialing private variables
    public $task;
    public $date;
    /**
     * @return the $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param field_type $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $task
     */
    public function getTask()
    {
        return $this->task;
    }
 

 
}
?>