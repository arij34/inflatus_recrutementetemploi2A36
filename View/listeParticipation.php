<?php
include '../Controller/ParticipationC.php';

$idEvenement = null;

// Vérifier si un id d'événement est spécifié dans l'URL
if(isset($_GET['idEvenement']) && !empty($_GET['idEvenement'])) {
    // Récupérer et valider l'ID de l'événement
    $idEvenement = intval($_GET['idEvenement']);
}

$participationC = new ParticipationC();

// Récupérer la liste des participants pour l'id d'événement spécifié
if($idEvenement !== null) {
    $list = $participationC->getParticipationsByIdEvenement($idEvenement);
} else {
    // Si aucun id d'événement n'est spécifié ou si l'ID est invalide, afficher tous les participants
    $list = $participationC->listParticipations();
}
?>

<!-- HTML restant inchangé -->


<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>

<div class="row page-titles mx-0">
    <div class="col-lg-6">
        <div class="card" style="width: 1000px;">
            <div class="card-body">
                <h4 class="card-title">Liste de participants</h4>
                <!-- Barre de recherche -->
                <form id="searchForm">
                    <input type="text" id="searchInput" placeholder="Rechercher par ID d'événement">
                    <button type="submit">Rechercher</button>
                </form>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                        <thead>
                        <tr>
                            <th scope="col">Identifiant de Participation</th>
                            <th scope="col">Nom d'événement</th>
                            <th scope="col">Nom du participant</th>
                            <th scope="col">Prénom du participant</th>
                            <th scope="col">Identifiant de Participant</th>
                            <th scope="col">Téléphone</th>
                            <th scope="col">Âge</th>
                            <th scope="col">Email</th>
                        </tr>
                        </thead>
                        <tbody id="participantTable">
                        <?php
                        foreach ($list as $Participation) {
                            ?>
                            <tr>
                                <td><?php echo $Participation['idParticipation']; ?></td>
                                <td><?php echo $Participation['idEvenement']; ?></td>
                                <td><?php echo $Participation['nomE']; ?></td>
                                <td><?php echo $Participation['prenomE']; ?></td>
                                <td><?php echo $Participation['idEtudiant']; ?></td>
                                <td><?php echo $Participation['telephoneE']; ?></td>
                                <td><?php echo $Participation['age']; ?></td>
                                <td><?php echo $Participation['emailE']; ?></td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../assets/plugins/common/common.min.js"></script>
<script src="../assets/js/custom.min.js"></script>
<script src="../assets/js/settings.js"></script>
<script src="../assets/js/gleek.js"></script>
<script src="../assets/js/styleSwitcher.js"></script>
<!-- Assurez-vous que le code JavaScript est placé à la fin du corps du document -->
<script>
    document.getElementById('searchForm').addEventListener('submit', function(event) {
        event.preventDefault();
        let searchTerm = document.getElementById('searchInput').value.trim().toLowerCase();
        let rows = document.getElementById('participantTable').getElementsByTagName('tr');
        for (let row of rows) {
            let cells = row.getElementsByTagName('td');
            // Seulement comparer l'ID de l'événement (deuxième colonne)
            if (cells.length > 1 && cells[1].textContent.trim().toLowerCase() === searchTerm) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        }
    });
</script>
</body>
</html>
