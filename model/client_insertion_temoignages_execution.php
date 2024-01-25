<?php

// Exécution de la requête
$stmt->execute();

// Fermeture de la connexion et du statement
$stmt->close();
$conn->close();

?>