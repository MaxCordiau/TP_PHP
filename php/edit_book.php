<?php require_once "data_connect.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="edit-book">
        <h1 class="edit-book_d">Modifier un livre</h1>
        <?php
        // Vérifie si l'identifiant du livre est passé en tant que paramètre GET
        if (isset($_GET['id'])) {
            $bookId = $_GET['id'];

            // Connexion à la base de données MySQL
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Requête pour récupérer les informations du livre à modifier
            $query = "SELECT * FROM books WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $bookId);
            $stmt->execute();
            $book = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($book) {
                // Affichage du formulaire pré-rempli avec les informations du livre
                echo "<form action='edit_book_process.php' method='post'>";
                echo "<input type='hidden' name='id' value='".$book['id']."'>";
                echo "<div class='mb-3'>";
                echo "<label for='bookTitle' class='form-label'>Titre</label>";
                echo "<input type='text' class='form-control' id='bookTitle' name='title' value='".$book['title']."'>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='bookAuthor' class='form-label'>Auteur</label>";
                echo "<input type='text' class='form-control' id='bookAuthor' name='author' value='".$book['author']."'>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='bookYear' class='form-label'>Année</label>";
                echo "<input type='number' class='form-control' id='bookYear' name='year' value='".$book['year']."'>";
                echo "</div>";
                echo "<div class='mb-3'>";
                echo "<label for='bookGenre' class='form-label'>Genre</label>";
                echo "<input type='text' class='form-control' id='bookGenre' name='genre' value='".$book['genre']."'>";
                echo "</div>";
                echo "<button type='submit' class='btn btn-primary'>Enregistrer les modifications</button>";
                echo "</form>";
            } else {
                echo "<p class='text-danger'>Livre non trouvé.</p>";
            }
        } else {
            echo "<p class='text-danger'>Identifiant du livre non fourni.</p>";
        }