<?php
$connexion = mysqli_connect('localhost','root','','Taches');
if($connexion){
    echo "vous connecté à la base de donnée";
}else{
    echo "erreur à la connexion";
}
if(isset($_POST["nom"])&& isset($_POST['email'])&& isset($_POST['motPasse'])){
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $motPasse = $_POST['motPasse'];
    $users = "INSERT INTO users(nom,email,motPasse)";
    $users .= "VALUES('$nom','$email','$motPasse')";
    $select = mysqli_query($connexion,$users);
    if($select){
        header('Location: connexion.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Entrez votre nom et prenom</label><br><br>
        <input type="text" name="nom" id="nom"><br>
        <label for="">Votre Email</label><br>
        <input type="email" name="email" id="email"><br>
        <label for="">Votre mot de passe</label><br>
        <input type="password" name="motPasse" id="motPasse"><br>
        <input type="submit" value="inscrivez-vous">
    </form>
</body>
</html>