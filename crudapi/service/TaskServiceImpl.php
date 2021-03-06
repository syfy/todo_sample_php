<?php
use service\TaskService;
include_once '../domain/Task.php';
include_once 'TaskService.php';
include_once '../DAO/TaskDao.php';

class TaskServiceImpl extends TaskService
{

    private $taskDao;

    function __construct()
    {
        $this->taskDao = new TaskDao();
    }

    public function getAll()
    {
        return $this->taskDao->getAll();
    }

    public function get($id)
    {
        return $this->taskDao->getOne($id);
    }

    public function update(Task $task)
    {
        $this->taskDao->update($task);
    }

    public function create(Task $item)
    {
        $this->taskDao->addNew($item);
    }

    public function delete(Task $task)
    {
        $this->taskDao->delete($task);
    }
}

?>
