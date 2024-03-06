<?php

require_once "data_connect.php";

// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $genre = $_POST['genre'];

    // Requête d'insertion des données dans la base de données
    $query = "INSERT INTO books (title, author, year, genre) VALUES (:title, :author, :year, :genre)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':genre', $genre);
    $stmt->execute();

    // Redirection vers la page d'accueil après l'ajout du livre
    header("Location: accueil.php");
    exit();
}
?>
