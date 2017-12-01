a sample CRUD php application for demonstrating OOP principles.

-OOP principles can be seen on the DAO and service modules of the project.

-this project makes use the environment variable "MYSQL_PORT_3306_TCP_ADDR" to make it compatible with Docker container

-included are docker-compose.yml for docker deployment

usage and installation
-----------------------
using docker.


1.-use docker-compose up on crudapi folder.

2. http://127.0.0.1/crudapi/views/

note:
-the application may take a while to load since it will initialize the schema.
-please don ot change the default password of the docker-compose.yml as the database initialization script uses a hardcoded user and password for previllage escalation.
-------------------------------------------------------------


(bare metal installation):

1. paste the entire crudapi folder into the web server directory ei htdocs.
2. change the database settings in the \crudapi\global_settings.
3. install / import the mysql database located in the db.sql.
4. add MYSQL_PORT_3306_TCP_ADDR to the environment variable with the value of local host.
5. Run the lamp or xampp.
6. access the UI http://127.0.0.1/crudapi/views/
-----------------------------



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
