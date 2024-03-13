<?php
include("config.php"); // Inclure le fichier de configuration de la base de données

// Récupérer les informations des recharges depuis la base de données
$select_recharges_sql = "SELECT r.id, c.numero AS numero_carte_sim, r.montant, r.date_recharge, r.date_expiration_recharge 
                        FROM recharges r
                        INNER JOIN carte_sim c ON r.carte_sim_id = c.id";
$result_recharges = $conn->query($select_recharges_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Afficher les recharges</title>
    <style> 
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    
    color: #333;
    text-align: center;
    padding: 10px 0;
}
.content {
    margin: 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

h2 {
    margin-top: 20px;
}


tr:hover {
    background-color: #f5f5f5;
}

</style>
</head>
<body>

    <header>
        <h1>Afficher les recharges</h1>
    </header>
    <div class="content">
        <h2>Recharges enregistrées</h2>
        <?php
        if ($result_recharges->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Numéro de la carte SIM</th><th>Montant</th><th>Date de recharge</th><th>Date d\'expiration</th></tr>';
            while ($row = $result_recharges->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['numero_carte_sim'] . '</td>';
                echo '<td>' . $row['montant'] . ' DH</td>';
                echo '<td>' . $row['date_recharge'] . '</td>';
                echo '<td>' . $row['date_expiration_recharge'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo 'Aucune recharge enregistrée.';
        }
        ?>
    </div>

</body>
</html>
