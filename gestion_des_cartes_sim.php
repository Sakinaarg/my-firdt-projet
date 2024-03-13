<?php
include("config.php"); 

// Traitement du formulaire d'ajout
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST["numero"];
    $iccid = $_POST["iccid"];
    $operateur = $_POST["operateur"];
    
    // Insérer les données dans la base de données (vous devez ajouter cette logique)
    $insert_sql = "INSERT INTO carte_sim (numero, iccid, operateur) VALUES ('$numero', '$iccid', '$operateur')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "Carte SIM ajoutée avec succès.";
    } else {
        echo "Erreur lors de l'ajout de la carte SIM : " . $conn->error;
    }
}

// Récupérer les données des cartes SIM depuis la base de données
$select_carte_sim_sql = "SELECT id, numero, iccid, operateur FROM carte_sim";
$result_carte_sim = $conn->query($select_carte_sim_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des cartes SIM</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        nav {
            background-color: #555;
            color: #fff;
            float: left;
            width: 25%;
            padding: 20px;
            height: calc(100vh - 40px);
        }

        nav a {
            display: block;
            margin-bottom: 10px;
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        nav a:hover {
            text-decoration: underline;
        }

        .content {
            float: left;
            width: 75%;
            padding: 20px;
            background-color: #f5f5f5;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        
        .button {
            display: inline-block;
            padding: 8px 15px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 3px;
        }

        .button.red {
            background-color: #e74c3c;
        }

        .button.green {
            background-color: #2ecc71;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        select {
            width: 50%;
        }
    </style>
</head>

      
<body>

    <div class="content">
        <h2>Ajouter une carte SIM</h2>
        <form action="gestion_des_cartes_sim.php" method="post">
            <label for="numero">Numéro :</label>
            <input type="text" name="numero" required> <br><br>
            <label for="iccid">ICCID :</label>
            <input type="text" name="iccid" required><br><br>
            <label for="operateur">Opérateur :</label>
            <select name="operateur">
                <option value="inwi">inwi</option>
                <option value="maroc telecom">maroc telecom</option>
                <option value="orange">orange</option>
            </select><br><br>
            <button type="submit">Ajouter</button>
        </form>

        <h2>Liste des cartes SIM</h2>
        <?php
      if ($result_carte_sim->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>ID</th><th>Numéro</th><th>ICCID</th><th>Opérateur</th><th>Actions</th></tr>';
        while ($row = $result_carte_sim->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['numero'] . '</td>';
            echo '<td>' . $row['iccid'] . '</td>';
            echo '<td>' . $row['operateur'] . '</td>';
            echo '<td>';
            echo '<a href="modifier.php?id=' . $row['id'] . '">Modifier</a> | ';
            echo '<a href="supprimer.php?id=' . $row['id'] . '">Supprimer</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'Aucune carte SIM trouvée.';
    }
        ?>
        
    </div>
    
</body>
</html>


