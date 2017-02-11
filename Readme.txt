Extract the zip file to server root folder i.e. htdocs. 
The path for this mark sheet generator project should be: localhost/htdocs/Marksheet

(If you have already extracted the contents, copy/move the “Marksheet” folder to ‘hotdocs’

(Note: Do not change the folder name)

Create database with name “marksheet”

Drop all the tables within the “marksheet”

Run/Import all “marksheet.sql” with “marksheet” database selected/used.

Now, you can access the project via url: http://localhost/Marksheet/

 mechanism has been implemented in project:


Active account
	username: admin		

password: admin
	
email: pathaksabin88@gmail.com

 //Edit email of admin thorugh Edit Your Profile link in adminHome page and need to enter your email password to email the marksheet   

        Project Description:



This is a project that generates the mark sheet of students. 
User can enter any student’s records without logging in. 
But users need to login(as admin) and can view/add/edit/delete students record and generate mark sheet. 
Admins can add/delete other admins and can also send the mark sheet via email to particular students.


Setup the project in your local environment:
functions.php file comprises all the functions required in this project.
If you need to change the password for DATABASE information(user, password, database) , it can be done in constants.php file

(Notes: Bootstrap has been used to handle the project design)