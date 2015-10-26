<?php

require_once('config.php');

function getDescQuestions($bdd, $idQuestion) {
    $sql =  "SELECT * FROM descquestions WHERE idQuestion =".$idQuestion;
    foreach  ($bdd->query($sql) as $row)
    {
        echo '<b>'.$row['descQuestion'] . "</b><br><br>";
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
        echo '<input type="checkbox" name="' . $idQuestion .'[]" value="'. $row['idReponse'] . '">' . $rep .'<br>';
    }
}

function createQuizz($bdd){
    $sql =  "SELECT * FROM questions ORDER BY RAND()";
    foreach  ($bdd->query($sql) as $row)
    {
        getQuestionWithReponses($bdd,$row['idQuestion']);
    }
}

function debutForm(){
    echo '<form action="checkForm.php" method="post">';
}

function finForm(){
    echo '<input type="submit" value="Valider le test"></form>';
}

?>