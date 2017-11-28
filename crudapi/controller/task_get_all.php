<?php
include_once '../global_settings/global_vars.php';
include_once '../DAO/TaskDao.php';
include_once '../service/TaskServiceImpl.php';
$taskService = new TaskServiceImpl();
$testServiceResultAll = $taskService->getAll();
$myJSON = json_encode($testServiceResultAll);

echo $myJSON?>