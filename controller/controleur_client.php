<?php


// Vérification du formulaire côté serveur
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $titre = htmlspecialchars($_POST["titre"]);
    $message = htmlspecialchars($_POST["message"]);
    $image = $_FILES["image"];

    // Validation côté serveur 
    $errors = [];

    // Valider le titre (obligatoire, texte 60 caractères)
    if (empty($titre) || strlen($titre) > 60) {
        $errors[] = "Le titre est obligatoire et ne doit pas dépasser 60 caractères.";
    }

    // Valider le message (obligatoire, texte area max 300 caractères)
    if (empty($message) || strlen($message) > 300) {
        $errors[] = "Le message est obligatoire et ne doit pas dépasser 300 caractères.";
    }

    // Valider l'image (optionnelle, formats autorisés : {Doc, docx, jpeg, png}, 1mo max)
    if (!empty($image["name"])) {
        $allowedFormats = ["doc", "docx", "jpeg", "png"];
        $fileFormat = strtolower(pathinfo($image["name"], PATHINFO_EXTENSION));

        if (!in_array($fileFormat, $allowedFormats) || $image["size"] > 1000000) {
            $errors[] = "L'image doit être au format Doc, docx, jpeg ou png et ne doit pas dépasser 1 Mo.";
        }
    }

    // Si aucune erreur, ajouter les données à la base de données
    if (empty($errors)) {
        // Connexion à la base de données
        include('..\model\conecter_bd.php');

        // Préparation de la requête SQL en fonction de la présence d'une image
        if (!empty($image["name"])) {
            include("..\model\client_insertion_temoignages_avec_image.php");
        } else {
            include("..\model\client_insertion_temoignages_sans_image.php");
        }

        // Exécution de la requête, et Fermeture de la connexion et du statement
        include("..\model\client_insertion_temoignages_execution.php");
        
    } else {
        // Affichage des erreurs
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }

    // Redirection vers la page actuelle pour afficher les témoignages après l'ajout
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit();
}

// Affichage des témoignages approuvés avec pagination
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 6; // Nombre d'éléments par page

// Connexion à la base de données
include("..\model\conecter_bd.php");

// Calcul du point de départ pour la pagination
$startFrom = ($page - 1) * $itemsPerPage;

// Récupération des témoignages approuvés depuis la base de données avec pagination
include("..\model\client_select_temoignages_approuves_bd.php");

// Fermeture de la connexion
include("..\model\close_db.php");

include("../views/layout_client.html.php");

?>
