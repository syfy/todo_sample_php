<?php
include_once '../domain/Task.php';

class TaskBuilder
{
    private $task;
    function __construct()
    {
        
        $this->task = new Task(0, "","");
    }

    function getTask()
    {
        return $this->task;
    }

    function setId($id)
    {
        $task->setName($id);
    }

    function setName()
    {
        $task->setId($name);
    }

    function buildTask($id, $taskName,$date)
    {
        $this->task = new Task($id, $taskName,$date);
        return  $this->task ;
    }

 
    
    function reset()
    {
        $this->task = new Task(0, "");
    }
}

?>