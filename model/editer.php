<?php


// Récupération de l'identifiant du témoignage à éditer depuis le paramètre GET
$testimonialId = isset($_GET['id']) ? $_GET['id'] : null;

// Vérification si l'identifiant du témoignage est spécifié
if ($testimonialId === null) {
    echo "Identifiant du témoignage non spécifié.";
    exit();
}

// Connexion à la base de données
include("..\model\conecter_bd.php");

// Récupération des données du témoignage à éditer
$sql = "SELECT id, titre, message FROM testimonials WHERE id = $testimonialId";
$result = $conn->query($sql);

// Vérification si le témoignage existe
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $titre = $row['titre'];
    $message = $row['message'];
} else {
    echo "Le témoignage avec l'identifiant $testimonialId n'existe pas.";
    exit();
}

// Fermeture de la connexion
include("..\model\close_db.php");

include("../views/form_editer.php");
?>
