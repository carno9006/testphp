<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = $_POST["nom"];
        $email = $_POST["email"];
        $naissance = $_POST["naissance"];
        $codepostal = $_POST["codepostal"];


        $mot_de_passe = password_hash($_POST["mot_de_passe"], PASSWORD_DEFAULT);
 
        // Connexion à la base de données
        $conn = new mysqli("localhost", "bob2", "3737!", "fred3737c");
 
        // Vérifier la connexion
        if ( $conn ->connect_error) {
            die("Connexion échouée : " . $conn->connect_error);
        }
 
        // Requête d'insertion
        $sql = "INSERT INTO utilisateurs (nom, email, naissance, codepostal, mot_de_passe) VALUES ('$nom', '$email','$naissance', '$codepostal', '$mot_de_passe')";
 
        if ($conn->query($sql) === TRUE) {
            echo "Inscription réussie.";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
 
        $conn->close();
    }
    ?>
    <form method="post" action="">
        <label for="nom">Nom :</label>
       <input type="text" id="nom" name="nom" required><br>
 
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>
 
        <label for="naissance">Naissance :</label>
       <input type="text" id="naissance" name="naissance" required><br>
       
       <label for="codepostal">Code postal :</label>
       <input type="text" id="codepostal" name="codepostal" required><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>
 


        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>