# _Hair Salon --- PHP Database_

#### _Displays hair stylists for a salon with their clientele, February 2016_

#### By _**Jared Beckler**_

## Description

_This web app will give the user the ability to add hair stylists with their clientele and update/delete certain properties._

## Setup/Installation Requirements

* _Clone the Repository_
* _In your terminal, navigate to the project's main folder and run `composer install` to get Silex, Twig, and PHPUnit installed._
* _Navigate to the project's web folder using terminal and enter `php -S localhost:8000`_
* _Open PHPMyAdmin by going to localhost:8080/phpmyadmin in your web browser_
* _In phpmyadmin choose the Import tab and choose your database file and click "Go"._
* _In your web browser enter localhost:8000 to view the web app._

**If you are not able to import the databases:**
* _Open MAMP and Start Servers_
* _In your terminal enter `/Applications/MAMP/Library/bin/mysql --host=localhost -uroot -proot`_
* _Next, enter the following commands into your mySQL shell:_
1. `CREATE DATABASE hair_salon;`
2. `USE hair_salon;`
3. `CREATE TABLE stylist (name VARCHAR(255), phone_number BIGINT(10), id serial PRIMARY KEY, client_id INT);`
4. `CREATE TABLE client (name VARCHAR(255), phone_number BIGINT(10), id serial PRIMARY KEY, stylist_id INT);`
5. `CREATE DATABASE hair_salon_test;`
6. `USE hair_salon_test;`
7. `CREATE TABLE stylist (name VARCHAR(255), phone_number BIGINT(10), id serial PRIMARY KEY, client_id INT);`
8. `CREATE TABLE client (name VARCHAR(255), phone_number BIGINT(10), id serial PRIMARY KEY, stylist_id INT);`

## Known Bugs

* _There are currently no known bugs._

## Support and contact details

_Please contact me through GitHub with any questions, comments, or concerns._

## Technologies Used

* _Composer_
* _Twig_
* _Silex_
* _PHPUnit_
* _PHP_
* _mySQL_
* _Apache Server_
* _Materialize_

### License

**This software is licensed under the MIT license.**

Copyright (c) 2016 **_Jared Beckler_**
