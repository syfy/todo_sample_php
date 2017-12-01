<?php
include_once '../global_settings/global_vars.php';
include_once '../DAO/TaskDao.php';
include_once '../service/TaskServiceImpl.php';

include_once '../helpers/ResponseHelper.php';

header("Content-Type:application/json");

$task = $_POST['task'];
$id = $_POST['id'];
$date = $_POST['date'];

if (! empty($task)) {
    
    if (empty($task)) {
        ResponseHelper::response(200, " Not Found", NULL);
    } else {
        $taskService = new TaskServiceImpl();
        $newTask = new Task($id, $task, $date);
        
        $taskService->create($newTask);
        ResponseHelper::response(200, "Done", $task);
    }
} else {
    ResponseHelper::response(400, "Invalid Request", NULL);
}

?>