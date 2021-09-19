DataMax Assessment
=======================

Introduction
------------
This is a simple, Application built with the Laravel framework and based on the data mapper architecture of doctrine (Not Eloquent). 

Installation
------------

Run Composer (recommended)
----------------------------
To activate the library please run the composer update at the terminal 


    cd my/project/dir
    php composer.phar self-update
    php composer.phar install



Configure your database
--------------------
I assume the database used is mysql, go to the .env file and configure the respective mysql configuration parameters to meet 

    
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=your port
    DB_DATABASE=your database
    DB_USERNAME= your username
    DB_PASSWORD=you password

Database Setup
----------------

### DOCTRINE CONFIGURATION 

Unlike the conventional active record  architecture of eloquent, this application uses a more Domain Driven Achitecture premised on doctrine, it is assumed that composer has been successfully run and the required database parameters and mysql setup has been successful. In other to create the tables in the databse please run CLI/Terminal

    php artisan doctrine:schema:create

This will create tables in the provided database

**Note: ** The built-in CLI server is *for development only*.

### Ready for use 


