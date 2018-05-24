<?php

function getAllMovies() {
     // requete
     $dsn = 'mysql:host=localhost;dbname=movies;port=3306;charset=utf8';
     $pdo = new PDO($dsn, 'root' , 'stagiaire');
     $query = $pdo->query("SELECT * FROM `movie`");
     $resultat = $query->fetchAll();
     return $resultat;
}

function getMovie($id) {
     $dsn = 'mysql:host=localhost;dbname=movies;port=3306;charset=utf8';
     $pdo = new PDO($dsn, 'root' , 'stagiaire');
     $query = $pdo->query("SELECT * FROM `movie` WHERE id = ".$id);
     $resultat = $query->fetch();
     return $resultat;
}

?>