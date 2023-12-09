<?php
$host = "localhost";
$dbname = "carnet_contacts";
$user = "root";
$password = "";

// Connexion à la base de données 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
// Opérations de gestion des contacts 
