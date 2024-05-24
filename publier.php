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
$username = $_SESSION['username'] ;
$password = $_SESSION['password'];

// Base de données paramètres de connexion
$servername0 = "localhost";
$dbusername0 = "Talla";
$dbpassword0 = "Talla";
$dbname0 = "Bingo";

// Créer la connexion à la base de données
$conn = new mysqli($servername0, $dbusername0, $dbpassword0, $dbname0);

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
    $nom = " inconnu";
    $prenom = "inconnu";
}

// Fermer la connexion à la base de données
$conn->close();
?>
<?php
// Placez votre code de connexion à la base de données ici
$servername = "localhost";
$dbusername = "Talla";
$dbpassword = "Talla";
$dbname = "resultats";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $number1 = $_POST['number1'];
    $number2 = $_POST['number2'];
    $number3 = $_POST['number3'];
    $number4 = $_POST['number4'];
    $number5 = $_POST['number5'];
    $jackpot = $_POST['jackpot'];

    // Concaténer les nombres avec des tirets
    $resultat = "$number1-$number2-$number3-$number4-$number5";

    // Obtenir la date et l'heure actuelles
    $date_tirage = date("Y-m-d"); // Format : YYYY-MM-DD
    $heure_tirage = date("H:i"); // Format : HH:MM:SS

    // Créer la connexion à la base de données
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Vérifier la connexion à la base de données
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Préparer la requête SQL pour insérer les données dans la table resultat
    $sql = "INSERT INTO resultat (NOM_HUISSIER,PRENOM_HUISSIER, resultat, DATE_TIRAGE, Heure_TIRAGE, MONTANT_JACKPOT) VALUES ('$nom', '$prenom','$resultat', '$date_tirage', '$heure_tirage', '$jackpot')";

    // Exécuter la requête SQL
    if ($conn->query($sql) === TRUE) {
        // Rediriger l'utilisateur vers une autre page après le traitement du formulaire
        header("Location: succes.php");
        exit(); // Assurez-vous de terminer le script après la redirection
    } else {
        echo "Erreur lors de l'enregistrement du tirage: " . $conn->error;
    }

    // Fermez la connexion à la base de données ici
    $conn->close();
}
?>
