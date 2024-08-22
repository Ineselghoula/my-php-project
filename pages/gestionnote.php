<?php
session_start();
require_once("connbd.php");

$ideleve = $_SESSION['ide']; 
echo $ideleve;

$codeclasse = $_SESSION['codc'];

$cn=$_SESSION['niveau'];
echo "niveau: ".$cn;



$res = $connexion->prepare("SELECT m.code_matiere, m.libelle_matiere FROM matiere m, matiere_niveau mn WHERE mn.code_matiere = m.code_matiere and mn.Code_Niveau = '$cn'");



$res->execute();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saisie des notes</title>
</head>
<body>
    <h2>Saisie des notes</h2>
    <form action="insert_notes.php" method="POST">
        <input type="hidden" name="ideleve" value="<?php echo $ideleve; ?>">
        <input type="hidden" name="codeclasse" value="<?php echo $codeclasse; ?>">
        <table>
            <tr>
                <th>Matière</th>
                <th>Note</th>
            </tr>
            <?php while ($row = $res->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $row['libelle_matiere']; ?></td>
                    <td><input type="text" name="notes[<?php echo $row['code_matiere']; ?>]" min="0" max="20"></td>
                </tr>
            <?php } ?>
        </table>
        <input type="submit" name="valider" value="Enregistrer les notes">
    </form>
    <br> <a href="directeur.php"><h3>Retour</h3></a>

</body>
</html>

