<?php
session_start();
require_once("connbd.php");

if(isset($_POST['modifier'])) {
   $ancienidel=$_SESSION['ide'];
    
    $nomprenom = $_POST['nomprenom'];
    $mpe = $_POST['mpe'];
    $annee = $_POST['an_naissance'];
    $ville = $_POST['ville'];
    $sexe = $_POST['sexe'];
    $nbpr= $_POST['nbrpr'];
    $nbrab = $_POST['nbrab'];


    $req1 = $connexion->prepare("UPDATE `eleve` SET `Nom&Prenom_eleve` = '$nomprenom', `Date_Naissance` = '$annee', `Ville_eleve` = '$ville', `nbrab` = '$nbrab', `nbrpr` = '$nbpr', `mpe` = '$mpe', `sexe` = '$sexe'  WHERE `eleve`.`ID_eleve` = '$ancienidel' ");
    $req1->execute();

    if($req1->rowCount() > 0) {
        header('location:directeur.php');
        echo "Données mises à jour avec succès";
    } else {
        echo "Aucune donnée mise à jour";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Modifier</title>
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
        <!-- Formulaire de modification -->
        <!-- il faut afficher les informations de l'éleve dans la formulaire pour faire les modification 
        nécessaires sur le champ lui même-->
        <?php
  
        $ancienidel=$_SESSION['ide'];
        
        $res=$connexion->prepare("SELECT * FROM eleve WHERE ID_eleve='$ancienidel'");
        $res->execute();
        $row=$res->fetch(PDO::FETCH_ASSOC); 
       
        ?>
        <form action="" method="POST" name="f">
            <label for="idel">Id Eleve</label>
            
            <label for="nomprenom">Nom et prénom:</label>
            <input type="text" id="nomprenom" name="nomprenom" value="<?php echo $row['Nom&Prenom_eleve']; ?>">
            <label for="mpe">Mot de passe:</label>
            <input type="password" id="mpe" name="mpe" value="<?php echo $row['mpe']; ?>">
            <label for="an_naissance">Date Naissance</label>
            <input type="date" id="an_naissance" name="an_naissance" value="<?php echo $row['Date_Naissance']; ?>">
            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville" value="<?php echo $row['Ville_eleve']; ?>">
            <label for="nbrab">Nombre de jours de présence:</label>
            <input type="text" id="nbrab" name="nbrab" value="<?php echo $row['nbrab']; ?>">
            <label for="nbrpr">Nombre de jours d'abscence:</label>
            <input type="text" id="nbrpr" name="nbrpr" value="<?php echo $row['nbrpr']; ?>">
            <label for="label">Sexe:</label>
            <select name="sexe" id="sexe">
                <option value="H">Homme</option>
                <option value="F">Femme</option>
            </select>
            <br>
            <input type="submit" name="modifier" id="modifier" value="Modifier">
            <input type="reset" name="annuler" id="annuler" value="Annuler">
        </form>
    </main>
    <script src="../script.js"></script>

</body>
</html>
