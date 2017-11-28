<?php
namespace service;

abstract class TaskService
{
    
    abstract public function update($task);
    abstract public function create($task);
    abstract public function delete($task);
    abstract public function get($id);
    abstract public function getAll();
}

