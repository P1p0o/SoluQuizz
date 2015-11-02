<?php

try
{
    $host = 'localhost';
    $dbname = 'soluquizz';
    $user = 'root';
    $password = 'root';

    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$user , $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}

catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

?>