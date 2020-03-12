<?php
	include 'connect.php';

	if (isset($_POST["title"]))
	{
		$picture = $_FILES['pphoto']['name'];
		$title=htmlspecialchars($_POST['title'], ENT_QUOTES);
		$about=htmlspecialchars($_POST['about'], ENT_QUOTES);
		$content=htmlspecialchars($_POST['content'], ENT_QUOTES);
		$category=$_POST["category"];
		$date=date('d.m.Y.');
		if(isset($_POST['archive']))
		{
			$archive=1;
		}
		else
		{
			$archive=0;
		}

		$target_dir = 'img/'.$picture;
		move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_dir);
		$query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva ) 
		VALUES ('$date', '$title', '$about', '$content', '$picture', '$category', '$archive')";

		$result = mysqli_query($dbc, $query) or die('Error querying database.');
		mysqli_close($dbc);
	}
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
					<li ><a class="anav " href="index.php">HOME</a></li>
					<li><a class="anav <?php if($category=="Technology"){ echo 'active';}?>" href="kategorija.php?id=Technology">TECHNOLOGY</a></li>
					<li><a class="anav <?php if($category=="Design"){ echo 'active';}?>" href="kategorija.php?id=Design">DESIGN</a></li>
					<li><a class="anav " href="unos.php">UNOS</a></li>
					<li><a class="anav" href="administracija.php">ADMINISTRACIJA</a></li>
				</ul>
			</nav>
		</div>
	</header>

	<main>
		<div class="container">
			<section>
				<h2><a href="#"><?php echo $category;?></a></h2>
				<article class="artbig">
				<div class="acont">
					<h3 class="h3big"><?php echo $title;?></h3>					
					<div class="time"><?php echo $date ?></div>
					<figure><img class="artimg" <?php echo "src='img/$picture'";?>></figure><br/>
					<h4><?php echo $about;?></h4><br/>
					<p><?php echo $content;?></p>
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