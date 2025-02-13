<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Connexion à votre espace</title>
</head>
<body>
    <div class="header"></div>
    <h1>Connexion à votre espace</h1>
    <form action="backend.php" method="post">
        <label for="Mail">Adresse Mail:</label>
        <input type="text" name="mail" id="mail" required>

        <label for="password">Mot de passe:</label>
        <input type="password" name="password" id="password" required> <br><br>

        <input type="submit" value="Connexion">
        


<html>
<head>
    <title>Générateur de QR Code</title>
</head>
<body>
    
    <h3>Si vous n'avez pas de compte inscrivez-vous <a href="adduser.php">ici</a> </h3>
</body>
</html>

    </form>
</div>    
</body>
</html> 