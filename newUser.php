<?php

require_once('render.php');
renderMeta();
renderAdminHeader();
echo '<form action="addUser.php" method="post">
    <li>
    <input type="text" class="text" name="identifiant" value="Identifiant" onfocus="this.value = \'\';" onblur="if (this.value == \'\') {this.value = \'USERNAME\';}" ><a href="#" class=" icon user"></a>
    </li>
    <li>
    <input type="password" name="motdepasse" value="Mot de passe" onfocus="this.value = \'\';" onblur="if (this.value == \'\') {this.value = \'Password\';}"><a href="#" class=" icon lock"></a>
    </li>
    <div class="p-container"><input type="submit" value="Ajouter"></div>
</form>';
renderFooter();