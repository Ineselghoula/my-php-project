<?php
session_start();
require_once("connbd.php");

if(isset($_POST['modifier'])) {
    $ID_ecole = $_POST['ID_ecole'];
    $nom_ecole = $_POST['nom_ecole'];
    $ancienidc=$_SESSION['idc'];
    $sql = "UPDATE ecole SET nom_ecole = '$nom_ecole' WHERE ID_ecole = '$ancienidc'";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "École mise à jour avec succès.";
        header('location:admin.php');
    } else {
        echo "Erreur lors de la mise à jour de l'école.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une école</title>
</head>
<body>

<h2>Modifier une école</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <?php
    $ancienidc=$_SESSION['idc'];
    $res=$connexion->prepare("SELECT * FROM ecole WHERE ID_ecole='$ancienidc'");
    $res->execute();
    $row=$res->fetch(PDO::FETCH_ASSOC); 
    ?>
    <label for="ID_ecole">ID école:</label><br>
    <input type="text" id="ID_ecole" name="ID_ecole" value="<?php echo $row['ID_ecole']; ?>"><br><br>

    <label for="nom_ecole">Nom école:</label><br>
    <input type="text" id="nom_ecole" name="nom_ecole" value="<?php echo $row['nom_ecole']; ?>"><br><br>

    <input type="submit" name="modifier" value="Modifier">
</form>

</body>
</html>
