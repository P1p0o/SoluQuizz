<?php
require_once('config.php');
require_once('functions.php');
require_once('render.php');
renderMeta();
renderHeader();

echo '<div id="wrongIdWrapper">
        <div><img alt="smiley_triste" src="img/smiley_triste.jpg"></div>
        <div id="text"><h1>Oops ! </h1>
        <p>Il semblerai qu\'un utilisateur porte déjà cet identifiant</p>
        <p>Cliquez ici pour inscrire à nouveau</p>
        <a href="newUser.php" class="button" style="text-align: center">Retour</a>
        </div>
    </div>';

renderFooter();
?>

