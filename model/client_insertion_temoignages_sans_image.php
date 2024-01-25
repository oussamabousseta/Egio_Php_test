<?php

$stmt = $conn->prepare("INSERT INTO testimonials (titre, message) VALUES (?, ?)");
$stmt->bind_param("ss", $titre, $message);

?>