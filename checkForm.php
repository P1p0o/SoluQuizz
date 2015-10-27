<?php
var_dump($_POST);
require_once('config.php');
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

    $sql =  "SELECT * FROM questionsbonnereponse WHERE idQuestion =".$key." ORDER BY RAND()";
    foreach  ($bdd->query($sql) as $row)
    {
        $check = false;
        foreach($value as $answer){
            if($row['idReponse'] == $answer) $check = true;
        }
        if($check == false){
            array_push($oublies_reponses, $row['idReponse']);
            //$score -= 0.5;
        }
    }
}

session_start();

echo 'SCORE : ' . $score;

var_dump($bonnes_reponses);
var_dump($mauvaises_reponses);
var_dump($oublies_reponses);


?>
