<?php
	session_start();
	include 'connect.php';
	define('UPLPATH', 'img/');

	$uspjesnaPrijava=false;
	if (isset($_POST['login'])) 
	{
		$pokusajPrijave=true;
		 $prijavaImeKorisnika = $_POST['user'];
		 $prijavaLozinkaKorisnika = $_POST['pw'];
		 $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnik
		 WHERE korisnicko_ime = ?";
		 $stmt = mysqli_stmt_init($dbc);
		 if (mysqli_stmt_prepare($stmt, $sql)) 
		 {
			 mysqli_stmt_bind_param($stmt, 's', $prijavaImeKorisnika);
			 mysqli_stmt_execute($stmt);
			 mysqli_stmt_store_result($stmt);
		 }
		 mysqli_stmt_bind_result($stmt, $imeKorisnika, $lozinkaKorisnika,$levelKorisnika);
		 mysqli_stmt_fetch($stmt);
		 //Provjera lozinke
		 if (password_verify($_POST['pw'], $lozinkaKorisnika) &&
		mysqli_stmt_num_rows($stmt) > 0) 
		 {
		 	$uspjesnaPrijava = true;
		 	if($levelKorisnika == 1) 
		 	{
				$admin = true;
			}
			else 
			{
				$admin = false;
			}
			 //postavljanje session varijabli
			 $_SESSION['$username'] = $imeKorisnika;
			 $_SESSION['$level'] = $levelKorisnika;
			 } 
		else 
		{
	 			$uspjesnaPrijava = false;
	 			echo '<script type="text/javascript">
							alert("Neispravno korisnicko ime ili lozinka!");
					</script>';
		}

	}
			// Brisanje i promijena arhiviranosti
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Administracija</title>
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
					<li><a class="anav" href="unos.php">UNOS</a></li>
					<li><a class="anav active" href="#">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
	<div class="container">
	<section>
	<?php
		if (($uspjesnaPrijava == true && $admin == true) || (isset($_SESSION['$username'])) && $_SESSION['$level'] == 1)
		{
			echo '<div class="logged">Bok '. $_SESSION['$username']. '!<br/>Ovdje mozete uredivati vijesti.<br/><br/>
			<a class="form-button" href="odjava.php">Log out</a>
			</div>';

			$query = "SELECT * FROM vijesti";
			$result = mysqli_query($dbc, $query);
			while($row = mysqli_fetch_array($result)) 
			{
				 echo '<h2>Vijest #'.$row['id'].'</h2>
				 <form enctype="multipart/form-data" action="" method="POST">
				 <div class="form-item">
				 <label for="title">Naslov vijesti:</label>
				 <div class="form-field">
				 <input type="text" name="title" class="form-field-textual"
				value="'.$row['naslov'].'">
				 </div>
				 </div>
				 <div class="form-item">
				 <label for="about">Kratki sadržaj vijesti (do 50
				znakova):</label>
				 <div class="form-field">
				 <textarea name="about" id="" cols="30" rows="10" class="form-field-textual">'.$row['sazetak'].'</textarea>
				 </div>
				 </div>
				 <div class="form-item">
				 <label for="content">Sadržaj vijesti:</label>
				 <div class="form-field">
				 <textarea name="content" id="" cols="30" rows="10" class="form-field-textual">'.$row['tekst'].'</textarea>
				 </div>
				 </div>
				 <div class="form-item">
				 <label for="pphoto">Slika:</label>
				 <div class="form-field">
				 <input type="file" class="input-text nobord" id="pphoto"
				value="'.$row['slika'].'" name="pphoto"/> <br><img src="' . UPLPATH .
				$row['slika'] . '" width=100px>
				 </div>
				 </div>
				 <div class="form-item">
				 <label for="category">Kategorija vijesti:</label>
				 <div class="form-field">
				 <select name="category" id="" class="form-field-textual">';
				 if ($row['kategorija']=='Technology')
				{
					echo '<option value="Technology" selected>Technology</option>
					 <option value="Design">Design</option>';
				}
				else
				{
					echo '<option value="Technology">Technology</option>
					 <option value="Design" selected>Design</option>';
				}
				echo'
				 </select>
				 </div>
				 </div>
				 <div class="form-item">
				 <label>Spremiti u arhivu:
				 <div class="form-field">';
				 if($row['arhiva'] == 0) 
				 {
					 echo '<input type="checkbox" name="archive" id="archive"/>
					Arhiviraj?';
				 } 
				 else 
				 {
					 echo '<input type="checkbox" name="archive" id="archive"
					checked/> Arhiviraj?';
				 }
				 echo '</div>
				 </label>
			
				 </div>
				 <div class="form-item">
				 <input type="hidden" name="id" class="form-field-textual"
				value="'.$row['id'].'">
				 <button class="form-button" type="reset" value="Poništi">Poništi</button>
				 <button class="form-button" type="submit" name="update" value="Prihvati">
				Izmjeni</button>
				 <button class="form-button" type="submit" name="delete" value="Izbriši">
				Izbriši</button>
				 </div>
				 </form>';
			}
		}
		else if ($uspjesnaPrijava == true && $admin == false) 
		{
		echo '<div class="logged">Bok ' . $imeKorisnika . '!<br/>Uspješno ste prijavljeni, ali niste administrator.<br/><br/><br/>
			<a class="form-button" href="odjava.php">Log out</a>
			</div>';
 		} 
 		else if (isset($_SESSION['$username']) && $_SESSION['$level'] == 0) 
 		{
 			echo '<div class="logged">Bok ' . $_SESSION['$username'] . '!<br/>Uspješno ste prijavljeni, ali niste administrator.<br/><br/><br/>
			<a class="form-button" href="odjava.php">Log out</a>
			</div>';
 		} 
 		else if ($uspjesnaPrijava == false)
 		{
		echo'
		<h2>Log in</h2>
		<form name="login" method="POST" action="">
			<div class="form-item">
				<label for="user">Korisnicko ime:</label>
				<div class="form-field">
					<input type="text" id="user" name="user" class="form-field-textual">
					<span id="porukaUser" class="bojaPoruke">
				</div>
			</div>

			<div class="form-item">
				<label for="pw">Lozinka:</label>
				<div class="form-field">
					<input type="password" id="pw" name="pw" class="form-field-textual">
					<span id="porukaPw" class="bojaPoruke">
				</div>
			</div>

			<div class="form-item">
				<button class="form-button" type="submit" name="login" value="login" id="login">Log in</button>
			</div>
		</form>
		   	<div class="form-align">
            	<p>Niste registrirani? &nbsp;
            	<a href="registracija.php" class="form-button">Registracija</a></p>
            </div>
        <script type="text/javascript">
        	document.getElementById("login").onclick = function(event)
        {
            var slanje_forme = true;
            var user = document.getElementById("user").value;
            var pw = document.getElementById("pw").value;

            document.getElementById("porukaUser").style.color = "red";
            document.getElementById("porukaPw").style.color = "red";

            if(user.length == 0)
            {
                slanje_forme = false;
                document.getElementById("porukaUser").innerHTML = "Korisnicko ime ne smije biti prazno.<br/>";
            }
            else
            {
                document.getElementById("porukaUser").innerHTML = "";
            }

            if(pw.length == 0)
            {
                slanje_forme = false;
                document.getElementById("porukaPw").innerHTML = "Lozinka ne smije biti prazna.<br/>";
            }
            else
            {
                document.getElementById("porukaPw").innerHTML = "";            	
            }

            if(slanje_forme != true)
            {
                event.preventDefault();
            }
        }
        </script>
		';
    }

	?>
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

<?php

	if(isset($_POST['delete']))
	{
		 $id=$_POST['id'];
		 $query = "DELETE FROM vijesti WHERE id=$id ";
		 $result = mysqli_query($dbc, $query);
	}
	if(isset($_POST['update']))
	{
		$id=$_POST['id'];
		$title=htmlspecialchars($_POST['title'], ENT_QUOTES);
		$about=htmlspecialchars($_POST['about'], ENT_QUOTES);
		$content=htmlspecialchars($_POST['content'], ENT_QUOTES);
		$category=$_POST['category'];
		if(isset($_POST['archive'])){
		 $archive=1;
		}else{
		 $archive=0;
		}
		if (($_FILES['pphoto']['name']!=""))
		{
			$picture = $_FILES['pphoto']['name'];
			$target_dir = 'img/'.$picture;
			move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
		}
		else 
		{			
			$pq = "SELECT slika FROM vijesti WHERE id=$id ";
			$result = mysqli_query($dbc, $pq);
			$pic = mysqli_fetch_array($result);
			$picture= $pic['slika'];
		}
		
		$query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content',
		slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
		$result = mysqli_query($dbc, $query);
	}

?>