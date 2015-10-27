<?php

require_once('config.php');
$sql =  "SELECT * FROM utilisateurs WHERE identifiant ='".$_POST['identifiant']."' AND motdepasse = '".$_POST['motdepasse']."'";
echo $sql;
$query = $bdd->prepare($sql);
$query->execute();
$result = $query->fetchAll();
var_dump($result);
if(sizeof($result) <= 0){
    echo 'Mauvais identifiants';
}
else{
    session_start();
    if (!isset($_SESSION['user']) && !isset($_SESSION['password'])) {
        $_SESSION['user'] = $_POST['identifiant'];
        $_SESSION['password'] = $_POST['motdepasse'];
    }
    header('Location: quizz.php');
}

?>