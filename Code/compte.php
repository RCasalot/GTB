<?php
session_start();

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
} else {
    $grade = "Non défini";
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
<div class="header" style="background-color:#665264">
  <a href="index2.php" target="_blank"><img src="./smica.png" width="500"></a>
</div>

<div class="topnav">
  <a href="index2.php"><i class="fa fa-fw fa-home"></i> Accueil</a>
  <a href="https://www.carnus.fr" target= "_blank "><i class="fa-solid fa-circle-info"></i> Info</a>
  <a href="logout.php" style="float:right"><i class="fa-solid fa-power-off"></i> Déconnexion</a>
  <a class="active" href="compte.php" style="float:right"><i class="fa-solid fa-user"></i> <?php echo $utilisateur; ?></a>
</div>
	<div class="succes">
		<h1 color="white"> Bienvenue <?php echo $utilisateur; ?> !</h1></br>
		<h1 color="white">Votre grade : <?php echo $grade; ?> </h1></br>   
	</div>
</body>
</html>


