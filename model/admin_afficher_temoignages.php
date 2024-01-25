<?php
            // Affichage des témoignages
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['titre']}</td>";
                echo "<td>{$row['date_creation']}</td>";
                echo "<td>{$row['statut']}</td>";
                echo "<td class='actions'>";
                echo "<form method='post' action='../model/approuver.php'>"; 
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<button type='submit' class='action-button' name='action' value='approuver'>Approuver</button>";
                echo "</form>";
                
                echo "<form method='post' action='../model/rejeter.php'>"; 
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<button type='submit' class='action-button' name='action' value='rejeter'>Rejeter</button>";
                echo "</form>";
                
                echo "<form method='post' action='../model/editer.php?id={$row['id']}'>"; 
                echo "<input type='hidden' name='id' value='{$row['id']}'>";
                echo "<button type='submit' class='action-button' name='action' value='editer'>Éditer</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
?>