<?php
session_start();
require_once("connbd.php");
if(isset($_POST['suivant']))
{
    $_SESSION['idec']=$_POST['idec'];
  header('location:affectationdir.php') ;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>Selection directeur</title>
</head>
<body>
        <header>
          <img  src="../images/logo-removebg-preview (1).png"   class="image" alt="Image">

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
<main >

            
        <form action="" method="POST" name="f" >
        
           <label for="idec">Classe</label>

           <select name="idec" id="idec">
            <option value=disable selected>Sélectionner l'école:</option>
            <?php
        // Si un niveau est sélectionné, récupérez les classes correspondantes depuis la base de données
        
            $cla = $connexion->prepare("SELECT * FROM ecole");
            $cla->execute();
            while($row = $cla->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['ID_ecole'] . '">' . $row['nom_ecole'] . '</option>';
            }
        
        ?>
           
              
 
            </select>

          
          
           <br><br>

           <input type="submit" name="suivant" id="suivant" value="Suivant">
        



        </form>
</main>
</body>
</html>