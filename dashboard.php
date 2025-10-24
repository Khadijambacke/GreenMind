<?php
///connexion avec la base etablie 
require_once 'configuration/config.php';
session_start();
if (!isset($_SESSION['nomu']) || !isset($_SESSION['prenomu'])) {
  header("Location: connection.php");
  exit;
}
date_default_timezone_set('Africa/Dakar');
//$date = date('d F Y');
$heure = date('H:i:s'); ///je vais regler ca plutard avec du javascript pour avoir l'eyre exacte sans actualiser
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
  <style>
    .nav-link:hover {
      background-color: #7d72b6;
      border-radius: 8px;

    }

    .nav-link:active {
      background-color: #7d72b6;
      border-radius: 8px;

    }

    .nav-link {
      padding: 10% 15%;

    }

    .agauche {
      margin-left: 800px;
      margin-top: 2px;
    }
  </style>
  <div class="d-flex">
    <!-- Sidebar -->
    <div class="text-white p-4" id="sidebar" style="width: 250px; height: 100vh; overflow: auto;background-color: #2c293d; ">
      <h4>Dashboard</h4>
      <ul class="nav flex-column">
        <li class="nav-item"><a href="#" class="nav-link text-white">
            <i class="bi bi-houses-fill"></i>Accueil
          </a>
        </li>
        <li class="nav-item"><a href="#" class="nav-link text-white">
            <i class="bi bi-kanban"></i>projet </a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">
            <i class="bi bi-list-task"></i>Taches</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">
            <i class="bi bi-calendar2-month-fill"></i>Calendier</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">
            <i class="bi bi-journal-bookmark-fill"></i>Notes</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link text-white">
            <i class="bi bi-box-arrow-right"></i> Deconnexions</a></li>
      </ul>
    </div>
    <!-- Contenu principal -->
    <div class="flex-grow-1 p-4" style=" overflow: auto; background-color:#d7daee; ">
      <h2>Bienvenue <?= $_SESSION['prenomu'] . ' ' . $_SESSION['nomu']; ?> 👋</h2>
      <div class="card" style="background-color:#454167;width:80px;  margin-left: 900px;margin-top: -54px;text-align:center;
    ">
        <p class="fs-32 fw-bold" id="heure" style="color: white;margin:0; padding:8px 0; text-align:center;"><?= $heure; ?></p>
      </div>
      <button type="button" class="btn  position-relative" style="margin-left: 810px;margin-top: -70px;background-color:#454167;color:white;">
        Inbox
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill" style="background-color:red;">
          99+
          <span class="visually-hidden">unread messages</span>
        </span>
      </button>
      <!-- Bouton pour ouvrir le modal -->
      <button type="button" class="btn position-relative" id="ajoutprojet"
        style="margin-left: -120px;margin-top:-70px;background-color:#454167;color:white;"
        data-bs-toggle="modal" data-bs-target="#monModal">
        +
      </button>

      <!-- Modal HTML -->
      <form action="projets/ajout.php" method="POST">
        <div id="monModal" class="modal fade" tabindex="-1">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" style=" display:flex;justify-content:center;">ajouter votre projet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label>Titre</label>
                  <input type="text" name="titrep" class="form-control" placeholder="monprojet" required>
                </div>
                <div class="mb-3">
                  <label>Description</label>
                  <input type="text" name="descriptiionp" class="form-control" placeholder="c'est un projet de.." required>
                </div>
                <div class="mb-3">
                  <label>motivation</label>

                  <select name="motivationp" id="motivationp" class="form-control">
                    <option value="">-- Sélectionnez une motivation --</option>
                    <option value="apprendre">Je veux apprendre de nouvelles choses</option>
                    <option value="experience">Je cherche une expérience professionnelle</option>
                    <option value="developper">Je veux développer mes compétences</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label>Debut</label>
                  <input type="date" name="datedebp" class="form-control">
                </div>

                <div class="mb-3">
                  <label>Deadline</label>
                  <input type="date" name="deadlinep" class="form-control">

                </div>
                <p class="text-warning"><small>la vous vos projet prennent vie.</small></p>
              </div>
              <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-primary" name="ajoutprojet">ajouter</button>
              </div>
            </div>
          </div>
        </div>
      </form>
      <!-- Bootstrap 5 JS -->
      <script src="ressources/scripts.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </div>


  </div>
  </div>
</body>

</html>