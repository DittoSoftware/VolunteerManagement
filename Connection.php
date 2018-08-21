<?php

$servername = 'localhost';
$username = 'root';
$password = 'Database';
$dbname = 'volunteer';
$options = array(PDO::MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8');

try{
    $access = new PDO("mysql:host=$servername;dbname=$dbname;", $username,$password,$options);
    
} catch (Exception $ex) 
{
   echo "Error: ".$e->getMessage(); 
}

?>
