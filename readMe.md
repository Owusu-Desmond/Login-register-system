# Login and Register system

## Installation
Install xammp and mysql on your computer.

Run the SQL syntax `CREATA DATABASE users;` in your mysql terminal to create a database.

Also run the above SQL to create a table call *logins*.
```
use users;



CREATE TABLE `logins` (
  id int(10) NOT NULL,
  Username varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
);
```

Update the following `config/config.php` file with your right database information
```
define("DB_HOST","YOUR DATABASE HOSTNAME HERE");
define("DB_USER","YOUR DATABASE USERNAME HERE");
define("DB_PASS","YOUR DATABASE PASSWORD HERE");
define("DB_NAME","YOUR DATABASE NAME HERE");

//example
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "Des@360");
define("DB_NAME", "users");

