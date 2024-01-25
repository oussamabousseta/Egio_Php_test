<?php

// Vérification de la méthode de requête (doit être POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération de l'identifiant du témoignage à rejeter depuis le formulaire
    if (isset($_POST['id'])) {
        $testimonialId = $_POST['id'];

        // Connexion à la base de données
        include("conecter_bd.php");

        // Requête SQL DELETE pour supprimer le témoignage
        $sql = "DELETE FROM testimonials WHERE id = $testimonialId";

        if ($conn->query($sql) === TRUE) {
            header('Location: ../controller/controleur_admin.php');
        } else {
            echo "Erreur lors du rejet du témoignage : " . $conn->error;
        }

        // Fermeture de la connexion
        include("close_db.php");
    } else {
        echo "Identifiant du témoignage non spécifié.";
    }
} else {
    echo "Méthode de requête non autorisée.";
}
?>
