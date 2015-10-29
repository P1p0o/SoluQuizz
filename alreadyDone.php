<?php
require_once('config.php');
require_once('functions.php');
require_once('render.php');
renderMeta();
renderHeader();

echo '<div id="wrongIdWrapper">
        <div><img alt="smiley_triste" src="img/smiley_triste.jpg"></div>
        <div id="text"><h1>Oops ! </h1>
        <p>Il semblerai que vous ayez déjà réalisé ce test</p>
        <p>Cliquez ici pour revenir sur la page d\'accueil</p>
        <a href="index.php" class="button"> Page d\'accueil</a>
        </div>
    </div>';

renderFooter();
?>

