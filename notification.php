<?php
include("config.php");

// Calculez la date dans 2 jours
$date_declenchement = date('Y-m-d', strtotime('+2 days'));

// Interrogez les recharges expirant dans 2 jours
$sql_recharges = "SELECT r.id, c.numero AS numero_carte_sim
                 FROM recharges r
                 INNER JOIN carte_sim c ON r.carte_sim_id = c.id
                 WHERE r.date_expiration_recharge = '$date_declenchement'";

$resultat_recharges = $conn->query($sql_recharges);

// Générez et affichez les notifications
if ($resultat_recharges->num_rows > 0) {
    while ($ligne = $resultat_recharges->fetch_assoc()) {
        echo "Alerte : La recharge pour la carte SIM {$ligne['numero_carte_sim']} expirera dans 2 jours.\n";
    }
} else {
    echo "Aucune alerte d'expiration de recharge.";
}
?>

