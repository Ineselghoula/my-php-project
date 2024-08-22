<?php
session_start();
require_once("connbd.php");

$ida=$_SESSION['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>Administrateur</title>
</head>
<body>
        <header>
          <img src="../images/logo-removebg-preview (1).png" alt="">

            <div class="container">
                <nav>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Cours</a></li>
                        <li><a href="#">À Propos</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </header>
<main>
           
    
         
    <div class="container">
    <h1>Administrateur</h1>
    <ul><li> <h1>Bienvenue <?php echo $ida; ?>!<a href="deconnexion.php" class="button">Déconnexion</a></h1>  </li>  
        <li><a href="ajoutd.php">Ajouter un directeur</a></li>
        <li><a href="supprimerd.php" >Supprimer un directeur</a> </li>
        <li><a href="showdirect.php" >Modifier un directeur</a> </li>
        <li><a href="selectiondir.php">Affectation Directeur</a></li>
        <li><a href="ajouterec.php">Ajouter une ecole</a></li>
        <li><a href="supprimerecole.php" >Supprimer une ecole</a> </li>
        <li><a href="showecole.php" >Modifier une ecole</a> </li>
        <li><a href="modmp.php">Modifier mot de passe</a></li>
    </ul>
  </div>
</main>
<footer>
    <div><a href="#" target="_blank">
        <img class="fi" src="../images/facebook-removebg-preview.png" alt=""></a>
        <P>Education</P>
    </div>
    <div><a href="#" target="_blank">
        <img class="fi" src="../images/whatsapp-removebg-preview.png" alt=""></a>
        <P>+216 75 546 465</P>
    </div>
    <div><a href="#" target="_blank">
        <img class="fi" src="../images/EMAIL.png" alt=""></a>
        <P>Education@gmail.com</P>
    </div>      
</footer>
<script src="../script.js"></script>
</body>
</html>