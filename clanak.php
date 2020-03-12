<?php
	include 'connect.php';
	define('UPLPATH', 'img/');
	$id=$_GET['id'];
	$query = "SELECT * FROM vijesti WHERE id=$id";
	$result=mysqli_query($dbc, $query);
	$row= mysqli_fetch_array($result);

	$datum=$row['datum'];
	$naslov=$row['naslov'];
	$sazetak=$row['sazetak'];
	$tekst=$row['tekst'];
	$slika=$row['slika'];
	$kategorija=$row['kategorija'];
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title><?php echo $naslov ?></title>
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
					<li ><a class="anav " href="index.php">HOME</a></li>
					<li><a class="anav <?php if($kategorija=="Technology"){ echo 'active';}?>" href="kategorija.php?id=Technology">TECHNOLOGY</a></li>
					<li><a class="anav <?php if($kategorija=="Design"){ echo 'active';}?>" href="kategorija.php?id=Design">DESIGN</a></li>
					<li><a class="anav " href="unos.php">UNOS</a></li>
					<li><a class="anav" href="administracija.php">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
		<div class="container">
			<section>
				<h2><a href="#"><?php echo $kategorija;?></a></h2>
				<article class="artbig">
				<div class="acont">
					<h3 class="h3big"><?php echo $naslov;?></h3>					
					<div class="time"><?php echo $datum ?></div>
					<figure><img class="artimg" <?php echo "src='img/$slika'";?>></figure><br/>
					<h4><?php echo $sazetak;?></h4><br/>
					<p><?php echo $tekst;?></p>
				</div>
				</article>
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