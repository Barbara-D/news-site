<?php
	include 'connect.php';
	define('UPLPATH', 'img/');
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>RP ONLINE</title>
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
					<li ><a class="anav active" href="index.php">HOME</a></li>
					<li><a class="anav"  href="kategorija.php?id=Technology">TECHNOLOGY</a></li>
					<li><a class="anav"  href="kategorija.php?id=Design">DESIGN</a></li>
					<li><a class="anav " href="unos.php">UNOS</a></li>
					<li><a class="anav" href="administracija.php">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
	<div class="container">
		<section id="s1">
			<h2><a href="kategorija.php?id=Technology">Technology</a></h2>
			<?php
				$query="SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='Technology' LIMIT 4";
				$result=mysqli_query($dbc, $query);
				$i=0;
				while ($row= mysqli_fetch_array($result))
				{
					echo "<article><a class='aart' href='clanak.php?id=".$row['id']."'>";
					echo "<figure class='smallf'>";
					echo "<img src='".UPLPATH.$row['slika']."'";
					echo "width='150' height='100'></figure>";
					echo "<div class='right'>";
					echo "<h3>".$row['naslov']."</h3>";
					echo "<p>".$row['sazetak']."</p>";
					echo "</div>";
					echo "</a></article>";
					echo "<hr/>";
				}
			?>
<!-- 
			<article><a class="aart" href="article.html">
				<figure class="smallf"><img src="img/1.jpg" alt="placeholder image" title="placeholder image" width="150" height="100"></figure>
				<div class="right">
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor neque vitae tempus quam pellentesque nec. Volutpat blandit aliquam etiam.
					<span class="author">VON AUTHOR</span></p>
				</div>
			</a></article>
			<hr/> -->
		</section>

		<section>
			<h2><a href="kategorija.php?id=Design">Design</a></h2>
			<?php
				$query="SELECT * FROM vijesti WHERE arhiva=0 AND kategorija='Design' LIMIT 4";
				$result=mysqli_query($dbc, $query);
				$i=0;
				while ($row= mysqli_fetch_array($result))
				{
					echo "<article><a class='aart' href='clanak.php?id=".$row['id']."'>";
					echo "<figure class='smallf'>";
					echo "<img src='".UPLPATH.$row['slika']."'";
					echo "width='150' height='100'></figure>";
					echo "<div class='right'>";
					echo "<h3>".$row['naslov']."</h3>";
					echo "<p>".$row['sazetak']."</p>";
					echo "</div>";
					echo "</a></article>";
					echo "<hr/>";
				}
			?>

			<!-- <article><a class="aart" href="article.html">
				<figure class="smallf"><img src="img/1.jpg" alt="placeholder image" title="placeholder image" width="150" height="100"></figure>
				<div class="right">
					<h3>Lorem Ipsum</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Auctor neque vitae tempus quam pellentesque nec. Volutpat blandit aliquam etiam.
					<span class="author">VON AUTHOR</span></p>
				</div>
			</a></article> -->
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