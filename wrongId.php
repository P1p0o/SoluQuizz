<?php
require_once('config.php');
require_once('functions.php');
require_once('render.php');
renderMeta();
renderHeader();

echo '<div id="wrongIdWrapper">
        <div><img alt="smiley_triste" src="img/smiley_triste.jpg"></div>
        <div id="text"><h1>Oops ! </h1>
         <p>Il semblerai que vous vous soyez trompé dans vos identifiants</p>
        <p>Cliquez ici pour recommencer</p>
        <a href="index.php" class="button"> Retente ta chance !</a>
        </div>
    </div>';

renderFooter();
?>

