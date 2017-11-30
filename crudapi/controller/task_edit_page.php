<?php
include_once '../global_settings/global_vars.php';
include_once '../DAO/TaskDao.php';
include_once '../service/TaskServiceImpl.php';
include_once '../helpers/ResponseHelper.php';
header("Content-Type:application/json");

if (! empty($_POST['id'])) {
    $task = $_POST['task'];
    $id = $_POST['id'];
    $date = $_POST['date'];
    if (empty($task)) {
        ResponseHelper::response(200, " Not Found", NULL);
    } else {
        $taskService = new TaskServiceImpl();
        $taskToBeEdited = $taskService->get($id);
        $taskToBeEdited->setDate($date);
        $taskToBeEdited->setTask($task);
        $taskService->update($taskToBeEdited);
      //  ResponseHelper::response(200, "Done", $task);
    }
} else {
    ResponseHelper::response(400, "Invalid Request", NULL);
}






?>