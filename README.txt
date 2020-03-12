UPUTE:

1. Extract zip file u mapu htdocs
	(npr. C:\xampp\htdocs\PWABarbaraDeskar)

2. Pokrenuti XAMPP: Apache i MySQL

3. Importati bazu rp.sql na phpMyAdmin:
	a)napraviti praznu bazu rp
	b)u nju importati file rp.sql

4. Upisati u address bar localhost/PWABarbaraDeskar/index.php

Podaci za testiranje:
KORISNICKA PRAVA
username: korisnik
password: korisnik

ADMINISTRATORSKA PRAVA
username: admin
password: admin

(za slucaj da ne mozete pokrenuti projekt, prilozeni su screenshotovi svih stranica)

__________________________________________________________________________________
Popis datoteka:
	-img/- direktorij sa slikama, u njega se takoder spremaju nove slike kod unosa clanka
	-Screenshots/- direktorij sa izgledom svih stranica
	-Zadatak/- direktorij sa zadanim izgledom naslovnice i clanka

	-administracija.php- log in na korisnicko ili administracijsko sucelje- uredivanje i brisanje clanaka
	-clanak.php- pojedinacna vijest
	-connect.php - konekcija na bazu "rp"
	-index.php - početna stranica
	-kategorija.php - prikaz svih članaka vezanih iz odredene kategorije
	-odjava.php - prekid sesije
	-registracija.php - kreiranje novog korisnickog racuna
	-rp.sql- baza podataka
	-skripta.php - služi za unos novih vijesti u bazu preko unos.php dokumenta
	-style.css - vanjski css za sve stranice
	-unos.php - unos nove vijesti