<?php
// Démarrer la session
session_start();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion
header("Location: logout.html");
exit(); // Arrêter l'exécution du script après la redirection
?>