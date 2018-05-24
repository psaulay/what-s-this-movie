<?php
    require_once __DIR__ . '/vendor/autoload.php';
    $loader = new Twig_Loader_Filesystem('templates'); // Dossier contenant les templates
    $twig = new Twig_Environment($loader, array(
    'cache' => false
    ));

    include "model.php"; 

    $movie = $bdd->prepare('SELECT * FROM movie WHERE title LIKE :question');
    $actor = $bdd->prepare('SELECT * FROM actor INNER JOIN movie_actor ON movie_actor.actor_id = actor.id WHERE movie_actor.movie_id = :question');
    $gender = $bdd->prepare('SELECT * FROM gender INNER JOIN movie_gender ON movie_gender.gender_id = gender.id WHERE movie_gender.movie_id = :question');
    $director = $bdd->prepare('SELECT * FROM director INNER JOIN movie_director ON movie_director.director_id = director.id WHERE movie_director.movie_id = :question');
    $connect->execute(['question' => "%".$_GET['question']."%"]);
    $questions = $connect->fetchAll();

    echo $twig->render("infosView.html", array(
        'movies' => $questions
    ));
    //$actor = $bdd->prepare('SELECT * FROM actor INNER JOIN movie_actor ON movie_actor.actor_id = actor.id WHERE movie_actor.movie_id = 1');
    //$gender = $bdd->prepare('SELECT * FROM gender INNER JOIN movie_gender ON movie_gender.gender_id = gender.id WHERE movie_gender.movie_id = 1');
    //$director = $bdd->prepare('SELECT * FROM director INNER JOIN movie_director ON movie_director.director_id = director.id WHERE movie_director.movie_id = 1');
?>
