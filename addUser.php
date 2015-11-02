<?php
require_once('config.php');
require_once("render.php");
//check if not exist et password correspond
$sql = "SELECT * FROM utilisateurs WHERE identifiant = '".$_POST['identifiant']."'";
$query = $bdd->prepare($sql);
$query->execute();
$result = $query->fetchAll();

if (sizeof($result) > 0) {
    header('Location: alreadySub.php');
} else {
    $sql = "INSERT INTO utilisateurs (identifiant, motdepasse, fait) VALUES ('".$_POST['identifiant']."',' ".$_POST['motdepasse']."', '0')";
    $count = $bdd->exec($sql);
    renderMeta();
    renderHeader();

    echo '<div id="wrongIdWrapper">
        <div id="text"><h1>Nouvel identifiant créé ! </h1>
        <p>Identifiant : '.$_POST['identifiant'].'</p>
        <p>Mot de passe : '.$_POST['motdepasse'].'</p>
        <a href="newUser.php" class="button" style="text-align: center">Retour</a>
        </div>
    </div>';

    renderFooter();

}