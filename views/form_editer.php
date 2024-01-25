<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer Témoignage</title>
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

    </style>
</head>

<body>

    <h2>Éditer Témoignage</h2>
    <form method="post" action="../model/traitement_editer.php">
        <input type="hidden" name="id" value="<?php echo $testimonialId; ?>">
        <label for="newTitre">Nouveau Titre :</label>
        <input type="text" name="newTitre" value="<?php echo $titre; ?>" required>
        <br><br>
        <label for="newMessage">Nouveau Message :</label>
        <textarea name="newMessage" rows="4" required><?php echo $message; ?></textarea>
        <br><br>
        <input type="submit" value="Enregistrer les modifications">
    </form>

</body>

</html>