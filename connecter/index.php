<?php
session_start();
$connexion = mysqli_connect('localhost','root','','Taches');
if(!$connexion){
    die('erreur à la connexion');
}
if(($_SESSION['user_id'])){
    $sessionUserId = $_SESSION['user_id'];

    $select = "SELECT * FROM users WHERE id= 'sessionUserId'";
    $result = mysqli_query($connexion, $select);
    $users = mysqli_fetch_assoc($result);
    var_dump($users);
    if(($users)){ 
        
    }

}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
</head>
<body>
    <header>
        <h1>Bienvenue sur votre plateforme de gestion de tâche</h1>
    </header>
    <nav>
        <ul>
            <li><a href="tableau.php">Tableau de bord</a></li>
            <li><a href="gestion.php">Gestion des taches</a></li>
            
        </ul>
    </nav>
</body>
</html>