<?php
$sql = "SELECT id, titre, message, image, date_creation FROM testimonials WHERE statut = 'approuvé' ORDER BY date_creation DESC LIMIT $startFrom, $itemsPerPage";
$result = $conn->query($sql);

?>