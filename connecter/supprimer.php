<?php
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'Taches');
if (!$connexion) {
    die('Erreur à la connexion');
} else{
    echo "Connexion réussie";
}
if(!empty($_SESSION['user_id'])){
    $sessionUserId = $_SESSION['user_id'];
    $select = "SELECT * FROM users WHERE id= 'sessionUserId'";
    $result = mysqli_query($connexion, $select);
    $users = mysqli_fetch_assoc($result);
    if($users){

    }else{
        die("utilisateurs inconnu");
    }
}
if(!empty($_GET['id'])) {
    $id = $_GET['id'];
    $modification = "DELETE FROM gestion WHERE id = '$id'";
    $execute = mysqli_query($connexion, $modification);
    if ($execute) {
        echo "Suppression réussie";
    }
}

?>