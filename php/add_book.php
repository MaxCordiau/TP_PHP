<?php require_once "data_connect.php"; ?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un livre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="edit-book">
        <h1 class="edit-book_d">Ajouter un livre</h1>
        <form action="add_book_process.php" method="post">
            <div class="edit-book3">
                <label for="bookTitle" class="form-label">Titre</label>
                <input type="text" class="form-control" id="bookTitle" name="title">
            </div>
            <div class="edit-book3">
                <label for="bookAuthor" class="form-label">Auteur</label>
                <input type="text" class="form-control" id="bookAuthor" name="author">
            </div>
            <div class="edit-book3">
                <label for="bookYear" class="form-label">Année</label>
                <input type="number" class="form-control" id="bookYear" name="year">
            </div>
            <div class="edit-book3">
                <label for="bookGenre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="bookGenre" name="genre">
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
