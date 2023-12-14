<!DOCTYPE html>
<html lang="pl">


	<head>
		<meta charset="utf-8"/>
		<title>Biblioteka</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>

	
	<body>
	
		<header>
			<h1>Biblioteka w Książkowicach Małych</h1>
		</header>
	
		<div id="lewy">
			<h4>Dodaj czytelnika</h4>
			<form action="biblioteka.php" method="post">
				Imię:<input type="text" id="imie" name="imie"/><br>
				Nazwisko:<input type="text" id="nazwisko" name="nazwisko"/><br>
				Symbol:<input type="number" id="symbol" name="symbol"/><br>
				<input type="submit" value="AKCEPTUJ" />
			</form>
			<?php
				//SKRYPT 1
				$dbhost = "localhost";
				$dbuser = "root";
				$dbpass = "";
				$dbname = "biblioteka";
				
				$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				
				$imie = $_POST['imie'];
				$nazwisko = $_POST['nazwisko'];
				$symbol = $_POST['symbol'];
				
				$zapytanie1 = "INSERT INTO czytelnicy VALUES(NULL, '$imie', '$nazwisko', '$symbol')";
				
				if (mysqli_query($db, $zapytanie1)) {
					echo "Dodano czytelnika $imie $nazwisko";
				}else{
					echo "Nie dodano rekordu " . $zapytanie1 . "<br>" . $db->error;
				}
				mysqli_close($db);
			?>
		</div>
		
		<div id="srodkowy">
			<img src="biblioteka.png" alt="biblioteka"/>
			<h6>ul. Czytelników 15; Książkowice Małe</h6>
			<p><a href="mailto:biuro@bib.pl">Czy masz jakieś uwagi?</a></p>
		</div>
	
		<div id="prawy">
			<h4>Nasi czytelnicy</h4>
			<ol>
			<?php
				//SKRYPT 2
				$dbhost = "localhost";
				$dbuser = "root";
				$dbpass = "";
				$dbname = "biblioteka";
				
				$db = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
				
				if(mysqli_connect_errno()){
				echo 'Błąd połączenia z baną danych' . mysqli_connect_errno();
				exit();
				}
			
				$zapytanie = "SELECT imie, nazwisko FROM czytelnicy WHERE imie IS NOT NULL";
				
				$result = mysqli_query($db,$zapytanie);

				echo "<ol>";
			
				if(mysqli_num_rows($result) > 0 ){
					while($row = mysqli_fetch_array($result)){
						echo "<li>".$row["imie"]. " " . " " . $row["nazwisko"]. "</li>";
					}
						echo "</ol>";
				}
			
				mysqli_close($db);
			?>
			
			</ol>
		</div>
		
		<footer>
			<p>Projekt witryny: xoBartoxx</p>
		</footer>
		
		
		
	</body>


</html>