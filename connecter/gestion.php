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
    if(($users)){ 

        if(!empty($_POST['nom'] && !empty($_POST['caracteristique'])&& !empty($_POST['heure']))){
            $nom = $_POST['nom'];
            $caracteristique = $_POST['caracteristique'];
            $heure = $_POST['heure'];
           
            $insere = "INSERT INTO gestion(nom,caracteristique,heure,user_id)";
            $insere .= "VALUES('$nom','$caracteristique','$heure','$sessionUserId')";
            $tache = mysqli_query($connexion, $insere);
            var_dump($tache);
            if($tache){
            header('Location: tableau.php');
            }else{
                echo "erreur";
            }
        }
    }
}else{
    echo "utilisateur inconnue";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de tâches</title>
</head>
<body>
    <header>
        <h1>Votre gestion de taches</h1>
    </header>
        <p><a href="tableau.php">Consulter mes tâches</a></p>
    <div class="container">
                <form action="" method="post">
               
                    <label>Nom de la tâche</label><br>
                    <input type="text" name="nom" id="nom" ><br>
                    <label>Caractéristique de la tâche</label><br>
                    <input type="text" name="caracteristique" id="caracteristique"><br>
                    <label> date de la tâche</label><br>
                    <input type="date" name="heure" id="heure"><br><br>
                    <input type="submit" value="Enregistrer la tâche"><br>
                    
                </form>
                
        </table>
    </div>
</body>
</html>