<?php

require_once('render.php');
renderMeta();
renderAdminHeader();
echo'<input type="text" class="text" name="identifiant" value="Identifiant">
<div class="p-container"><input type="submit" value="Résultats"></div>';
$users = array();
$sql =  "SELECT * FROM utilisateurs";
foreach  ($bdd->query($sql) as $row)
{
    array_push($users, $row['identifiant']);
}
renderFooter();
?>

<script>


</script>
