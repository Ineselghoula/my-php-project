<?php
session_start();
require_once("connbd.php");
$idec=$_SESSION['idec'];
if(isset($_POST['envoyer'])) {
    // Récupération des données du formulaire
    $idd = $_POST['idd'];
    echo $idd;
    echo $idec;
    try {
        
            
            $req2 = $connexion->prepare("INSERT INTO `affectation_directeur` (`ID_directeur`, `ID_ecole`, `Année-secondaire`) VALUES ('$idd', '$idec', '2024')");
            $req2->execute();
            echo "Données insérées avec succès";
            header('location:admin.php');
        
    } catch (PDOException $e) {
        echo "Erreur lors de l'insertion des données : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>Accueil</title>
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
        
           <label for="idd">Classe</label>

           <select name="idd" id="idd">
            <option value=disable selected>Sélectionner Directeur:</option>
            <?php
        // Si un niveau est sélectionné, récupérez les classes correspondantes depuis la base de données
        
            $cla = $connexion->prepare("SELECT * FROM directeur");
            $cla->execute();
            while($row = $cla->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['ID_directeur'] . '">' . $row['Nom&Prenom_directeur'] . '</option>';
            }
        
        ?>
           
              
 
            </select>

          
          
           <br><br>

           <input type="submit" name="envoyer" id="envoyer" value="Affecter">
        



        </form>
        <br> <a href="admin.php"><h3>Retour</h3></a>

</main>
</body>
</html>

