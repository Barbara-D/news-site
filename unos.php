<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>UNOS</title>
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
					<li><a class="anav active" href="unos.php">UNOS</a></li>
					<li><a class="anav" href="administracija.php">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
	<div class="container">
	<section>
		<h2>Unos vijesti</h2>
		<form enctype="multipart/form-data" name="unos" method="POST" action="skripta.php">
			<div class="form-item">
				<label for="title">Naslov vijesti</label>
				<div class="form-field">
					<input type="text" id="title" name="title" class="form-field-textual">
					<span id="porukaTitle" class="bojaPoruke">
				</div>
			</div>

			<div class="form-item">
				<label for="about">Kratki sadržaj vijesti (do 100
				znakova)</label>
				<div class="form-field">
				 	<textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
				 	<span id="porukaAbout" class="bojaPoruke">
				 </div>
			</div>

			<div class="form-item">
				<label for="content">Sadržaj vijesti</label>
				<div class="form-field">
					<textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
					<span id="porukaContent" class="bojaPoruke">
				</div>
			</div>

			<div class="form-item">
				<label for="pphoto">Slika: </label>
				<div class="form-field">
					<input class="nobord" type="file" accept="image/*"
					class="input-text" id="pphoto" name="pphoto"/><br/>
					<span id="porukaSlika" class="bojaPoruke">
				</div>
			</div>

			<div class="form-item">
				<label for="category">Kategorija vijesti</label>
				<div class="form-field">
					<select name="category" id="category" class="form-field-textual">
						<option value="" disabled selected>Odaberite kategoriju</option>
						<option value="Technology">Technology</option>
						<option value="Design">Design</option>
					</select>
					<span id="porukaKategorija" class="bojaPoruke">
				</div>
			</div>

			<div class="form-item">
				<label>Spremiti u arhivu:&nbsp
				<span class="form-field">
					<input type="checkbox" name="archive">
				</span>
				</label>
			</div>

			<div class="form-item">
				<button class="form-button" type="reset" value="Poništi">Poništi</button>
				<button class="form-button" type="submit" value="Prihvati" id="slanje">Prihvati</button>
			</div>
		</form>
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



<script type="text/javascript">
	 // Provjera forme prije slanja
	 document.getElementById("slanje").onclick = function(event) 
	 {
		 var slanjeForme = true;

		 // Naslov 
		 var poljeTitle = document.getElementById("title");
		 var title = document.getElementById("title").value;
		 if (title.length < 5 || title.length > 50) 
		{
			 slanjeForme = false;
			 poljeTitle.style.border="1px dashed red";
			 document.getElementById("porukaTitle").innerHTML="Naslov vijesti mora imati između 5 i 50 znakova (ima ih "+title.length+")!<br>";
	 	} 
	 	else 
	 	{
			 poljeTitle.style.border="1px solid green";
			 document.getElementById("porukaTitle").innerHTML="";
		}

		//Kratki sadrzaj
		var poljeAbout = document.getElementById("about");
		var about = document.getElementById("about").value;
		if (about.length < 10 || about.length > 100) 
		{
			 slanjeForme = false;
			 poljeAbout.style.border="1px dashed red";
			 document.getElementById("porukaAbout").innerHTML="Kratki sadržaj mora imati između 10 i 100 znakova (ima ih "+about.length+")!<br>";
	 	} 
	 	else 
	 	{
			 poljeAbout.style.border="1px solid green";
			 document.getElementById("porukaAbout").innerHTML="";
	 	}

	 // Sadržaj 
	 var poljeContent = document.getElementById("content");
	 var content = document.getElementById("content").value;
	 if (content.length == 0) 
	 {
		 slanjeForme = false;
		 poljeContent.style.border="1px dashed red";
		 document.getElementById("porukaContent").innerHTML="Sadržaj mora biti unesen!<br>";
	 } 
	 else 
	 {
		 poljeContent.style.border="1px solid green";
		 document.getElementById("porukaContent").innerHTML="";
	 }

	 // Slika
	 var poljeSlika = document.getElementById("pphoto");
	 var pphoto = document.getElementById("pphoto").value;
	 if (pphoto.length == 0) 
	 {
		 slanjeForme = false;
		 poljeSlika.style.border="1px dashed red";
		 document.getElementById("porukaSlika").innerHTML="Slika mora biti unesena!<br>";
	 }
	 else 
	 {
		 poljeSlika.style.border="1px solid green";
		 document.getElementById("porukaSlika").innerHTML="";
	 }

	 // Kategorija
	 var poljeCategory = document.getElementById("category");
	 if(document.getElementById("category").selectedIndex == 0) 
	 {
		 slanjeForme = false;
		 poljeCategory.style.border="1px dashed red";
		document.getElementById("porukaKategorija").innerHTML="Kategorija mora biti odabrana!<br>";
	 } 
	 else 
	 {
		 poljeCategory.style.border="1px solid green";
		 document.getElementById("porukaKategorija").innerHTML="";
	 }

	 if (slanjeForme != true) 
	 {
		event.preventDefault();
	 }

	 };
 </script>