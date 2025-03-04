<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["utilisateur"])){
		header("Location: login.php");
		exit();
	}

	// Connexion à la base de données
	$mysqli = new mysqli("localhost", "root", "", "site_bdd");

	// Vérification de la connexion
	if ($mysqli->connect_error) {
		die("Erreur de connexion : " . $mysqli->connect_error);
	}

	// Récupération du grade depuis la base
	$utilisateur = $_SESSION["utilisateur"];
	$sql = "SELECT grade FROM utilisateurs WHERE utilisateur = ?";
	$stmt = $mysqli->prepare($sql);
	$stmt->bind_param("s", $utilisateur);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($row = $result->fetch_assoc()) {
		$grade = $row['grade'];
		$_SESSION['grade'] = $grade; // Facultatif, si tu veux le réutiliser ailleurs
	}

	$stmt->close();
	$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
	<div class="succes">
		<h1 color="white"> Bienvenue <?php echo $grade; ?> </h1>
		<p><a href="index2.php">Votre page d'accueil.</a></p>
		<a href="logout.php">Déconnexion <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
	</div>
</body>
</html>
