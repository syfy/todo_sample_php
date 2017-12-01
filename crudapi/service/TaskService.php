<?php
namespace service;

use Task;

include_once '../domain/Task.php';
abstract class TaskService
{
    
    abstract public function update(Task $task);
    abstract public function create(Task $task);
    abstract public function delete(Task $task);
    abstract public function get($id);
    abstract public function getAll();
}

