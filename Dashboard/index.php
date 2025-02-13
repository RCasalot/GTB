<?php
session_start();

// Vérifier le cookie de connexion
if (!isset($_COOKIE["connect"])) {
    setcookie("connect", 0, time() + 3600, "/"); // Cookie expire dans 1 heure
}

// Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=reservation', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// Vérification des informations de connexion
if (isset($_POST['mail']) && isset($_POST['password'])) {
    $mail = $_POST['mail'];
    $password = $_POST['password'];
    
    // Requête pour vérifier si l'utilisateur existe
    $req = $bdd->prepare('SELECT * FROM user WHERE mail = :mail');
    $req->execute(array('mail' => $mail));
    $user = $req->fetch();

    if ($user) {
        

        // Vérification du mot de passe en clair
        if ($password === $user['password']) {
            $_SESSION['id'] = $user['id'];
            setcookie("connect", 1, time() + 3600, "/"); // Cookie valide pendant 1 heure
        } else {
            echo "Mot de passe incorrect.<br>";
        }
    } else {
        echo "Utilisateur non trouvé.<br>";
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Connexion à votre espace</title>
</head>
<body>
    <div class="header">
    <?php
    echo "Bonjour " . $user['nom'] . " " . $user['prenom'];
    ?>
      </div>
      
      <div class="topnav">
        <a class="active" href="index.php" style="float:center"><i class="fa fa-fw fa-home"></i> Accueil</a>
        <a href="logout.php" style="float:right"><i class="fa-solid fa-power-off"></i> Deconnexion</a>
        <a href="https://www.carnus.fr" style="float:right"><i class="fa-solid fa-circle-info"></i> Info</a>
        
      </div>
    </br><br/></br><br/>									
	</br><br/>
    <div class="footer">
        <h2><div align="center">Lycée Charles Carnus, 12000 Rodez</div></h2>
        <div class="social-container">
          <div class="centrage">
              <a href="https://www.instagram.com/instacharlescarnusrodez/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
              <a href="https://www.facebook.com/lyceecarnus/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
              <a href="https://www.linkedin.com/company/charlescarnusrodez/?viewAsMember=true" target="_blank"><i class="fa-brands fa-linkedin"></i></i></a>
              <a href="https://github.com/boudjelaba" target="_blank"><i class="fa-brands fa-github"></i></a>
              <a href="https://twitter.com" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
          
          </div>
       </div>
</div>    
</body>
</html>