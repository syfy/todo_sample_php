<?php
include_once '../global_settings/global_vars.php';
include_once '../DAO/TaskDao.php';
include_once '../service/TaskServiceImpl.php';
header("Content-Type:application/json");

if (! empty($_POST['id'])) {
    
    $id = $_POST['id'];
    
    if (empty($id)) {
        ResponseHelper::response(200, " Not Found", NULL);
    } else {
        doDelete($id);
        ResponseHelper::response(200, "Done", $task);
    }
} else {
    ResponseHelper::response(400, "Invalid Request", NULL);
}

function doDelete($id){
    $taskService = new TaskServiceImpl();
    $taskToBeRemoved = $taskService->get($id);
    $taskService->delete($taskToBeRemoved);
}


?>