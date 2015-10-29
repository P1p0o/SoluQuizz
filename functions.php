<?php

require_once('config.php');

function getDescQuestions($bdd, $idQuestion) {
    $sql =  "SELECT * FROM descquestions WHERE idQuestion =".$idQuestion;
    foreach  ($bdd->query($sql) as $row)
    {
        echo '<br><b>'.$row['descQuestion'] . "</b><br>";
    }
}

function getDescReponse($bdd, $idReponse){
    $sql =  "SELECT * FROM descreponses WHERE idReponse =".$idReponse;
    foreach  ($bdd->query($sql) as $row)
    {
        return $row['descReponse'] . "<br>";
    }
}


function getQuestionWithReponses($bdd, $idQuestion){
    getDescQuestions($bdd, $idQuestion);
    $sql =  "SELECT * FROM questionsreponses WHERE idQuestion =".$idQuestion." ORDER BY RAND()";
    foreach  ($bdd->query($sql) as $row)
    {
        $rep = getDescReponse($bdd,$row['idReponse']);
        echo '<br><input type="checkbox" name="' . $idQuestion .'[]" value="'. $row['idReponse'] . '">' . $rep;
    }
}

function createQuizz($bdd){
    $sql =  "SELECT * FROM questions ORDER BY RAND()";
    foreach  ($bdd->query($sql) as $row)
    {
        getQuestionWithReponses($bdd,$row['idQuestion']);
    }
}

function createAnswers($bdd, $bonnes_reponses, $mauvaises_reponses, $oublies_reponses){
    $sql =  "SELECT * FROM questions";
    foreach  ($bdd->query($sql) as $row)
    {
        getQuestionWithCorrectedReponses($bdd,$row['idQuestion'], $bonnes_reponses, $mauvaises_reponses, $oublies_reponses);
    }
}

function getQuestionWithCorrectedReponses($bdd, $idQuestion, $bonnes_reponses, $mauvaises_reponses, $oublies_reponses){
    getDescQuestions($bdd, $idQuestion);
    $sql =  "SELECT * FROM questionsreponses WHERE idQuestion =".$idQuestion;
    foreach  ($bdd->query($sql) as $row)
    {
        $rep = getDescReponse($bdd,$row['idReponse']);
        if(in_array($row['idReponse'], $bonnes_reponses))
            echo '<p style="color:green">' . $rep .'</p>';
        elseif(in_array($row['idReponse'], $mauvaises_reponses))
            echo '<p style="color:red">' . $rep .'</p>';
        elseif(in_array($row['idReponse'], $oublies_reponses))
            echo '<p style="color:blue">' . $rep .'</p>';
        else echo '<p style="color:black">' . $rep .'</p>';
    }
    echo '</br>';

    $sql =  "SELECT * FROM questionexplication WHERE idQuestion =".$idQuestion;
    foreach  ($bdd->query($sql) as $row)
    {
        $newSql = "SELECT * FROM descExplication WHERE idExplication =".$row['idExplication'];
        foreach  ($bdd->query($newSql) as $newRow){
            echo 'Explication : '.$newRow['descExplication'];
        }
    }
}

function debutForm(){
    echo '<form action="checkForm.php" method="post">';
}

function finForm(){
    echo '<input type="submit" value="Valider le test"></form>';
}

?>