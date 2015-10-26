<?php
    require_once('config.php');
    require_once('functions.php');
    require_once('render.php');
    renderMeta();
    renderHeader();

    debutForm();
    createQuizz($bdd);
    finForm();

    renderFooter();
?>

