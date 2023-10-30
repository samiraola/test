<?php
session_start();
if(!empty($_POST['email'] && !empty($_POST['motPasse']))){
    $email = $_POST['email'];
    $motPasse = $_POST['motPasse'];
    $connexion = mysqli_connect('localhost','root','','Taches');
    if(!$connexion){
        die('erreur à la connexion');
    }
    $selection = "SELECT * FROM users WHERE email = '$email' && motPasse = '$motPasse'";
    $result = mysqli_query($connexion, $selection);
    if($result){
        echo "reussi";
    }else{
        echo "echec";
    }
    $recuperation = mysqli_fetch_all($result);
    if($recuperation){
        $_SESSION['id']= $recuperation['id'];
        header('Location: ./connecter/index.php');
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Votre Email</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="">Votre mot de passe</label><br>
        <input type="password" name="motPasse" id="motPasse"><br>
        <input type="submit" value="Connectez-vous"><br>
    </form>
</body>
</html>