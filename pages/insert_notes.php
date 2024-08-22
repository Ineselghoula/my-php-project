<?php

session_start();
require_once("connbd.php");

// Récupérer les données du formulaire
if (isset($_POST['valider'])) {
    $ideleve = $_POST["ideleve"];
    $codeclasse = $_POST["codeclasse"];
    $notes = $_POST["notes"];
    echo $ideleve;
    echo $codeclasse;
    

    

    foreach ($notes as $codematiere => $note) 
    {
            // Requête SQL d'insertion
            $annee = 2024;
            $codet=3;
            $req = $connexion->prepare("INSERT INTO note (Annee_scolaire, ID_eleve, code_classe, code_matiere, code_T, note) VALUES (?, ?, ?, ?, ?, ?)");
    
            // Exécution de la requête
             $req->execute([$annee, $ideleve, $codeclasse, $codematiere, $codet, $note]);
             header('location:directeur.php');
        

   
    } 
}



?>
