<?php
$connexion = mysqli_connect('localhost', 'root', '', 'Taches');
if (!$connexion) {
    die('Erreur à la connexion');
} else {
    echo "Connexion réussie";
}

$ajouter = "SELECT * FROM gestion";
$result = mysqli_query($connexion, $ajouter);
if ($result) {
    $recup = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if (isset($_GET['id']) && !empty($_POST['nom']) && !empty($_POST['caracteristique']) && !empty($_POST['heure'])) {
    $id = $_GET['id'];
    $nom = $_POST['nom'];
    $caracteristique = $_POST['caracteristique'];
    $heure = $_POST['heure'];
    $modification = "UPDATE gestion SET nom = '$nom', caracteristique = '$caracteristique', heure = '$heure' WHERE id = '$id'";
    $execute = mysqli_query($connexion, $modification);
    if ($execute) {
        echo "Modification réussie";
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
    <?php foreach ($recup as $value): ?>
        <form action="" method="post">
            <label>Nom de la tâche</label><br>
            <input type="text" name="nom" id="nom" value="<?php echo $value['nom']; ?>"><br>
            <label>Caractéristique de la tâche</label><br>
            <input type="text" name="caracteristique" id="caracteristique" value="<?php echo $value['caracteristique']; ?>"><br>
            <label>Date de la tâche</label><br>
            <input type="date" name="heure" id="heure" value="<?php echo $value['heure']; ?>"><br><br>
            <input type="submit" value="Enregistrer la tâche"><br>
        </form>
    <?php endforeach; ?>
</div>
</body>
</html>
