<?php
require_once('config.php');
require_once('functions.php');
require_once('render.php');
$score = 0;
$bonnes_reponses = array();
$mauvaises_reponses = array();
$oublies_reponses = array();
foreach($_POST as $key => $value){
    foreach($value as $answer){
        $sql =  "SELECT * FROM questionsbonnereponse WHERE idQuestion =".$key." AND idReponse=".$answer." ORDER BY RAND()";
        $query = $bdd->prepare($sql);
        $query->execute();

        $result = $query->fetchAll();
        if(sizeof($result) == 1){
            array_push($bonnes_reponses, $answer);
            $score++;
        }
        else {
            array_push($mauvaises_reponses, $answer);
            $score -= 1;
        }
    }

}


$sql =  "SELECT * FROM questionsbonnereponse ORDER BY RAND()";

foreach  ($bdd->query($sql) as $row)
{
    if(!in_array($row['idReponse'], $bonnes_reponses    ))
    array_push($oublies_reponses, $row['idReponse']);
}

session_start();
$bonnes_reponses_string = implode(",", $bonnes_reponses);
$mauvaises_reponses_string = implode(",", $mauvaises_reponses);
$oublies_reponses_string = implode(",", $oublies_reponses);

$sql = "UPDATE utilisateurs SET bonnesReponses='".$bonnes_reponses_string."' , mauvaisesReponses='".$mauvaises_reponses_string."' , oubliesReponses='".$oublies_reponses_string."' , fait=1 WHERE identifiant='".$_SESSION['user']."'";
$count = $bdd->exec($sql);


// permettre à l'utilisateur de visualiser les bonnes et mauvaises réponses ainsi que son score général.
renderMeta();
renderHeader();
echo '<div id="resultats">SCORE : ' . $score;
createAnswers($bdd, $bonnes_reponses, $mauvaises_reponses, $oublies_reponses);
renderFooter();

session_destroy();

?>
