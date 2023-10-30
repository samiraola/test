<?php
$connexion = mysqli_connect('localhost', 'root', '', 'Taches');
if (!$connexion) {
    die('Erreur à la connexion');
} else{
    echo "Connexion réussie";
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