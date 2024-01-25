<?php
include("conecter_bd.php");

// Récupération de l'identifiant du témoignage à approuver depuis le formulaire
if (isset($_POST['id'])) {
    $testimonialId = $_POST['id'];

    // Mise à jour du statut du témoignage en "approuvé"
    $sql = "UPDATE testimonials SET statut = 'approuvé' WHERE id = $testimonialId";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../controller/controleur_admin.php');
    } else {
        echo "Erreur lors de l'approbation du témoignage : " . $conn->error;
    }
} else {
    echo "Identifiant du témoignage non spécifié.";
}
include("close_db.php");
?>