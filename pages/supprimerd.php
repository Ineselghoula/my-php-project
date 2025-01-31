
<?php
session_start();
require_once("connbd.php");

if(isset($_POST["valider"])) {
    $idd = $_POST["idd"];
    $_SESSION['idd'] = $idd;

    // Delete from the affectation_directeur table first
    $res_affectation = $connexion->prepare("DELETE FROM affectation_directeur WHERE ID_directeur = :idd");
    $res_affectation->bindParam(':idd', $idd);
    $res_affectation->execute();

    // Then, delete from the directeur table
    $res_directeur = $connexion->prepare("DELETE FROM directeur WHERE ID_directeur = :idd");
    $res_directeur->bindParam(':idd', $idd);
    $res_directeur->execute();

    header('location:admin.php');
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
          
   
    <div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<div class="form-group">
                                            <form name="f" method="post" action=""> 
												<input type="text" class="form-style" name="idd" placeholder="idd">
												<i class="input-icon uil uil-at"></i>
											</div>	
											
											<input class="btn mt-4" type="submit" name="valider" value="valider">                    
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