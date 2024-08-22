<?php
session_start();
require_once("connbd.php");

// Vérification si les variables sont définies et si le formulaire a été soumis
if(isset($_POST['envoyer'])) {
    // Récupération des données du formulaire
    $idel = $_POST['idel'];
    $idp = $_POST['idp'];
    $nomprenom= $_POST['nomprenom'];
    $mpe = $_POST['mpe'];
    $annee = $_POST['an_naissance'];
    $ville = $_POST['ville'];
   
    $classe = $_POST['classe'];
    $sexe = $_POST['sexe'];
  
    // Vérification de l'existence de l'élève
    try {
        $reqeleve = $connexion->prepare("SELECT ID_eleve FROM eleve WHERE ID_eleve = '$idel'");
        $reqeleve->execute();
        $ex = $reqeleve->fetch(PDO::FETCH_ASSOC);
        
        if(!$ex) { 
            // Insertion des données si l'élève n'existe pas encore
            $req1 = $connexion->prepare("INSERT INTO eleve (`ID_eleve`, `Nom&Prenom_eleve`, `Date_Naissance`, `Ville_eleve`, `ID_parent`, `nbrab`, `nbrpr`, `mpe`, `sexe`) VALUES ('$idel','$nomprenom','$annee','$ville','$idp','','','$mpe','$sexe')");
            $req1->execute();
            $req2 = $connexion->prepare("INSERT INTO `affectation_eleve` (`Annee_scolaire`, `ID_eleve`, `code_classe`) VALUES ('2024', '$idel', '$classe')");
            $req2->execute();
            echo "Données insérées avec succès";
            header('location:directeur.php');
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
        <label for="niveaux">Niveau:</label>
           <select name="niveau" id="niveau" onchange="this.form.submit()">
           <option value=disable selected>Choisir le niveau</option>
            <option value="1">Première</option>
            <option value="2">Deuxième</option>
            <option value="3">Troisiéme</option>
            <option value="4">Quatrième</option>           
          <option value="5">Cinquième</option>
          <option value="6">Sixième</option>
           </select>

           <label for="classe">Classe</label>

           <select name="classe" id="classe">
            <option value=disable selected>Sélectionner la classe</option>
            <?php
        // Si un niveau est sélectionné, récupérez les classes correspondantes depuis la base de données
        if(isset($_POST['niveau'])) {
            $niveau = $_POST['niveau'];
            // Récupérez les classes correspondant au niveau depuis la base de données
            $cla = $connexion->prepare("SELECT * FROM classe WHERE code_niveau = '$niveau'");
            $cla->execute();
            while($row = $cla->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['Code_classe'] . '">' . $row['libelle_classe'] . '</option>';
            }
        }
        ?>
           
              
 
            </select>

          
          
           <label for="idel">Id Eleve</label>
           <input type="text" id="idel" name="idel">
           <label for="idel">Id Parent</label>
           <input type="text" id="idp" name="idp">
           <label for="nomprenom">Nom et prénom:</label>
           <input type="text" id="nomprenom" name="nomprenom">
           <label for="mpe">Mot de passe:</label>
           <input type="password" id="mpe" name="mpe">
           <label for="an_naissance">Date Naissance</label>
           <input type="date" id="an_naissance" name="an_naissance">
           <label for="ville">Ville:</label>
           <input type="text" id="ville" name="ville">
     
           <label for="label">Sexe:</label>
           <input type="radio" name="sexe" value="homme">Homme
           <input type="radio" name="sexe" value="femme">Femme <br> 
           <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
           <input type="reset" name="annuler" id="annuler" value="Annuler">



        </form>
</main>
</body>
</html>