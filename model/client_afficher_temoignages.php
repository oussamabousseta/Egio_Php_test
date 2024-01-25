<?php
        // Affichage des témoignages
        while ($row = $result->fetch_assoc()) {
            echo "<li><img src='../images/profile1.png'/> <br>
            <h3>Profile{$row['id']}</h3>    
            {$row['titre']} - {$row['date_creation']}<br>
            <p>{$row['message']}</p></li>";
            // Ajoutez d'autres informations si nécessaire
        }
        ?>