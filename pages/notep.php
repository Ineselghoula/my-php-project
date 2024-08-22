<?php
session_start();
require_once("connbd.php");
$id=$_SESSION['id'];
$np=$_SESSION['np'];
$ide=$_GET['ide'];
$npe=$_GET['npe'];

$res1=$connexion->prepare("SELECT libelle_classe FROM affectation_eleve a, classe c WHERE a.ID_eleve='$ide'and c.Code_classe=c.Code_classe");
$res1->execute();
$test1=$res1->fetch(PDO::FETCH_ASSOC);
$c=$test1['libelle_classe'];
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
    <h3>Nom et prénom de l'éleve: <?php echo $npe;?>   </h3>
    <h3>Classe: <?php echo $c; ?></h3>
    <h3>Année scolaire : 2024</h3>
    <table border=1>
    <tr>
        <td>Matière:</td>
        <td>Note:</td>
    </tr>


<?php
//**********************************liste*********************** */
$res=$connexion->prepare("SELECT libelle_matiere, note FROM note n, matiere m WHERE n.code_matiere=m.code_matiere and Annee_scolaire=2024 and n.ID_eleve='$ide' and n.code_T=3");
$res->execute();
$somme=0;
$coef=0;
while($test=$res->fetch(PDO::FETCH_ASSOC))
{
    $somme+=$test['note'];
    $coef++;

?>
<tr>
    <td> <?php echo $test['libelle_matiere'];?></td>
    <td> <?php echo $test['note'];?></td>
</tr>

<?php
}
$moy=$somme/$coef;

?>
<tr bgcolor="black">
    <td >Moyenne: </td>
    <td ><?php echo round($moy,2); ?></td>
</tr>
</table>
<br> <a href="parent.php"><h3>Retour</h3></a>
</body>
</html>