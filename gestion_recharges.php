<?php
include("config.php"); // Inclure le fichier de configuration de la base de données

// Traitement du formulaire de recharge
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carte_sim_id = $_POST["carte_sim"];
    $montant = $_POST["montant"];

    // Calculer la date d'expiration en fonction du montant
    if ($montant == 5) {
        $date_expiration = date('Y-m-d', strtotime('+1 month'));
    } elseif ($montant == 10) {
        $date_expiration = date('Y-m-d', strtotime('+2 months'));
    }

    // Insérer les données de la recharge dans la base de données
    $insert_sql = "INSERT INTO recharges (carte_sim_id, montant, date_recharge, date_expiration_recharge) VALUES ('$carte_sim_id', '$montant', NOW(), '$date_expiration')";
    if ($conn->query($insert_sql) === TRUE) {
        echo "Recharge effectuée avec succès.";
    } else {
        echo "Erreur lors de la recharge : " . $conn->error;
    }
}

// Récupérer les informations des cartes SIM pour le formulaire
$select_carte_sim_sql = "SELECT id, numero FROM carte_sim";
$result_carte_sim = $conn->query($select_carte_sim_sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des recharges</title>
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
    
    color: #fff;
    float: left;
    width: 25%;
    padding: 30px;
    
}

nav a {
    display: block;
    margin-bottom: 30px;
    text-decoration: underline;
    color: #555;
    font-weight: bold;
}

.content {
    float: left;
    width: 65%;
    padding: 40px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

select,
button {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

button {
    background-color: #3498db;
    color: #fff;
    font-weight: bold;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

    </style>
</head>
<body>
    

    <div class="content">
        <h2>Effectuer une recharge</h2>
        <form action="gestion_recharges.php" method="post">
            <label for="carte_sim">Carte SIM :</label>
            <select name="carte_sim" required>
                <?php
                while ($row = $result_carte_sim->fetch_assoc()) {
                    echo '<option value="' . $row['id'] . '">' . $row['numero'] . '</option>';
                }
                ?>
            </select><br><br>
            <label for="montant">Montant :</label>
            <select name="montant" required>
                <option value="5">5 DH (1 mois)</option>
                <option value="10">10 DH (2 mois)</option>
            </select><br><br><br>
            <button type="submit">Recharger</button>
        </form>
    </div>
    <br>
    <br>
    <nav>
    <a href="afficher_recharges.php">Afficher les recharges</a> 
    </nav>

</body>
</html>
