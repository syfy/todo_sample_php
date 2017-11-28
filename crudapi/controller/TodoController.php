<?php
include_once '../global_settings/global_vars.php';
include_once '../service/TaskServiceImpl.php';


$newTask = new Task(0, "eatzs","0000-00-00");







$taskService = new TaskServiceImpl();
$testServiceResultAll = $taskService->getAll();
var_dump($testServiceResultAll);


echo "test create";
$taskService->create($newTask);


echo "test get+ update";

$testUpdate = $taskService->get(8);
$testUpdate->setTask("a");
var_dump($testUpdate);
$taskService->update($testUpdate);
//echo "test update";




echo "test delete";
$taskService->delete($testUpdate);
?>