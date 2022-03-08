# Login and Register system

## Installation
Install xammp and mysql on your computer.

Run the SQL syntax `CREATA DATABASE users;` in your mysql terminat to create a database.

Also run the above SQL to create a table call *logins*.
```
use users;

-- Table structure for table `logins`

CREATE TABLE `logins` (
  id int(10) NOT NULL,
  Username varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
);```


