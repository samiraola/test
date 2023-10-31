<?php
session_start();
$connexion = mysqli_connect('localhost', 'root', '', 'Taches');
if (!$connexion) {
    die('Erreur à la connexion');
} else {
    echo "Connexion réussie";
}
if(!empty($_SESSION['user_id'])){
    $sessionUserId = $_SESSION['user_id'];
    $select = "SELECT * FROM users WHERE id='sessionUserId'";
    $result = mysqli_query($connexion, $select);
    $users = mysqli_fetch_assoc($result);
    if(($users)){ 
       
    }
}
if(!empty($_GET['id'])){
    $id = $_GET['id'];
    $ajouter = "SELECT * FROM gestion WHERE id='id' AND user_id='sessionUserId'";
    $result = mysqli_query($connexion, $ajouter);
    if ($result) {
        $recup = mysqli_fetch_all($result, MYSQLI_ASSOC);
       
    } 

if (!empty($_POST['nom']) && !empty($_POST['caracteristique']) && !empty($_POST['heure'])) {
    $nom = $_POST['nom'];
    $caracteristique = $_POST['caracteristique'];
    $heure = $_POST['heure'];

    $modification = "UPDATE gestion SET nom ='$nom',caracteristique ='$caracteristique',heure ='$heure' WHERE id ='$id'";
    $execute = mysqli_query($connexion, $modification);
    var_dump($execute);
    if ($execute) {
       
        $requete = "SELECT * FROM gestion WHERE id='$id' AND user_id ='sessionUserId'";
        $affiche = mysqli_query($connexion, $requete);
        $gestion = mysqli_fetch_assoc($affiche);
        var_dump($gestion);
        if($gestion){
            
            echo "modification validé";
        }else{
            die("echec");
        }
    }
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
<p><a href="tableau.php">Modifier ma tâche</a></p>
<div class="container">
    
        <form action="" method="post">
            <label>Nom de la tâche</label><br>
            <input type="text" name="nom" id="nom" value="<?php echo $gestion['nom']; ?>"><br>
            <label>Caractéristique de la tâche</label><br>
            <input type="text" name="caracteristique" id="caracteristique" value="<?php echo $gestion['caracteristique']; ?>"><br>
            <label>Date de la tâche</label><br>
            <input type="date" name="heure" id="heure" value="<?php echo $gestion['heure']; ?>"><br><br>

            <input type="submit" value="Enregistrer la tâche"><br>
        </form>
   
</div>
</body>
</html>
