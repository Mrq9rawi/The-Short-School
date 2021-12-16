<!--Name: Christian Shingiro Student No.: 7537202 -->
<!--Name: Mohammad Abdullah Student No.: -->
<!--Name: Alexander Mykitschak Student No.: -->
<?php
// set the database access info as constants
define('DB_USER', 'admin');
define('DB_PASSWORD', 'password');
define('DB_HOST', 'localhost');
define('DB_NAME', 'mykitschakshingiroabdullah_teamshort');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die('Could not connect to MySQL: ' . mysqli_connect_error() );

//Set the encoding
mysqli_set_charset($dbc, 'utf8');
?>