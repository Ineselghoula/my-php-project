<?php
session_start();
require_once("connbd.php");

// Vérification si les variables sont définies et si le formulaire a été soumis
if(isset($_POST['envoyer'])) {
    // Récupération des données du formulaire
    $ide = $_POST['eleve'];
    $codc = $_POST['codc'];
    $niveau=$_POST['niveau'];
    $_SESSION['ide']=$ide;
    $_SESSION['codc']=$codc;
      
  
    header('location:gestionnote.php');
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

            <section id="animation">
                <img class="ii" src="../images/image1.png" alt="animation">   
                <img class="ii" src="../images/image2.png" alt="animation"> 
                <img class="ii" src="../images/image3.png" alt="animation">
                <img class="ii" src="../images/image4.png" alt="animation">
                <img class="ii" src="../images/image5.png" alt="animation">
            </section>
        <form action="" method="POST" name="f" >
        <label for="niveau">Niveau:</label>
        <select name="niveau" id="niveau" onchange="this.form.submit()">
    <option value="disable" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == "disable") echo "selected"; ?>>Choisir le niveau</option>
    <option value="1" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == "1") echo "selected"; ?>>Première</option>
    <option value="2" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == "2") echo "selected"; ?>>Deuxième</option>
    <option value="3" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == "3") echo "selected"; ?>>Troisiéme</option>
    <option value="4" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == "4") echo "selected"; ?>>Quatrième</option>
    <option value="5" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == "5") echo "selected"; ?>>Cinquième</option>
    <option value="6" <?php if(isset($_POST['niveau']) && $_POST['niveau'] == "6") echo "selected"; ?>>Sixième</option>
    
</select>

           
           <label for="classe">Classe:</label>
           <select name="classe" id="classe" onchange="this.form.submit()">
            <option value=disable selected>Sélectionner la classe:</option> 
           
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
        
        <label for="eleve">Eleve:</label>
        <select name="eleve" id="eleve" >
        <option value=disable selected>Sélectionner l'éleve :</option>
        <?php
        
        if(isset($_POST['classe'])) {
            $codc = $_POST['classe'];
            $niveau = $_POST['niveau'];
            $_SESSION['niveau']=$niveau;  
            // Récupérez les classes correspondant au niveau depuis la base de données
            $el = $connexion->prepare("SELECT * FROM affectation_eleve WHERE code_classe = '$codc'");
            $el->execute();
            while($row = $el->fetch(PDO::FETCH_ASSOC)) {
                echo '<option value="' . $row['ID_eleve'] . '">' . $row['ID_eleve'] . '</option>';
            }
        ?>
        
        </select>
        <input type="hidden" name="codc" value="<?php echo $codc; ?>" >  
        <?php } ?>
   
        <input type="submit" name="envoyer" id="envoyer" value="Envoyer">
        <input type="reset" name="annuler" id="annuler" value="Annuler">

        </form>
</main>
</body>
</html>