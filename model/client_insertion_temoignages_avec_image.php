<?php
$stmt = $conn->prepare("INSERT INTO testimonials (titre, message, image) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $titre, $message, $imageName);
$imageName = $image["name"];

?>