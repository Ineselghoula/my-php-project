<?php
session_start();
require_once("connbd.php");
$id=$_SESSION['id'];
$res=$connexion->prepare("SELECT * FROM parent WHERE ID_parent='$id'");
$res->execute();
$test=$res->fetch(PDO::FETCH_ASSOC);
$np=$test['Nom&Prenom_parent'];
$_SESSION['np']=$np;


//**********************************liste*********************** */
$res=$connexion->prepare("SELECT * FROM eleve WHERE ID_parent='$id'");
$res->execute();




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>parent</title>
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
         
            <div class="Dasbord">
                <h1>Bienvenue!  <?php echo $np; ?></h1>   <a href="deconnexion.php" class="button">    Déconnexion</a>
                <table border=1>
                    <?php 
                    while($test=$res->fetch(PDO::FETCH_ASSOC))
                    {
                        ?>
                <tr>
                        <td> <?php echo $test['Nom&Prenom_eleve'];?></td>
                        <td><a href="notep.php? npe=<?php echo $test['Nom&Prenom_eleve'];?> & ide=<?php echo $test['ID_eleve'];?>" class="button">Voir les notes</a><br></td>
                        <td><a href="presence.php? npe=<?php echo $test['Nom&Prenom_eleve'];?> & ide=<?php echo $test['ID_eleve'];?>" class="button">Voir Présance</a><br></td>
                </tr>
                
                <?php } ?>
                </table>
             
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
