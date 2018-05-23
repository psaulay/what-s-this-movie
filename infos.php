<?php
    require "connect.php";
    
    $reponse = $bdd->prepare('SELECT * FROM movie WHERE title LIKE :question');
    //var_dump($_POST['question']); die();
    $reponse->execute(['question' => "%".$_GET['question']."%"]);
    $results = $reponse->fetchAll();
    foreach ($results as $result){
        echo '<center>';
        echo '<p>'.$result['title'].'</p>';
        echo '<img src="img/'.$result['title'].'.jpg">';
        echo '<p>'.$result['description'];
        echo '</center>';
    }

?>