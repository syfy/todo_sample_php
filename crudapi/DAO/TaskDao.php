<?php
include_once '../global_settings/global_vars.php';
include_once '../domain/Task.php';
include_once '../domain/TaskBuilder.php';
include_once 'Dao.php';
class TaskDao implements Dao
{

        private $conn;
    function __construct()
    {
        
    }

    function addNew($item)
    {
        $newItem = $item;
        
        $conn = new mysqli(GlobalVars::$LOCAL_IP, GlobalVars::$SQL_USER, GlobalVars::$SQL_PW, GlobalVars::$DB_NAME);
        
        if ($conn->connect_error) {
            die("ERROR: Unable to connect: " . $conn->connect_error);
        }
        
        $sql = "INSERT INTO tasks (id, name,date)
       VALUES (0,'$item->task','$item->date')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function update($item)
    {

        $conn = new mysqli(GlobalVars::$LOCAL_IP, GlobalVars::$SQL_USER, GlobalVars::$SQL_PW, GlobalVars::$DB_NAME);
        
        if ($conn->connect_error) {
            die("ERROR: Unable to connect: " . $conn->connect_error);
        }
        
        $sql = "UPDATE tasks SET name = '$item->task',
 date = '$item->date' WHERE id = $item->id";
        
        if ($conn->query($sql) === TRUE) {
            echo "updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function delete($item)
    {
        $conn = new mysqli(GlobalVars::$LOCAL_IP, GlobalVars::$SQL_USER, GlobalVars::$SQL_PW, GlobalVars::$DB_NAME);
        if ($conn->connect_error) {
            die("ERROR: Unable to connect: " . $conn->connect_error);
        }
        $sql = "DELETE FROM tasks WHERE id = $item->id";
        
        if ($conn->query($sql) === TRUE) {} else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    function getOne($id)
    {
        $taskBuilder = new TaskBuilder();
        
        $conn = new mysqli(GlobalVars::$LOCAL_IP, GlobalVars::$SQL_USER, GlobalVars::$SQL_PW, GlobalVars::$DB_NAME);
        
        if ($conn->connect_error) {
            die("ERROR: Unable to connect: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM tasks  WHERE id = $id LIMIT 1";
        
        $result = $conn->query($sql);
        
        while ($row = $result->fetch_assoc()) {
            
            $taskBuilder->buildTask($row["id"], $row["name"], $row["date"]);
        }
        
        return $taskBuilder->getTask();
    }

    function getAll()
    {
        $taskBuilder = new TaskBuilder();
        $list = array();
        $conn = new mysqli(GlobalVars::$LOCAL_IP, GlobalVars::$SQL_USER, GlobalVars::$SQL_PW, GlobalVars::$DB_NAME);
        
        if ($conn->connect_error) {
            die("ERROR: Unable to connect: " . $conn->connect_error);
        }
        
        $result = $conn->query("SELECT * FROM tasks");
        
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                
                array_push($list, $taskBuilder->buildTask($row["id"], $row["name"], $row["date"]));
            }
        } else {
            return null;
        }
        $conn->close();
        return $list;
    }
}

?>