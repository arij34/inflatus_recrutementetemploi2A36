<?php
    include '../entreprisee/config.php';
    include '../etudiant/config.php';
    // Récupérer le nombre d'occurrences pour chaque type de visiteur (Etudiant ou Entreprise)
    $visitorCounts = [];

    // Count occurrences for Etudiant
    $queryCountEtudiant = $db->query("SELECT COUNT(*) FROM etudiant");
    $visitorCounts['Etudiant'] = $queryCountEtudiant->fetchColumn();

    // Count occurrences for Entreprise
    $queryCountEntreprise = $db->query("SELECT COUNT(*) FROM entreprise");
    $visitorCounts['Entreprise'] = $queryCountEntreprise->fetchColumn();

    // Convertir les données en format JSON pour une utilisation dans JavaScript
    $visitorCountsJSON = json_encode(array_values($visitorCounts));
    $visitorLabelsJSON = json_encode(array_keys($visitorCounts));
?>
