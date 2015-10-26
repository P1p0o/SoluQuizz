<?php
var_dump($_POST);

foreach($_POST as $key => $value){
    //var_dump($key);
    print($key);
    foreach($value as $answer){
        print($answer);
    }
}
?>
