<?php

function renderMeta(){
        echo'<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title></title>
            <link rel="stylesheet" href="style/template.css">
            <link rel="stylesheet" href="style/identification.css">
        </head>
        <body>';
}

function renderHeader(){
    echo'<div id="wrapper">
        <div id="banner">
            <div id="logo">
                <a href="http://www.solutec.fr/fr/"></a>
            </div>
        </div>';
}

function renderFooter(){
        echo'</div>
        <div id="footer">
        <div id="footer-bottom">

        </div>
        </div>
        </body>
        </html>';
}

function renderIdentification(){
    echo'<div id="identification">
            <h1>Veuillez vous identifier afin de passer le test :</h1>
                <form action="identification.php" method="post">
					<li>
						<input type="text" class="text" name="identifiant" value="Identifiant" onfocus="this.value = \'\';" onblur="if (this.value == \'\') {this.value = \'USERNAME\';}" ><a href="#" class=" icon user"></a>
					</li>
					<li>
						<input type="password" name="motdepasse" value="Mot de passe" onfocus="this.value = \'\';" onblur="if (this.value == \'\') {this.value = \'Password\';}"><a href="#" class=" icon lock"></a>
					</li>
					<div class="p-container">
                        <input type="submit"  value="SIGN IN" >
					</div>
				</form>
        </div>';
}