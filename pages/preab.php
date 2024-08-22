<?php
session_start();
require_once("connbd.php");
if(isset($_POST['valider'])) 
{
$idel=$_SESSION['ide'];
$nbrpr=$_POST['nbrpr'];
$nbrab=$_POST['nbrab'];
echo $idel;
echo $nbrab;
echo $nbrpr;
$req=$connexion->prepare("UPDATE `eleve` SET `nbrab` = '$nbrab', `nbrpr` = '$nbrpr' WHERE `eleve`.`ID_eleve` = '$idel' ");
$req->execute();
if(!empty($req) ){
    header('location:directeur.php');
    echo "Données mises à jour avec succès";
}
else{
       echo "echec";
    }
}

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>presance</title>
</head>
<body>
    <header>
        <img src="../images/logo-removebg-preview (1).png" class="image" alt="Image">
        <div class="container">
            <nav>
                <ul>
                    <li><a href="#">Accueil</a></li>
                    <li><a href="#">À Propos</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
    <form action="" method="POST" name="f">
        
           <label for="nbrab">Nombre de jours d'abscence:</label>
            <input type="text" id="nbrab" name="nbrab" >
            <label for="nbrpr">Nombre de jours de présence:</label>
            <input type="text" id="nbrpr" name="nbrpr" >
        <input type="submit" name="valider" id="valider" value="Valider"><br>
            <input type="reset" name="annuler" id="annuler" value="Annuler">
            <br> <a href="directeur.php"><h3>Retour</h3></a>
 
           </main>
    <script src="../script.js"></script>

</body>
</html>