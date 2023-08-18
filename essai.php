<?php
// Connexion à la base de données
$servername = "127.0.0.1";
$username = "carno";
$password = "code3737";
$dbname = "code3737a";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Vérification du formulaire d'authentification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $sql = "SELECT * FROM utilisateurs WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentification réussie
        session_start();
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $user;
       // header("Location: welcome.php"); // Rediriger vers une page de bienvenue
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrect";
 
 	echo $error;
    }
}

$conn->close();
?>

