<?php

// Vérification de la méthode de requête (doit être POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $testimonialId = $_POST['id'];
    $newTitre = $_POST['newTitre'];
    $newMessage = $_POST['newMessage'];

    // Connexion à la base de données
    include("..\model\conecter_bd.php");

    // Requête SQL UPDATE pour modifier le témoignage
    $sql = "UPDATE testimonials SET titre = '$newTitre', message = '$newMessage' WHERE id = $testimonialId";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../controller/controleur_admin.php');
    } else {
        echo "Erreur lors de la modification du témoignage : " . $conn->error;
    }

    // Fermeture de la connexion
    include("..\model\close_db.php");
} else {
    echo "Méthode de requête non autorisée.";
}
?>