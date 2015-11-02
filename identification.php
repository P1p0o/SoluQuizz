<?php
require_once('config.php');

$sql =  "SELECT * FROM admin WHERE identifiant ='".$_POST['identifiant']."' AND motdepasse = '".$_POST['motdepasse']."'";
$query = $bdd->prepare($sql);
$query->execute();
$result = $query->fetchAll();
if(sizeof($result)>0){
    session_start();
    if (!isset($_SESSION['user']) && !isset($_SESSION['password'])) {
        $_SESSION['user'] = $_POST['identifiant'];
        $_SESSION['password'] = $_POST['motdepasse'];
    }
    header('Location: admin.php');
}
else {

    $sql = "SELECT * FROM utilisateurs WHERE identifiant ='" . $_POST['identifiant'] . "' AND motdepasse = '" . $_POST['motdepasse'] . "'";
    $query = $bdd->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    if (sizeof($result) <= 0) {
        header('Location: wrongId.php');
    } else {
        if ($result[0]['fait'] == 1) {
            header('Location: alreadyDone.php');
        } else {
            session_start();
            if (!isset($_SESSION['user']) && !isset($_SESSION['password'])) {
                $_SESSION['user'] = $_POST['identifiant'];
                $_SESSION['password'] = $_POST['motdepasse'];
            }
            header('Location: quizz.php');
        }

    }
}

?>