<?php
session_start();
require_once("connbd.php");
if(isset($_POST['valider'])) 
{
$id=$_SESSION['id'];
$mp=$_POST['mp'];

$req=$connexion->prepare("UPDATE `administrateur` SET `mp_ad` = '$mp' WHERE `administrateur`.`nom_ad` = '$id' ");
$req->execute();
if(!empty($req) ){
    header('location:verification.php');
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
        
           <label for="mp">Nouveau mot de passe:</label>
            <input type="password" id="mp" name="mp" >
            
            
        <input type="submit" name="valider" id="valider" value="Valider">
            <input type="reset" name="annuler" id="annuler" value="Annuler"> 
           </main>
    <script src="../script.js"></script>

</body>
</html>