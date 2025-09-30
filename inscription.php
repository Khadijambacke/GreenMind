<?php
///connexion avec la base etablie 
require_once 'configuration/config.php';
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['inscrire'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $email = $_POST['email'];
  $passeword = password_hash($_POST['passeword'], PASSWORD_DEFAULT);
  try {
    $sql = "INSERT INTO utilisateurs (nomu, prenomu, mailu, motdepass) VALUES (:nom, :prenom, :email, :passeword)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':passeword', $passeword);
    $stmt->execute();
    echo "<script>
        alert('Inscription réussie !');
        window.location.href='connection.php';
      </script>";
    ///echo "Nouvel étudiant ajouté avec succès !";
  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    echo "<script>
    alert('email incoreect');
  </script>";
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>inscription</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body style="background-color: #88268C;">
  <div class="container" style="margin-top: 50px;max-width: 600px;margin-left: auto;margin-right:auto;border-radius:50%;">
    <div class="card shadow-lg">
      <div class="row g-0">
        <!-- Texte motivation -->
        <div class="col-md-6 p-4" style="background-color: #FCBBF1;">
          <h2>Bienvenue sur GreenMinds</h2>
          <p>Boostez votre productivité!</p>
          <p>Notez vos projets, organisez vos tâches et restez motivé chaque jour.</p>
          <p>Suivez vos projets, collaborez avec votre équipe et ne ratez aucune tâche importante.</p>
          <div class="text-center">
            <button class="btn btn-light btn-lg">
              <i class="fa-solid fa-thumbs-up me-2"></i> S'inscrire gratuitement
            </button>
          </div>
        </div>
        <!-- Formulaire -->
        <div class="col-md-6 p-4">
          <h3>Inscription</h3>
          <form action="" method="POST">
            <div class="mb-3">
              <label>Nom</label>
              <input type="Nom" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Prenom</label>
              <input type="Prenom" name="prenom" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Email</label>
              <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
              <label>Mot de passe</label>
              <input type="password" name="passeword" class="form-control" required>
            </div>
            <button id="submit" type="submit" name="inscrire" class="btn btn-primary w-100" style="background-color: #88268C;">S'inscrire</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
  |<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>