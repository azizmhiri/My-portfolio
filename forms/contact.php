<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Détails de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparer et lier
$stmt = $conn->prepare("INSERT INTO formulaire (name, email, subject, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $subject, $message);

// Récupérer les données POST
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Exécuter la requête
if ($stmt->execute()) {
    echo "OK";
} else {
    echo "Error: " . $stmt->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();


?>
