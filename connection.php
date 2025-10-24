<?php
 session_start(); 
 
///connexion avec la base etablie 
require_once 'configuration/config.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
  if (isset($_POST['connexion'])) {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE mailu = ?");
    $stmt->execute([$email]);
    $utilisateur = $stmt->fetch();
    if($utilisateur&&password_verify($password,$utilisateur['motdepass'])){
      $_SESSION['idu'] = $utilisateur['idu'];
      $_SESSION['nomu'] = $utilisateur['nomu'];
        $_SESSION['prenomu'] = $utilisateur['prenomu']; 
         $_SESSION['mailu'] = $utilisateur['mailu']; 
          setcookie("utilisateur", $utilisateur['prenomu'], time() + 500000, "/"); 
          header('location:dashboard.php');

    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body style="background-color: #88268C;">
  <div class="container" style="margin-top: 100px; max-width: 360px; margin-left:auto; margin-right:auto;">
    <div class="card shadow-lg">
      <div class="col-md-12 p-4">
        <h3 class="mb-4" style="text-align: center;">Connexion</h3>
        <form action="" method="POST">
          <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
            <label class="form-check-label" for="rememberMe">Se souvenir de moi</label>
          </div>
          <button type="submit" name="connexion" class="btn btn-primary w-100" style="background-color: #88268C;">
            <i class="fa-solid fa-right-to-bracket me-2"></i> Se connecter
          </button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>