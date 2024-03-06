<?php
require_once "data_connect.php";

// Vérifie si l'identifiant du livre est passé en tant que paramètre GET
if (isset($_GET['id'])) {
    // Récupère l'identifiant du livre à supprimer
    $bookId = $_GET['id'];

    // Connexion à la base de données MySQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prépare et exécute la requête de suppression du livre
    $query = "DELETE FROM books WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $bookId);
    $stmt->execute();

    // Redirige l'utilisateur vers la page d'accueil après la suppression
    header("Location: accueil.php");
    exit();
} else {
    // Si l'identifiant du livre n'est pas passé en paramètre GET, renvoyer une erreur 400
    http_response_code(400);
    echo "Identifiant du livre non fourni";
}
?>
