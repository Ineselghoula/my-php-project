<?php
if(isset($_POST["login"]))
{
 session_start();
 require_once("connbd.php");
 
$id=$_POST["id"];
$mp=$_POST["mp"];
$_SESSION['id']=$id;
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
//test admin
$res3=$connexion->prepare("SELECT * FROM administrateur WHERE nom_ad='$id'and mp_ad='$mp'");
$res3->execute();
$test3=$res3->fetch(PDO::FETCH_ASSOC);

if((empty($id)) or (empty($mp)))
echo "verifier vos informations";
elseif( ($test["ID_eleve"]==$id) and ($test["mpe"]==$mp))
{
header('location:elevee.php');
$_SESSION['id']=$id;
}
elseif( ($test1["ID_parent"]==$id) and ($test1["mpp"]==$mp))
{
header('location:parent.php');
$_SESSION['id']=$id;
}
elseif( ($test2["ID_directeur"]==$id) and ($test2["mpd"]==$mp))
{
header('location:directeur.php');
$_SESSION['id']=$id;
}
elseif(($test3["nom_ad"]==$id) and ($test3["mp_ad"]==$mp))
{
header('location:admin.php');
$_SESSION['id']=$id;
}
else
echo "Veillez verifier votre pseudo et mot de passe!";

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="../style.css">
    <title>verification</title>
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
    <div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<div class="form-group">
                                            <form name="f" method="post" action=""> 
												<input type="text" class="form-style" name="id" placeholder="Log In">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" class="form-style" name="mp" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<input class="btn mt-4" type="submit" name="login" value="login">                    
                                            </form>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
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
</body>
</html>