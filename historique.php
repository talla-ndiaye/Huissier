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
    <title>Tirage</title>
    <style>
        
       .btn-group, table {
            width: 100%;
            margin: 20px 0;
        }
        th, td {
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .dark-theme th {
            background-color: #333;
        }
        .dark-theme td, .dark-theme th {
            border-color: #555;
            color:#fff;
        }
    </style>
</head>
<body class="light-theme dark-theme">
    <header>
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="header-inner d-flex justify-content-between align-items-center">
                    <a class="navbar-brand flex-shrink-0" href="."><img src="https://yudiz.com/codepen/nft-store/logo-icon.svg" alt="logo-image" class="img-fluid"> BINGO</a>
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
                        <a href="#" class="profile"><img src="https://yudiz.com/codepen/nft-store/user-pic1.svg" alt="user-image">Talla</a>
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
    <div class="">
        <div class="container-fluid">
            <div class="nft-store-inner d-flex">
                <div class="menu-links">
                    <ul>
                        <li class="nav-item">
                            <a href="." class="d-flex align-items-center nav-link"><i class="fa fa-home" aria-hidden="true"></i> <span>Home</span></a>
                        </li>
                        <li class="nav-item ">
                            <a href="tirage.html" class="d-flex align-items-center nav-link"><i class="fa fa-square-o" aria-hidden="true"></i> <span>Tirage</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="publier.html" class="d-flex align-items-center nav-link"><i class="fa fa-fire" aria-hidden="true"></i> <span>Publier</span></a>
                        </li>
                        <li class="nav-item active">
                            <a href="#" class="d-flex align-items-center nav-link"><i class="fa fa-star" aria-hidden="true"></i> <span>Historique</span></a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="deconnecter.php" class="d-flex align-items-center nav-link"><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Se Déconnecter</span></a>
                        </li>
                    </ul>
                </div>
                <div class="nft-store-content">
                    <?php
                    // Placez votre code de connexion à la base de données ici
                    $servername = "localhost";
                    $dbusername = "Talla";
                    $dbpassword = "Talla";
                    $dbname = "resultats";

                    // Créer la connexion à la base de données
                    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                    // Vérifier la connexion à la base de données
                    if ($conn->connect_error) {
                        die("Connexion échouée: " . $conn->connect_error);
                    }

                    // Récupérer les résultats du tirage depuis la base de données
                    $sql = "SELECT * FROM resultat";
                    $result = $conn->query($sql); ?>



                        <div class="btn-group btn-group-lg" >
                                <button type="button" class="btn btn-outline-primary">Apple</button>
                                <button type="button" class="btn btn-warning">Samsung</button>
                                <button type="button" class="btn btn-success">Sony</button>
                        </div>
                    <?php
                    // Vérifier s'il y a des résultats à afficher
                    
                    if ($result->num_rows > 0) {
                        echo "<table class='table table-primary'>";
                        echo "<thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom Huissier</th>
                            <th>Prénom Huissier</th>
                            <th>Date</th>
                            <th>Heure</th>
                            <th>Résultat</th>
                            <th>Jackpot</th>
                        </tr>
                        </thead>";
                        echo "<tbody>";
                        // Afficher chaque résultat dans une ligne du tableau
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                                echo "<td>" . $row["id_resultat"] . "</td>";
                                echo "<td>" . $row["NOM_HUISSIER"] . "</td>";
                                echo "<td>" . $row["PRENOM_HUISSIER"] . "</td>";
                                echo "<td>" . $row["DATE_TIRAGE"] . "</td>";
                                echo "<td>" . $row["Heure_TIRAGE"] . "</td>";
                                echo "<td>" . $row["RESULTAT"] . "</td>";
                                echo "<td>" . $row["MONTANT_JACKPOT"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>
                        </table>";
                    } else {
                        echo "<p>Aucun résultat trouvé</p>";
                    }
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
