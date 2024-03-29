<?php
session_start();
 
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
 
// Afficher les informations de l'utilisateur
$user_id = $_SESSION["user_id"];
 
 
        // Connexion à la base de données
        $conn = new mysqli("localhost", "bob2", "3737!", "fred3737c");
 
 
// Vérifier la connexion
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}
 
// Requête de sélection de l'utilisateur
$sql = "SELECT nom, email, naissance, codepostal FROM utilisateurs WHERE id = '$user_id'";
$result = $conn->query($sql);
 
if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nom = $row["nom"];
    $email = $row["email"];
    $naissance = $row["naissance"];
    $codepostal = $row["codepostal"];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Espace Utilisateur</title>
</head>
<body>
    <h2>Bienvenue, <?php echo $nom; ?> !</h2>
    <p>Email : <?php echo $email; ?></p>
    <p>Naissance : <?php echo $naissance; ?></p>
    <p>Code postal : <?php echo $codepostal; ?></p>
    <a href="logout.php">Se déconnecter</a>
</body>
</html>
