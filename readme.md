/*----------------------------------------------------------------------------------------------------
| THIS IS GUIDE FOR DEMO OF ADMIN PANEL
------------------------------------------------------------------------------------------------------

Technology Used       : PHP
Framework      	      : Laravel Framework(5.2)
Database Connectivity : Mysql


Steps to run this web application:

1) Copy the folder in computers htdocs folder.
2) There is one database file for this application. Create a database with name "user_management" and import this file.
3) Please give 777 permissions to the following folders.
   	storage, bootstrap and uploads.

   	For ubuntu system :
   		- Go to the project directory and enter command.
   			- sudo chmod -R 777 'folder_name'

3) Go to the link "http://localhost/user_management/login".

Note: Make sure that computers xampp/lampp services are on.



/*----------------------------------------------------------------------------------------------
| Modules Done:
----------------------------------------------------------------------------------------------*/


1) Login Module
	
	- Any user can login to the application with correct email and password.

	- For admin credentials are as follows,

		Email    :  admin@admin.com
		Password :  123456


2) Admin Users Module
	
	- Admin can create users.

Security Concerns and permissions:

2) Password is stored using laravel frameworks encryption.


/*----------------------------------------------------------------------------------------------
| You are able to view code in following folders / files.
----------------------------------------------------------------------------------------------*/

1) Routes :
	
	app/Http/routes.php

2) Controllers:
   
   app/Http/Controllers/Admin

3) Models:
   
   app/Http/Models

4) Views: 

   resources/view/admin

5) Middlewares
	
	app/Http/Middleware/Admin   


/*---------------------------------------------------------------------------------------------------
| Thank you for reading :)
-----------------------------------------------------------------------------------------------------*/
