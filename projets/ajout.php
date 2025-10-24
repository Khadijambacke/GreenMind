<?php
  require_once '../configuration/config.php';
  ///include '../dashboard.php';
  session_start();
  if (!isset($_SESSION['idu'])) {
    // Si l'utilisateur n'est pas connecté, on le redirige
    header("Location: ../connection.php");
    exit;
}
$idu = $_SESSION['idu'];
///
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['ajoutprojet'])) {
  $titre = $_POST['titrep'];
  $motivation= $_POST['motivationp'];
  $descriptiion = $_POST['descriptiionp'];
  $datedebp = $_POST['datedebp'];
  $deadline = $_POST['deadlinep'];
 
  try {
    $sql = "INSERT INTO projet (idu, titrep, motivationp, descriptiionp, datedebp, deadlinep) VALUES (:idu, :titre, :motivation, :descriptiion, :datedebp, :deadline)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idu', $idu);
    $stmt->bindParam(':titrep', $titre);
    $stmt->bindParam(':descriptiionp', $descriptiion);
    $stmt->bindParam(':motivationp', $motivation);
    $stmt->bindParam(':datebp', $datebp);
    $stmt->bindParam(':deadlinep', $deadline);
    $stmt->execute();
     ///header('location:modifier.php');
     echo"c'est bon";
  }catch(PDOException $e){
    echo"une  erreur". $e->getMessage();
  }
}
?>
