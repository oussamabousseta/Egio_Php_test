<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Témoignage</title>
    <style>
        body {
    background-color: #f0f0f0; /* Couleur de fond gris */
    margin: 0; /* Supprime la marge par défaut du body */
    padding: 0;
    display: flex;
    align-items: center; /* Centre les éléments horizontalement */
    justify-content: center; /* Centre les éléments verticalement */
    height: 100vh; /* 100% de la hauteur de la fenêtre visible */
    flex-direction: column; /* Organise les éléments en colonne */
}

form {
    background-color: #ffffff; /* Couleur de fond du formulaire */
    padding: 40px;
    margin-top: 40px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */

    display: flex;
    flex-direction: column;
    justify-content: center;
    height: 50%;
    
}

label {
    display: block;
    margin-bottom: 0px;/* Ajustez l'espace vertical entre les labels */
}

input,
textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 0px; /* <-- Ajustez l'espace vertical entre les champs de saisie */
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50; /* Couleur de fond du bouton de soumission */
    color: #fff; /* Couleur du texte du bouton de soumission */
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #45a049; /* Couleur de fond du bouton de soumission au survol */
}



        /* Style pour afficher les témoignages horizontalement */
        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            overflow-x: auto; /* Ajout d'un défilement horizontal si nécessaire */
        }

        li {
            flex: 0 0 auto;
            margin-right: 20px;
            border: 1px solid #ddd;
            padding: 10px;
        }

    </style>
</head>

<body>

    <!-- Formulaire HTML -->
    <form method="post" enctype="multipart/form-data">
     
        <label for="titre">TITRE *</label>
        <br>
        <input type="text" name="titre" maxlength="60" required>
        <br><br>

        <label for="image">IMAGE (max 1 Mo) </label>
        <br>
        <input type="file" name="image" accept=".doc, .docx, .jpeg, .png">
        <br><br>

        <label for="message">MESSAGE *</label>
        <br>
        <textarea name="message" rows="4" maxlength="300" required></textarea>
        <br><br>

        <input type="submit" value="ADD NEW TESTIMONIAL">
     
    </form>

    <!-- Affichage des témoignages approuvés avec pagination -->
    <h2>Testimonials</h2>
    <ul>
        <?php
        // Affichage des témoignages
        include("..\model\client_afficher_temoignages.php");
        ?>
    </ul>

    <!-- Pagination -->
    <?php
    // Connexion à la base de données pour compter le nombre total de témoignages approuvés
    include("..\model\client_nb_temoignages_approuver.php");

    // Calcul du nombre total de pages
    $totalPages = ceil($totalItems / $itemsPerPage);

    // Affichage de la pagination
    echo "<div>";
    for ($i = 1; $i <= $totalPages; $i++) {
        echo "<a href='{$_SERVER['PHP_SELF']}?page=$i'>$i</a> ";
    }
    echo "</div>";
    ?>

</body>

</html>