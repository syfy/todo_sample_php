a sample CRUD php application for demonstrating OOP principles.

-OOP principles can be seen on the DAO and service modules of the project.

-this project makes use the environment variable "MYSQL_PORT_3306_TCP_ADDR" to make it compatible with Docker container

-included are docker-compose.yml for docker deployment

-The UI makes use of JQuery and Jqgrid library.

-The RDBMS is MySQL 4.7

usage:
	the url for the UI is.
	http://127.0.0.1/crudapi/views/
	
REST API endpoints:
[GET] 	http://127.0.0.1/crudapi/controller/task_get_all.php  -> for getting all tasks
[POST]	http://127.0.0.1/crudapi/controller/task_delete_page.php -> for deleting task
[POST]	http://127.0.0.1/crudapi/controller/task_edit_page.php -> for editing tasks
[POST]	http://127.0.0.1/crudapi/controller/task_add_page.php -> for adding new task.


note: havnt used a framework in here as specified in the task manual.


status: works on PHP 7.1.6 + MySQL 4.7 
		and Docker Version 17.06.0-ce-win19 (12801)
