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
  $titrep = $_POST['titrep'];
  $motivationp= $_POST['motivationp'];
  $descriptiionp = $_POST['descriptiionp'];
  $datedebp = $_POST['datedebp'];
  $deadlinep = $_POST['deadlinep'];
 
  try {
    $sql = "INSERT INTO projet (idu, titrep, motivationp, descriptiionp, datedebp, deadlinep) VALUES (:idu, :titrep, :motivationp, :descriptiionp, :datedebp, :deadlinep)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idu', $idu);
    $stmt->bindParam(':titrep', $titrep);
    $stmt->bindParam(':descriptiionp', $descriptiionp);
    $stmt->bindParam(':motivationp', $motivationp);
    $stmt->bindParam(':datedebp', $datedebp);
    $stmt->bindParam(':deadlinep', $deadlinep);
    $stmt->execute();
     ///header('location:modifier.php');
     echo"c'est bon";
  }catch(PDOException $e){
    echo"une  erreur". $e->getMessage();
  }
}
?>
