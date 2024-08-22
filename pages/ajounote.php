<?php
session_start();
require_once("connbd.php");
$id = $_SESSION['id'];
$np = $_SESSION['np'];

$res1 = $connexion->prepare("SELECT libelle_classe FROM affectation_eleve a, classe c WHERE a.ID_eleve='$id' and c.Code_classe=c.Code_classe");
$res1->execute();
$test1 = $res1->fetch(PDO::FETCH_ASSOC);
$c = $test1['libelle_classe'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>ajout</title>
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
    <h3>Nom et prénom de l'éleve: <?php echo $np;?>   </h3>
    <h3>Classe: <?php echo $c; ?></h3>
    <h3>Année scolaire : 2024</h3>
    <table border=1>
        <tr>
            <td>Matière:</td>
            <td>Note:</td>
        </tr>

        <?php
        // Récupération des matières et des notes associées
        $res = $connexion->prepare("INSERT INTO note (note) VALUES (:note)");
        $res->bindValue(':note', $valeur_de_la_note);
        $res->execute();
        
        $somme = 0;
        $coef = 0;
        while ($test = $res->fetch(PDO::FETCH_ASSOC)) {
            $somme += $test['note'];
            $coef++;
            ?>
            <tr>
                <td><?php echo $test['libelle_matiere']; ?></td>
               
            </tr>
            <?php
        }
        $moy = $somme / $coef;
        ?>
        <tr bgcolor="black">
            <td>Moyenne: </td>
            <td><?php echo round($moy, 2); ?></td>
        </tr>
    </table>
</main>
</body>
</html>
