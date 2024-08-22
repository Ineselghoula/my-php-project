<?php
session_start();
require_once("connbd.php");

if(isset($_POST['modifier'])) {
   $ancienidel=$_SESSION['ide'];
    
    $nomprenom = $_POST['nomprenom'];
    $mpe = $_POST['mpe'];
    $annee = $_POST['an_naissance'];
   

    $req1 = $connexion->prepare("UPDATE `directeur` SET `Nom&Prenom_directeur` = '$nomprenom'  WHERE `directeur`.`ID_directeur` = '$ancienidel' ");
    $req1->execute();

    if($req1->rowCount() > 0) {
        header('location:admin.php');
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
        
        $res=$connexion->prepare("SELECT * FROM directeur WHERE ID_directeur='$ancienidel'");
        $res->execute();
        $row=$res->fetch(PDO::FETCH_ASSOC); 
       
        ?>
        <form action="" method="POST" name="f">
            <label for="idel">Id directeur</label>
            <input type="text" id="idel" name="idel">
            <label for="nomprenom">Nom et prénom:</label>
            <input type="text" id="nomprenom" name="nomprenom" value="<?php echo $row['Nom&Prenom_directeur']; ?>">
           
            <br>
            <input type="submit" name="modifier" id="modifier" value="Modifier">
            <input type="reset" name="annuler" id="annuler" value="Annuler">
        </form>
    </main>
    <script src="../script.js"></script>

</body>
</html>
