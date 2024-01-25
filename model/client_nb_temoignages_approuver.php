<?php
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT COUNT(id) AS total FROM testimonials WHERE statut = 'approuvé'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalItems = $row['total'];
?>