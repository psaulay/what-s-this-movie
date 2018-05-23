<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('templates'); // Dossier contenant les templates
    $twig = new Twig_Environment($loader, array(
    'cache' => false
    ));

    include "model.php"; 

    $connect = $bdd->prepare('SELECT * FROM movie WHERE title LIKE :question');
    $connect->execute(['question' => "%".$_GET['question']."%"]);
    $questions = $connect->fetchAll();

    echo $twig->render("infosView.html", array(
        'movies' => $questions
    ));
?>
