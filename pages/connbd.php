<?php
$serveur="localhost";
$user="root";
$mp="";
$bdd="gestionnoteeleve";
$port="3307";
try{
    $connexion= new PDO ("mysql:host = $serveur;port=$port;dbname=$bdd" , $user,$mp);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"connexion a la base reussite";
}catch(PDOexception $e){
    echo"Erreur de connexion :".$e->getMessage();
}
?>