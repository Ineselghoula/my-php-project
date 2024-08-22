<?php
session_start();
require_once("connbd.php");

// Vérification si les variables sont définies et si le formulaire a été soumis
if(isset($_POST['envoyer'])) {
    // Récupération des données du formulaire
    $idec = $_POST['idec'];
    
    $nomec= $_POST['nomec'];
    
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
   
   
  
    // Vérification de l'existence de l'ecole 
    try {
        $reqeleve = $connexion->prepare("SELECT * FROM ecole WHERE ID_ecole = '$idec'");
        $reqeleve->execute();
        $ex = $reqeleve->fetch(PDO::FETCH_ASSOC);
        
        if(!$ex) { 
            // Insertion des données si l'ecole n'existe pas encore
            $req1 = $connexion->prepare("INSERT INTO `ecole` (`ID_ecole`, `nom_ecole`, `Adresse_ecole`, `Ville_ecole`) VALUES ('$idec', '$nomec', '$adresse', '$ville')");
            $req1->execute();
            
            echo "Données insérées avec succès";
            header('location:admin.php');
        } else {
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

    <title>Ajouter ecole </title>
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
       
       <label for="idec">Id Ecole</label>
           <input type="text" id="idec" name="idec">
           
           <label for="nomec">Nom Ecole:</label>
           <input type="text" id="nomec" name="nomec">
           
           <label for="adresse">Adresse:</label>
           <input type="text" id="adresse" name="adresse">
           <label for="adresse">Ville:</label>
           <input type="text" id="ville" name="ville">
           <br><br>
           <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
           <input type="reset" name="annuler" id="annuler" value="Annuler">
<br><br>



        </form>
</main>
</body>
</html>



