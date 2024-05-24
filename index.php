<?php 
// Démarrer la session
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['username']) AND !isset($_SESSION['password'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ./Formulaire/index.html");
    exit(); // Arrêter l'exécution du script après la redirection
}

// Récupérer le nom d'utilisateur depuis la session
$username = $_SESSION['username'];
$password = $_SESSION['password'];

// Base de données paramètres de connexion
$servername = "localhost";
$dbusername = "Talla";
$dbpassword = "Talla";
$dbname = "Bingo";

// Créer la connexion à la base de données
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Vérifier la connexion à la base de données
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparer la requête SQL pour récupérer le nom et le prénom de l'utilisateur
$sql = "SELECT nom, prenom FROM huissier WHERE username = '$username'";
$result = $conn->query($sql);

// Vérifier si la requête a réussi
if ($result->num_rows > 0) {
    // Récupérer les données de l'utilisateur
    $row = $result->fetch_assoc();
    $nom = $row['nom'];
    $prenom = $row['prenom'];
} else {
    // Gérer le cas où aucun utilisateur correspondant n'est trouvé
    $nom = "inconnu";
    $prenom = "inconnu";
}

// Fermer la connexion à la base de données
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script defer src="main.js"></script>
    <title>Document</title>
    
</head>
<body class="light-theme dark-theme">
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="header-inner d-flex justify-content-between align-items-center">
                    <a class="navbar-brand flex-shrink-0" href="index.php"><img src="https://yudiz.com/codepen/nft-store/logo-icon.svg" alt="logo-image" class="img-fluid"> BINGO</a>
                    <div class="header-content d-flex align-items-center justify-content-end">
                        <form class="d-flex justify-content-end align-items-center">
                            <div class="search-icon">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            </div>
                            <label class="switch flex-shrink-0 mb-0">
                                <input id="checkbox" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </form>
                        <div class="dropdown">
                            <summary class="avatar" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://yudiz.com/codepen/nft-store/user-pic1.svg" alt="user-image"><?php echo "$username"?>
                            </summary>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account</a>
                                <a class="dropdown-item" href="#">Settings</a>
                                <a class="dropdown-item" href="#">Help</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </nav>
        </div>
    </header>
    <div class="nft-store">
        <div class="container-fluid">
            <div class="nft-store-inner d-flex">
                <div class="menu-links">
                    <ul>
                        <li class="nav-item active">
                            <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-home" aria-hidden="true"></i><span>Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="tirage.html" class="d-flex align-items-center nav-link"><i class="fa fa-square-o" aria-hidden="true"></i><span>Tirage</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="publier.html" class="d-flex align-items-center nav-link"><i class="fa fa-fire" aria-hidden="true"></i><span>Publier</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="historique.php" class="d-flex align-items-center nav-link"><i class="fa fa-star" aria-hidden="true"></i><span>Historique</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="deconnecter.php" class="d-flex align-items-center nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Se Déconnecter</span></a>
                        </li>
                    </ul>
                </div>
                <div class="nft-store-content">
                    <div class="nft-up-content">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="fire-bubble-art d-flex justify-content-between align-items-center">
                                    <img src="images/po4.jpg" alt="fire-bubble-image" class="img-fluid fire-image fire-width">
                                    <div class="fire-content fire-width">
                                        <h3 class="mb-0">Publication</h3>
                                        <div class="fire-time d-flex justify-content-between">
                                            <div class="current-bid">
                                                <h4>Date</h4>
                                                <span id="current-date"></span>
                                            </div>
                                            <div class="auction">
                                                <h4>Prochaine Publication </h4>
                                                <span id="time-remaining"></span>
                                            </div>
                                            <span class="middle-line"></span>
                                        </div>
                                        <div class="d-flex fire-links">
                                            <a href="#" class="theme-btn">Publier</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <figure class="paint-image" style="background: url('images/po2.jpg') no-repeat center center / cover;">
                                    <h1>BINGO</h1>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="trending">
                        <div class="trending-title">
                            <div class="row justify-content-between align-items-center">
                                <div class="col-6">
                                    <h2>Actions</h2>
                                </div>
                            </div>
                        </div>
                        <div class="trending-grid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="trending-content">
                                        <img src="images/po1.jpg" alt="card-images" class="img-fluid">
                                        <div class="trending-desc">
                                            <h4 class="user-title">Derniere Publication</h4>
                                            <h3 class="user-position">10/12/2024</h3>
                                            <div class="bid d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Heure</h5>
                                                    <span>20h:30s</span>
                                                </div>
                                                <div class="d-flex fire-links">
                                                    <a href="publier.html" class="theme-btn">Nouvelle Publication</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="trending-content">
                                        <img src="images/po5.jpg" alt="card-images" class="img-fluid">
                                        <div class="trending-desc">
                                            <h4 class="user-title">Dernier Tirage</h4>
                                            <h3 class="user-position">10/12/2024</h3>
                                            <div class="bid d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>Resulat</h5>
                                                    <span>1-2-3-4-5-6</span>
                                                </div>
                                                <div class="d-flex fire-links">
                                                    <a href="tirage.html" class="theme-btn">Nouveau Tirage</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="trending-content">
                                        <img src="images/po6.jpg" alt="card-images" class="img-fluid">
                                        <div class="trending-desc">
                                            <h4 class="user-title">HISTORIQUE</h4>
                                            <h3 class="user-position">APPUYER</h3>
                                            <div class="bid d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5>POUR VISUALISER</h5>
                                                    <span>TOUTS LES RESULTATS</span>
                                                </div>
                                                <div class="d-flex fire-links">
                                                    <a href="#" class="theme-btn">Voir l'Historique</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
