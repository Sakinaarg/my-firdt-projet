<?php
include("config.php"); // Inclure le fichier de configuration de la base de données

// Vérifier si l'ID de la carte SIM est passé en paramètre
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $carte_sim_id = $_GET['id'];

    // Récupérer les informations de la carte SIM à modifier depuis la base de données
    $select_sql = "SELECT * FROM carte_sim WHERE id = $carte_sim_id";
    $result = $conn->query($select_sql);
    $carte_sim = $result->fetch_assoc();

    // Traitement du formulaire de modification
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = $_POST["numero"];
        $iccid = $_POST["iccid"];
        $operateur = $_POST["operateur"];

        // Mettre à jour les données dans la base de données
        $update_sql = "UPDATE carte_sim SET numero = '$numero', iccid = '$iccid', operateur = '$operateur' WHERE id = $carte_sim_id";
        if ($conn->query($update_sql) === TRUE) {
            echo "Carte SIM mise à jour avec succès.";
            header("Location: gestion_des_cartes_sim.php"); // Rediriger vers la liste des cartes SIM
            exit();
        } else {
            echo "Erreur lors de la mise à jour de la carte SIM : " . $conn->error;
        }
    }
} else {
    echo "ID de carte SIM non valide.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une carte SIM</title>
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

        .content {
            padding: 20px;
            background-color: #f5f5f5;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 50%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        select {
            width: 50%;
        }

        .button {
            padding: 8px 15px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .button.green {
            background-color: #2ecc71;
        }

        .button.blue {
            background-color: #3498db;
        }

        
    </style>
</head>
<body>
    
    <div class="content">
        <h2>Modifier une carte SIM</h2>
        <form action="modifier.php?id=<?php echo $carte_sim_id; ?>" method="post">
            <div class="form-group">
                <label for="numero">Numéro :</label>
                <input type="text" name="numero" value="<?php echo $carte_sim['numero']; ?>" required>
            </div>
            <div class="form-group">
                <br>
                <label for="iccid">ICCID :</label>
                <input type="text" name="iccid" value="<?php echo $carte_sim['iccid']; ?>" required>
            </div>
            <div class="form-group"><br>
                <label for="operateur">Opérateur :</label>
                <select name="operateur">
                    <option value="inwi" <?php if ($carte_sim['operateur'] == 'inwi') echo 'selected'; ?>>inwi</option>
                    <option value="maroc telecom" <?php if ($carte_sim['operateur'] == 'maroc telecom') echo 'selected'; ?>>maroc telecom</option>
                    <option value="orange" <?php if ($carte_sim['operateur'] == 'orange') echo 'selected'; ?>>orange</option>
                </select>
            </div>
            <br>
            <br>
            <button class="button green" type="submit">Enregistrer les modifications</button>
        </form>
    </div>
    
</body>
</html>

