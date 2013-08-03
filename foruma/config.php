<?php
/******************************************************
------------------Required Configuration---------------
Please edit the following variables so the forum can
work correctly.
******************************************************/

//We log to the DataBase
$dbhost = "localhost";
$dbname = "proj";
$dbuser = "root";
$dbpass = "";

mysql_connect ( $dbhost, $dbuser, $dbpass)or die("Could not connect: ".mysql_error());
mysql_select_db($dbname) or die(mysql_error());

//Username of the Administrator
$admin='admin';

/******************************************************
-----------------Optional Configuration----------------
******************************************************/

//Forum Home Page
$url_home = 'index.php';

//Design Name
$design = 'default';


/******************************************************
----------------------Initialization-------------------
******************************************************/
include('init.php');
?>