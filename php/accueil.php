<?php require_once "data_connect.php"; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Bibliothèque</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Bibliothèque</h1>
        <a href="add_book.php" class="btn btn-primary mb-4">Ajouter un livre</a>
        <!-- Tableau des livres -->
        <table class="table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>Genre</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    // Récupération des livres depuis la base de données
                    $query = "SELECT * FROM books";
                    $stmt = $pdo->query($query);
                    $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } catch (PDOException $e) {
                    // En cas d'erreur de connexion à la base de données, afficher un message d'erreur
                    echo "Erreur de connexion à la base de données : " . $e->getMessage();
                    exit();
                }

                // Affichage des livres dans le tableau avec des boutons Modifier.
                foreach ($books as $book) {
                    echo "<tr>";
                    echo "<td>".$book['title']."</td>";
                    echo "<td>".$book['author']."</td>";
                    echo "<td>".$book['year']."</td>";
                    echo "<td>".$book['genre']."</td>";
                    // Bouton Modifier avec lien vers la page de modification
                    echo "<td>
                            <a href='edit_book.php?id=".$book['id']."' class='btn btn-primary'>Modifier</a>
                            <a href='delete_book.php?id=".$book['id']."' class='btn btn-danger'>Supprimer</a>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Script Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
