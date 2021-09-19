DataMax Assessment
=======================

Introduction
------------
This is a simple, Application built with the Laravel framework and based on the data mapper architecture of doctrine, This application is meant to be used as a starting place for those
looking to get their feet wet with ZF2.

Installation
------------

Run Composer (recommended)
----------------------------
To activate the library please run the composer update 


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

Web Server Setup
----------------

### DOCTRINE CONFIGURATION 

Unlike to conventional active record of eloquent, this application uses a more DOmain Driven Achitecture premised on doctrine, it is assumed that composer has successfully run and database parameters and mysql setup has been successful. In other to create the tables in the databse please run 

    php artisan doctrine:schema:create

This will create tables in the provided database

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zf2-tutorial.localhost
        DocumentRoot /path/to/zf2-tutorial/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zf2-tutorial/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
