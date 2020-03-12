<?php
	include "connect.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Registracija</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
	<header>
		<div class="container">
			<h1><img src="img/logo.png" alt="logo" title="logo"></h1>
			<nav>
				<ul>
					<li ><a class="anav" href="index.php">HOME</a></li>
					<li><a class="anav"  href="kategorija.php?id=Technology">TECHNOLOGY</a></li>
					<li><a class="anav"  href="kategorija.php?id=Design">DESIGN</a></li>
					<li><a class="anav " href="unos.php">UNOS</a></li>
					<li><a class="anav active" href="administracija.php">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
	<div class="container">
		<section>
			<h2>Registracija</h2>
			<form action="" method="POST">
            <div class="form-item">
                <label for="ime">Ime: </label>
                <div class="form-field">
                    <input type="text" name="ime" id="ime" class="form-field-textual">
                    <span id="porukaIme" class="bojaPoruke"></span>

                </div>
            </div>
            <div class="form-item">
                <label for="prezime">Prezime: </label>
                <div class="form-field">
                    <input type="text" name="prezime" id="prezime" class="form-field-textual">
                <span id="porukaPrezime" class="bojaPoruke"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="username">Korisničko ime:</label>
                <div class="form-field">
                    <input type="text" name="username" id="username" class="form-field-textual">
                <span id="porukaUsername" class="bojaPoruke"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="pass">Lozinka: </label>
                <div class="form-field">
                    <input type="password" name="pass" id="pass" class="form-field-textual">
                <span id="porukaPass" class="bojaPoruke"></span>
                </div>
            </div>
            <div class="form-item">
                <label for="passRep">Ponovite lozinku: </label>
                <div class="form-field">
                    <input type="password" name="passRep" id="passRep" class="form-field-textual">
                <span id="porukaPassRep" class="bojaPoruke"></span>
                </div>
            </div>
            <div class="form-item">
                <button class="form-button" type="submit" value="Prijava" name="prijava" id="slanje">Registriraj me</button>
            </div>
        </form>

        <div class="php-errors">
        <?php 
			
			if(isset($_POST['prijava']) &&
				!empty($_POST['ime']) &&
				!empty($_POST['prezime']) &&
				!empty($_POST['username']) &&
				!empty($_POST['pass']) &&
				!empty($_POST['passRep']) &&
				($_POST['passRep']==$_POST['pass']))

			{
				$ime = $_POST['ime'];
				$prezime = $_POST['prezime'];
				$username = $_POST['username'];
				$lozinka = $_POST['pass'];
				$hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
				$razina = 0;
				$registriranKorisnik = '';
				
				$sql = "SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime = ?";
				$stmt = mysqli_stmt_init($dbc);
				
				if (mysqli_stmt_prepare($stmt, $sql)) {
					mysqli_stmt_bind_param($stmt, 's', $username);
					mysqli_stmt_execute($stmt);
					mysqli_stmt_store_result($stmt);
				}
				if(mysqli_stmt_num_rows($stmt) > 0){
					echo 'Korisničko ime već postoji!';
				}
				else{
					$sql = "INSERT INTO korisnik (ime, prezime,korisnicko_ime, lozinka, razina)VALUES (?, ?, ?, ?, ?)";
					$stmt = mysqli_stmt_init($dbc);
					if (mysqli_stmt_prepare($stmt, $sql)) {
						mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
						mysqli_stmt_execute($stmt);
						echo "Uspjesna registracija!";
					}
				}
				mysqli_close($dbc);
		    }  
		?>
		</div>
		   	<div class="form-align">
            	<p>Već imate korisnički račun? &nbsp;
            	<a href="administracija.php" class="form-button">Prijava</a></p>
            </div>

        <script type="text/javascript">
            document.getElementById("slanje").onclick = function(event) 
            { 
                var slanjeForme = true;
                var poljeIme = document.getElementById("ime");
                var ime = document.getElementById("ime").value;
                if (ime.length == 0) 
                {
                    slanjeForme = false;
                    poljeIme.style.border="1px dashed red";
                    document.getElementById("porukaIme").innerHTML="<br>Unesite ime!<br>";
                } 

                else 
                {
                    poljeIme.style.border="1px solid green";
                    document.getElementById("porukaIme").innerHTML="";
                }

                var poljePrezime = document.getElementById("prezime");
                var prezime = document.getElementById("prezime").value;

                if (prezime.length == 0) 
                {
                    slanjeForme = false;
                    poljePrezime.style.border="1px dashed red";
                    document.getElementById("porukaPrezime").innerHTML="<br>Unesite prezime!<br>";
                } 

                else 
                {
                    poljePrezime.style.border="1px solid green";
                    document.getElementById("porukaPrezime").innerHTML="";
                }

                var poljeUsername = document.getElementById("username");
                var username = document.getElementById("username").value;
                if (username.length == 0) 
                {
                    slanjeForme = false;
                    poljeUsername.style.border="1px dashed red";
                    document.getElementById("porukaUsername").innerHTML="<br>Unesite korisničko ime!<br>";
                   
                }

                else 
                {
                    poljeUsername.style.border="1px solid green";
                    document.getElementById("porukaUsername").innerHTML="";
                }


                var poljePass = document.getElementById("pass");
                var pass = document.getElementById("pass").value;
                var poljePassRep = document.getElementById("passRep");
                var passRep = document.getElementById("passRep").value;

                if (pass.length == 0) 
                {
                    slanjeForme = false;
                    poljePass.style.border="1px dashed red";
                    document.getElementById("porukaPass").innerHTML="<br>Unesite lozinku!<br>";
                }

                else 
                {
                    poljePass.style.border="1px solid green";
                    document.getElementById("porukaPass").innerHTML="";
                }

                if (passRep.length == 0 || pass != passRep)
                {
             		slanjeForme = false;
                    poljePassRep.style.border="1px dashed red";
                    document.getElementById("porukaPassRep").innerHTML="<br>Lozinke se ne podudaraju!<br>";
                }
                else 
                {
                    poljePassRep.style.border="1px solid green";
                    document.getElementById("porukaPassRep").innerHTML="";
                }

                if (slanjeForme != true) 
                {
                	event.preventDefault();
            	}
            }

        </script>
		</section>
	</div>
	</main>

	<footer>
		<div class="container">
			<span id="cr">&#169; RP DIGITAL GMBH | ALLE RECHTE VORBEHALTEN</span><br>
			<span id="cm">Content Management by InterRed</span><br><br/>
			<span id="me">Barbara Deskar | bdeskar@tvz.hr | 2019</span>
		</div>
	</footer>
</body>
</html>


