<?php
$host = "localhost";
$database = "my_db";
$username = "root"; // Utilisateur par défaut pour MySQL
$password = ""; // Laissez le mot de passe vide

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}
?>