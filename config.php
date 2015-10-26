<?php

try
{
    $host = 'localhost';
    $dbname = 'SoluQuizz';
    $user = 'root';
    $password = '';

    $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8',$user , $password);
}

catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

?>