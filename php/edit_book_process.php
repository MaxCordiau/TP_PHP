<?php require_once "data_connect.php"; ?>

<?php
// Vérifie si les données du formulaire sont soumises via la méthode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifie si les champs requis sont définis et non vides
    if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['year']) && isset($_POST['genre']) &&
        !empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['year']) && !empty($_POST['genre'])) {
        
        // Récupère les données du formulaire
        $bookId = $_POST['id'];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];

        // Prépare et exécute la requête de mise à jour du livre
        $query = "UPDATE books SET title = :title, author = :author, year = :year, genre = :genre WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $bookId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':year', $year);
        $stmt->bindParam(':genre', $genre);
        $stmt->execute();

        // Redirige l'utilisateur vers la page d'accueil après la mise à jour
        header("Location: accueil.php");
        exit();
    } else {
        // Si les champs requis ne sont pas définis ou vides, redirige avec un message d'erreur
        header("Location: edit_book.php?id=".$_POST['id']."&error=true");
        exit();
    }
} else {
    // Redirige avec un message d'erreur si les données ne sont pas soumises via POST
    header("Location: edit_book.php?id=".$_POST['id']."&error=true");
    exit();
}
?>
