<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Témoignages</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .action-button {
            padding: 5px 10px;
        }
    </style>
</head>

<body>

    <h1>Liste des Témoignages</h1>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de Création</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Affichage des témoignages
            include("..\model\admin_afficher_temoignages.php");
            ?>
        </tbody>
    </table>

</body>

</html>