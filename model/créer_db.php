<?php
// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";

// Connexion au serveur MySQL
$conn = new mysqli($servername, $username, $password);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données: " . $conn->connect_error);
}

// Création de la base de données
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS testimonials_database";
if ($conn->query($sqlCreateDatabase) === TRUE) {
    echo "Base de données créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la base de données: " . $conn->error . "<br>";
}

// Sélection de la base de données
$conn->select_db("testimonials_database");

// Création de la table pour stocker les témoignages
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS testimonials (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(60) NOT NULL,
    message TEXT NOT NULL,
    image VARCHAR(255),
    statut VARCHAR(20) NOT NULL DEFAULT 'en attente',
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
)";
if ($conn->query($sqlCreateTable) === TRUE) {
    echo "Table créée avec succès.<br>";
} else {
    echo "Erreur lors de la création de la table: " . $conn->error . "<br>";
}

// Fermeture de la connexion
$conn->close();
?>