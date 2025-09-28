<?php 
    ///connexion avec la base etablie 
  require_once 'configuration/config.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body style="background-color: #88268C;">
<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="row g-0">
      <!-- Texte motivation -->
      <div class="col-md-5 p-5 bg-light">
        <h2>Rejoignez-nous !</h2>
        <p>Découvrez vos projets, organisez vos tâches et restez motivé chaque jour.</p>
      </div>
      <!-- Formulaire -->
      <div class="col-md-6 p-5">
        <h3>Connexion</h3>
        <form>
          <div class="mb-3">
            <label>Email</label>
            <input type="email" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Mot de passe</label>
            <input type="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Se connecter</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> 
</body>
</html>