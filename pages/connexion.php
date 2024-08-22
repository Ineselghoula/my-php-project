<?php
if(isset($_POST["login"]))
{
 session_start();
 //require_once("connbd.php");
 $serveur="localhost";
 $user="root";
 $mp="";
 $bdd="tester";
 $port="3306";
 try{
     $connexion= new PDO ("mysql:host = $serveur;port=$port;dbname=$bdd" , $user,$mp);
     $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     echo"connexion a la base reussite";
 }catch(PDOexception $e){
     echo"Erreur de connexion :".$e->getMessage();
 }
 //bbbbbbbbbbbbbbbbb
$id=$_POST["id"];
$mp=$_POST["mp"];
//test eleve
$res=$connexion->prepare("SELECT * FROM eleve WHERE ID_eleve='$id'and mpe='$mp'");
$res->execute();
$test=$res->fetch(PDO::FETCH_ASSOC);
//test parent
$res1=$connexion->prepare("SELECT * FROM parent WHERE ID_parent='$id'and mpp='$mp'");
$res1->execute();
$test1=$res1->fetch(PDO::FETCH_ASSOC);
//test directeur
$res2=$connexion->prepare("SELECT * FROM directeur WHERE ID_directeur='$id'and mpd='$mp'");
$res2->execute();
$test2=$res2->fetch(PDO::FETCH_ASSOC);

if( ($test["ID_eleve"]==$id) and ($test["mpe"]==$mp))
header('location:elevee.html');
elseif( ($test1["ID_parent"]==$id) and ($test1["mpp"]==$mp))
header('location:parent.html');
elseif( ($test2["ID_directeur"]==$id) and ($test2["mpd"]==$mp))
header('location:directeur.html');
elseif( ($id=="admin") and ($mp=="admin123"))
header('location:admin.html');
else
echo "Veillez verifier votre pseudo et mot de passe!";
$_SESSION['id']=$id;
}
?>
<!DOCTYPE html>
<html lang="en">

<body>
<form name="f" method="post" action=""> 
	<input type="text"  name="id" placeholder="Log In">
												
	<input type="password"  name="mp" placeholder="Password">
												
	<input  type="submit" name="login" value="login">                    
</form>
</body>
</html>