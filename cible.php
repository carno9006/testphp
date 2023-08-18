<?php 
$conn = mysqli_connect("127.0.0.1", "carno", "code37372023", "code3737"); 
if (!$conn) { die("La connexion a échoué : " . mysqli_connect_error()); } 





$user = $_Post["username"];
$mdp  = $_Post["mdp"];

$query = "SELECT username, mdp FROM test37372023 WHERE username=".$user." AND mdp=".$mdp.";


 $result = mysqli_query($conn, $query); while
 ($row = mysqli_fetch_array($result)) 
 
 { 

echo "je suis connecte";

  } 
mysqli_close($conn);
?>
