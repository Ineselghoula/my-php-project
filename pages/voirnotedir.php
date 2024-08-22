<?php
session_start();
require_once("connbd.php");
$id = $_SESSION['id'];
$np = $_SESSION['np'];

// Récupération de la classe de l'élève
$resClasse = $connexion->prepare("SELECT libelle_classe FROM affectation_eleve a, classe c WHERE a.ID_eleve='$id' AND c.Code_classe=a.Code_classe");
$resClasse->execute();
if ($resClasse->rowCount() > 0) {
    $rowClasse = $resClasse->fetch(PDO::FETCH_ASSOC);
    $classe = $rowClasse['libelle_classe'];
} else {
    $classe = "Classe non définie";
}

// Récupération des notes de l'élève
$resNotes = $connexion->prepare("SELECT m.libelle_matiere, n.note FROM note n JOIN matiere m ON n.code_matiere = m.code_matiere WHERE n.ID_eleve='$id' AND n.Annee_scolaire=2024 AND n.code_T=3");
$resNotes->execute();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Notes des élèves</title>
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
        <h3>Nom et prénom de l'élève: <?php echo $np;?>   </h3>
        <h3>Classe: <?php echo $classe; ?></h3>
        <h3>Année scolaire : 2024</h3>
        <table border=1>
            <tr>
                <td>Matière:</td>
                <td>Note:</td>
            </tr>
            <?php while ($rowNote = $resNotes->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $rowNote['libelle_matiere'];?></td>
                <td><?php echo $rowNote['note'];?></td>
            </tr>
            <?php } ?>
        </table>
        <br> <a href="directeur.php"><h3>Retour</h3></a>
    </main>
</body>
</html>
