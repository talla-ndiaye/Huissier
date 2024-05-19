
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
    <title>Publier</title>
    <style>
        body.dark-theme {
            background-color: #121212;
            color: #ffffff;
        }
        .form-control, .btn {
            transition: background-color 0.3s, color 0.3s;
        }
        body.dark-theme .form-control {
            background-color: #333333;
            color: #ffffff;
            border: 1px solid #444444;
        }
        body.dark-theme .form-control::placeholder {
            color: #aaaaaa;
        }
        body.dark-theme .btn-primary {
            background-color: #444444;
            border-color: #444444;
        }
        body.dark-theme .btn-primary:hover {
            background-color: #555555;
            border-color: #555555;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            font-weight: bold;
        }
        .nft-store-content {
            padding: 2rem;
        }
        .form-container {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        body.dark-theme .form-container {
            background-color: #1e1e1e;
        }
        .form-title {
            text-align: center;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<script>
        document.addEventListener('DOMContentLoaded', function () {
            // Vérifie l'heure locale
            const currentHour = new Date().getHours();
            if (currentHour !== 20) {
                // Redirige vers ok.php si l'heure n'est pas 20h
                window.location.href = 'verification.php';
            }
        });
    </script>
<body class="light-theme dark-theme">
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="header-inner d-flex justify-content-between align-items-center">
                    <a class="navbar-brand flex-shrink-0" href="index.html"><img src="https://yudiz.com/codepen/nft-store/logo-icon.svg" alt="logo-image" class="img-fluid"> BINGO</a>
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
                        <a href="index.html" class="profile"><img src="https://yudiz.com/codepen/nft-store/user-pic1.svg" alt="user-image">Talla</a>
                        <a href="#" class="notification"><i class="fa fa-bell" aria-hidden="true"></i></a>
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
                        <li class="nav-item">
                            <a href="index.html" class="d-flex align-items-center nav-link"><i class="fa fa-home" aria-hidden="true"></i> <span>Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="tirage.html" class="d-flex align-items-center nav-link"><i class="fa fa-square-o" aria-hidden="true"></i> <span>Tirage</span></a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-fire" aria-hidden="true"></i> <span>Publier</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-star" aria-hidden="true"></i> <span>Historique</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-cog" aria-hidden="true"></i> <span>Settings</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Se Déconnecter</span></a>
                        </li>
                    </ul>
                </div>
                <div class="nft-store-content">
                    <div class="form-container">
                        <h3 class="form-title">Formulaire de Publication</h3>
                        <form id="tirage-form">
                            <div class="form-group">
                                <label for="tirage-type">Type de Tirage</label>
                                <select class="form-control" id="tirage-type" name="tirage-type">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="number1">Number 1</label>
                                <input type="number" class="form-control" id="number1" name="number1">
                            </div>
                            <div class="form-group">
                                <label for="number2">Number 2</label>
                                <input type="number" class="form-control" id="number2" name="number2">
                            </div>
                            <div class="form-group">
                                <label for="number3">Number 3</label>
                                <input type="number" class="form-control" id="number3" name="number3">
                            </div>
                            <div class="form-group">
                                <label for="number4">Number 4</label>
                                <input type="number" class="form-control" id="number4" name="number4">
                            </div>
                            <div class="form-group">
                                <label for="number5">Number 5</label>
                                <input type="number" class="form-control" id="number5" name="number5">
                            </div>
                            <div class="form-group">
                                <label for="number6">Jakpot</label>
                                <input type="number" class="form-control" id="number6" name="number6">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
