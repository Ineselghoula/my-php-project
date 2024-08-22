<?php
session_start();
require_once("connbd.php");
$id=$_SESSION['id'];
$res=$connexion->prepare("SELECT * FROM directeur WHERE ID_directeur='$id'");
$res->execute();
$test=$res->fetch(PDO::FETCH_ASSOC);
$np=$test['Nom&Prenom_directeur'];
$_SESSION['np']=$np;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>Directeur</title>
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
           
    <section id="animation">
        <img class="ii" src="../images/image1.png" alt="animation">   
        <img class="ii" src="../images/image2.png" alt="animation"> 
        <img class="ii" src="../images/image3.png" alt="animation">
        <img class="ii" src="../images/image4.png" alt="animation">
        <img class="ii" src="../images/image5.png" alt="animation">
    </section>
         
    <div class="container">
    <h1> Directeur d'école primaire</h1>
    <ul><li> <h1>Bienvenue <?php echo $np; ?>!    <a href="deconnexion.php" class="button">Déconnexion</a></h1>  </li>
        <li><a href="ajouterE.php">Ajouter un élève</a></li>
        <li><a href="showuser.php" > Modifier les informations d'un élève</a> </li>
        <li><a href="saisie.php" > Saisir les notes d'un élève</a> </li>
        <li><a href="affectatione.php">Affectation Eleve</a></li>
        <li><a href="ajouclasse.php">Ajouter une classe</a></li>
      <li><a href="showclasse.php">Modifier les informations d'une classe</a></li>
      <li><a href="showstu.php">Gestion Absance et Présance élève</a></li>
      <li><a href="showus.php">Voir notr éleve</a></li>



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