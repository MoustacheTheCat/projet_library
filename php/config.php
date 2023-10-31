<?php
ini_set('display_errors', 'On');
try
{
$db = new PDO('mysql:host=localhost; dbname=library; charset=utf8', 'admin_library', 'password');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


?>