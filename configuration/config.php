<?php 
///on etablit la connexion avec la base de donnee
$host = "localhost"; 
$dbname = "greenmind"; 
$user = "root"; 
$password = ""; 
try { 
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     //echo "Connexion réussie avec PDO !"; 
} catch (PDOException $e) { 
die("Erreur de connexion : " . $e->getMessage()); 
} 

/// code couleur

    ///60%:#F4F1F8;;  30:C69EE6;    10%: #6610f2;;

///
?>
