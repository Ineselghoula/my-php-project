<?php
session_start();
require_once("connbd.php");
$id=$_SESSION['id'];
$res=$connexion->prepare("SELECT * FROM eleve WHERE ID_eleve='$id'");
$res->execute();
$test=$res->fetch(PDO::FETCH_ASSOC);
$np=$test['Nom&Prenom_eleve'];
$_SESSION['np']=$np;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>eleve</title>
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
           
          <div>
            
          </div>
                <h1>Bienvenue <?php echo $np; ?>!    <a href="deconnexion.php" class="button">Déconnexion</a></h1>  
                <a href="note.php" class="button">Voir les notes</a>
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
