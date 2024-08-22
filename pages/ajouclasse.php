<?php
session_start();
require_once("connbd.php");

if(isset($_POST['ajouter'])) 
{
    // Vérifier si les champs sont définis dans $_POST
    if(isset($_POST['libelle_classe'], $_POST['Code_classe'], $_POST['niveau'])) {
        $libelle_classe = $_POST['libelle_classe'];
        $Code_classe = $_POST['Code_classe'];
        $niveau = $_POST['niveau'];

        try {
            // Vérifier si le code de classe existe déjà
            $verif_req = $connexion->prepare("SELECT Code_classe FROM classe WHERE Code_classe = ?");
            $verif_req->execute([$Code_classe]);
            $existeid = $verif_req->fetch(PDO::FETCH_ASSOC);

            if(!$existeid) { 
                // Si le code de classe n'existe pas, insérer les données
                $req = $connexion->prepare("INSERT INTO classe (libelle_classe, Code_classe, code_niveau) VALUES (?, ?, ?)");
                $req->execute([$libelle_classe, $Code_classe, $niveau]);
                echo "Données insérées avec succès";
                header('location:directeur.php');
            } else {
                echo "Le code de classe existe déjà";
            }
        } catch (PDOException $e) {
            echo "Erreur lors de l'insertion des données : " . $e->getMessage();
        }
    } else {
        echo "Tous les champs doivent être remplis";
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
<main>
            <section id="animation">
                <img class="ii" src="../images/image1.png" alt="animation">   
                <img class="ii" src="../images/image2.png" alt="animation"> 
                <img class="ii" src="../images/image3.png" alt="animation">
                <img class="ii" src="../images/image4.png" alt="animation">
                <img class="ii" src="../images/image5.png" alt="animation">
            </section>
         

<h2>Ajouter une classe</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <label for="libelle_classe">Libellé de la classe:</label><br>
    <input type="text" id="libelle_classe" name="libelle_classe" required><br><br>

    <label for="Code_classe">Code classe:</label><br>
    <input type="text" id="Code_classe" name="Code_classe" required><br><br>

    <label for="niveau">Niveau:</label>
    <select name="niveau" id="niveau">
        <option value="disable" selected>Choisir le niveau</option>
        <option value="1">Première</option>
        <option value="2">Deuxième</option>
        <option value="3">Troisiéme</option>
        <option value="4">Quatrième</option>           
        <option value="5">Cinquième</option>
        <option value="6">Sixième</option>
    </select>
<br>
    <input type="submit" name="ajouter" value="Ajouter">
</form>
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
        <br> <a href="directeur.php"><h3>Retour</h3></a>

</body>
</html>
