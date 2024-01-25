<?php

// Récupération des témoignages depuis la base de données
$sql = "SELECT id, titre, message, image, statut, date_creation FROM testimonials";
$result = $conn->query($sql);

?>