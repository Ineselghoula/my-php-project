<?php
session_start();
require_once("connbd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_eleve = $_POST['id_eleve'];
    $code_classe = $_POST['code_classe'];
    $Annee_scolaire = $_POST['Annee_scolaire'];

    // Vérifier l'existence de l'ID d'élève
    $res = $connexion->prepare("SELECT * FROM eleve WHERE ID_eleve=:id");
    $res->bindParam(':id', $id_eleve);
    $res->execute();
    $eleve = $res->fetch();

    if (!$eleve) {
        echo "L'ID de l'élève fourni n'existe pas.";
    } else {
        // Insérer l'affectation dans la table affectation_eleve
        $requete = "INSERT INTO affectation_eleve (ID_eleve, code_classe ,Annee_scolaire) VALUES (:id_eleve, :code_classe, :Annee_scolaire)";
        $stmt = $connexion->prepare($requete);
        $stmt->bindParam(':id_eleve', $id_eleve);
        $stmt->bindParam(':code_classe', $code_classe);
        $stmt->bindParam(':Annee_scolaire', $Annee_scolaire);
        


        if ($stmt->execute()) {
            echo "Affectation de l'élève réussie.";
        } else {
            echo "Erreur lors de l'affectation de l'élève: " . $stmt->errorInfo()[2];
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>affectation_eleve</title>
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
    <h2>Affectation d'élève à une classe</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="id_eleve">ID de l'élève:</label><br>
        <input type="text" id="id_eleve" name="id_eleve"><br><br>
        <label for="code_classe">Code de la classe:</label><br>
        <input type="text" id="code_classe" name="code_classe"><br><br>
        <label for="annee">Annee Scolaire</label>
        <input type="text" name="Annee_scolaire" id="Annee_scolaire"><br><br>
        <input type="submit" value="Affecter">
       
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
            <br> <a href="directeur.php"><h3>Retour</h3></a>
     
     </footer>
        <script src="../script.js"></script>
</body>
</html>
