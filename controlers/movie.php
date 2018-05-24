<?php

require 'models/movies.php';
require_once 'vendor/autoload.php';

function indexPage() {
     $films = getAllMovies();
     
     $loader = new Twig_Loader_Filesystem('templates');
     $twig = new Twig_Environment($loader);

     echo $twig->render('index.html', array(
          'movies' => $films
     ));
}

function detailPage($id) {
     $film = getMovie($id);
     
     $loader = new Twig_Loader_Filesystem('templates');
     $twig = new Twig_Environment($loader);

     echo $twig->render('detail.html', array(
          'movie' => $film
     ));
}

?>     