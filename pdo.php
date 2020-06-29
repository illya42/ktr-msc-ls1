<?php

session_start();

try
{
     $bdd = new PDO('mysql:host=localhost;dbname=epitech;charset=utf8', 'root', '');
}
catch(PDOException $e)
{
     echo $e->getMessage();
}

include('profile.php');
$profile = new profile($pdo);
?>