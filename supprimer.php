<?php
include("config.php"); 

// Vérifier si l'ID de la carte SIM est passé en paramètre
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $carte_sim_id = $_GET['id'];

    // Supprimer la carte SIM de la base de données
    $delete_sql = "DELETE FROM carte_sim WHERE id = $carte_sim_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Carte SIM supprimée avec succès.";
        header("Location: gestion_des_cartes_sim.php"); // Rediriger vers la liste des cartes SIM
        exit();
    } else {
        echo "Erreur lors de la suppression de la carte SIM : " . $conn->error;
    }
} else {
    echo "ID de carte SIM non valide.";
    exit();
}
?>
