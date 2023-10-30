<?php
$connexion = mysqli_connect('localhost','root','','Taches');
if(!$connexion){
    die('erreur à la connexion');
    }

    $ajouter = "SELECT * FROM gestion";
    $result = mysqli_query($connexion, $ajouter);
    if($result){
        $recup = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>

<style>
  .checkbox-wrapper-28 {
    --size: 25px;
    position: relative;
  }

  .checkbox-wrapper-28 *,
  .checkbox-wrapper-28 *:before,
  .checkbox-wrapper-28 *:after {
    box-sizing: border-box;
  }

  .checkbox-wrapper-28 .promoted-input-checkbox {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }

  .checkbox-wrapper-28 input:checked ~ svg {
    height: calc(var(--size) * 0.6);
    -webkit-animation: draw-checkbox-28 ease-in-out 0.2s forwards;
            animation: draw-checkbox-28 ease-in-out 0.2s forwards;
  }
  .checkbox-wrapper-28 label:active::after {
    background-color: #e6e6e6;
  }
  .checkbox-wrapper-28 label {
    color: #0080d3;
    line-height: var(--size);
    cursor: pointer;
    position: relative;
  }
  .checkbox-wrapper-28 label:after {
    content: "";
    height: var(--size);
    width: var(--size);
    margin-right: 8px;
    float: left;
    border: 2px solid #0080d3;
    border-radius: 3px;
    transition: 0.15s all ease-out;
  }
  .checkbox-wrapper-28 svg {
    stroke: #0080d3;
    stroke-width: 3px;
    height: 0;
    width: calc(var(--size) * 0.6);
    position: absolute;
    left: calc(var(--size) * 0.21);
    top: calc(var(--size) * 0.2);
    stroke-dasharray: 33;
  }

  @-webkit-keyframes draw-checkbox-28 {
    0% {
      stroke-dashoffset: 33;
    }
    100% {
      stroke-dashoffset: 0;
    }
  }

  @keyframes draw-checkbox-28 {
    0% {
      stroke-dashoffset: 33;
    }
    100% {
      stroke-dashoffset: 0;
    }
  }
</style>
</head>
<body>
    <header><h1>Votre tableau de bord</h1></header>
    <a href="index.php">Retour page d'accueil</a>
    <h4>Voici la liste de vos différent tâches</h4>
    <table>
       
        <tr>
            <th>Tâches</th>
            <th>Descriptions</th>
            <th colspan="3">Actions</th>
        </tr>
        <tbody>
            <tr>
            <?php foreach($recup as $value):  ?>

                <td><?php echo $value['nom'];  ?></td>
                <td><?php echo $value['caracteristique'];  ?></td>
                <td><a href="modifier.php?id=<?php echo $value['id']; ?>">modifier</a></td>
                <td><a href="supprimer.php?id=<?php echo $value['id']; ?>">supprimer</a></td>
                <td><a href="effectuer.php">
                <div class="checkbox-wrapper-28">
                    <input id="tmp-28" type="checkbox" class="promoted-input-checkbox"/>
                    <svg><use xlink:href="#checkmark-28" /></svg>
                    <label for="tmp-28">
                       
                    </label>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none">
                        <symbol id="checkmark-28" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-miterlimit="10" fill="none"  d="M22.9 3.7l-15.2 16.6-6.6-7.1">
                        </path>
                        </symbol>
                    </svg>
                    </div>
                </td>
            </tr>
        </tbody>
        <?php endforeach;   ?>
    </table>
</body>
</html>


