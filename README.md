# Fuel Quote Project
Overview:

This is a class project for COSC 4353 Software Design. 

Goal:

 	To create a Website, where a customer can go in and get a fuel quote.

Languages:

	-PHP,CSS,SQL

Technologies:
	
	-MySQL Workbench, XAMPP, Visual Studio Code

Database Explanation:

The Database is made up of two Tables, The Users and Orders Table.

	Table: user
		Columns:
			User_ID int(11) AI PK 
			firstName varchar(45) PK 
			lastName varchar(100) 
			Address varchar(45) 
			State varchar(45) 
			City varchar(45) 
			ZipCode varchar(45) 
			Username varchar(45) 
			Password varchar(45)
			
	Table: order
		Columns:
			Order_ID int(11) AI PK 
			User_ID int(11) PK 
			Order_total int(11) 
			Date_of_purchase datetime 
			Street_delivered_to varchar(45) 
			City_delivered_to varchar(45) 
			State_delivered_to varchar(45) 
			Zip_code_delivered_to varchar(45) 
			Gallons int(11) PK
			
How to run this project:

First clone this repo, if you are on windows go to the following folder: C:\xampp\htdocs and 
drag the folder containing the code into this location. Secondly, create the database in My SQL
Workbench. 

	Database name: POS, Keep all the other options as they are. 
	Then create the tables with the properties provided above
	
Then on your browser just got to 
	http://localhost/POS/
	
Enjoy!
