<?php

// Database details
define('USER', '(your db username)');
define('PASSWORD', '(your db password)');
define('HOST', '(your db host name)');
define('DATABASE', '(your db name)');

// Configuration details. Error mode to 'Exceptions', turning
// off emulated prepared statements
$pdoOptions = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_EMULATE_PREPARES => false
);

// Connect to MySQL and instantiate the PDO object
$pdo = new PDO(
    "mysql:host=" . HOST . ";dbname=" . DATABASE, // DSN
    USER,
    PASSWORD,
    $pdoOptions
);

?>