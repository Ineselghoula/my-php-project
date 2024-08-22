<?php
session_start();
require_once("connbd.php");
// Vérification si les variables sont définies et si le formulaire a été soumis
if(isset($_POST['envoyer'])) {
    // Récupération des données du formulaire
    $idd = $_POST['idd'];
    
    $nomprenom= $_POST['nomprenom'];
    $mpd = $_POST['mpd'];
    $annee = $_POST['an_naissance'];
    $adresse = $_POST['adresse'];
   

    // Vérification de l'existence de l'élève
    try {
        $reqeleve = $connexion->prepare("SELECT * FROM directeur WHERE ID_directeur = '$idd'");
        $reqeleve->execute();
        $ex = $reqeleve->fetch(PDO::FETCH_ASSOC);
        
        if(!$ex) { 
            // Insertion des données si l'élève n'existe pas encore
            $req1 = $connexion->prepare("INSERT INTO `directeur` (`ID_directeur`, `Nom&Prenom_directeur`, `Adresse_directeur`, `Date_Naissance`, `mpd`) VALUES ('$idd','$nomprenom','$adresse','$annee','$mpd')");
            $req1->execute();
           
            echo "Données insérées avec succès";
            header('location:admin.php');
        }
         
        else {
            echo "ID existe déjà";
        }
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
           <label for="idd">Id directeur</label>
           <input type="text" id="idd" name="idd">
           
           <label for="nomprenom">Nom et prénom:</label>
           <input type="text" id="nomprenom" name="nomprenom">
           <label for="mpd">Mot de passe:</label>
           <input type="password" id="mpd" name="mpd">
           <label for="an_naissance">Date Naissance</label>
           <input type="date" id="an_naissance" name="an_naissance">
           <label for="adresse">Adresse:</label>
           <input type="textarea" id="adresse" name="adresse">
           <br><br>
           <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
           <input type="reset" name="annuler" id="annuler" value="Annuler">
<br><br>


        </form>
        
</main>
</body>
</html>