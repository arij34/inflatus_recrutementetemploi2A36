<?php
include '..\contrller\RecruteurC.php';
include '..\contrller\reponseC.php';

$reclamationC = new reclamationC();

// Récupérer la catégorie sélectionnée depuis le formulaire
$categorie_reclamation = isset($_POST['categorie_reclamation']) ? $_POST['categorie_reclamation'] : null;

// Utiliser la méthode Listereclames avec la catégorie sélectionnée comme argument
$list = $reclamationC->Listereclames($categorie_reclamation);

// Vérifier si un bouton de tri a été cliqué
if (isset($_POST['tri_asc'])) {
    // Trier les réclamations par ordre de proximité (ascendant)
    usort($list, function($a, $b) {
        return strtotime($a['date']) - strtotime($b['date']);
    });
}

// Tableau de mots interdits
$badWords = array("sirine", "israel", "eya");

// Fonction pour remplacer les mots interdits par des étoiles
function filterBadWords($input) {
    global $badWords;
    foreach ($badWords as $word) {
        $input = str_ireplace($word, str_repeat("*", strlen($word)), $input);
    }
    return $input;
}
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="quixlab-master\css\style.css" rel="stylesheet">
    <style>
        #selectEtat {
            padding: 5px;
            border-radius: 20px;
            border: 1px solid #ccc;
            background: linear-gradient(230deg, #ffc480, #ff763b);
            color: #333;
        }

        #selectEtat option {
            background-color: #ffc480;
            color: #333;
        }
    </style>
    <script>
        function toggleResponseForm(claimId) {
            var responseForm = document.getElementById("responseForm");
            responseForm.style.display = "block";
            var claimIdInput = document.getElementById("claimIdInput");
            claimIdInput.value = claimId;
        }
    </script>
</head>

<body>

    <div class="col-lg-6">
        <div class="card" style="width: 1200px;">
            <div class="card-body">
                <h4 class="card-title">Table Réclamation</h4>
                <div class="table-responsive">
                    <table class="table table-bordered verticle-middle">
                        <thead>
                            <tr>
                                <th scope="col">id_reclame</th>
                                <th scope="col">date</th>
                                <th scope="col">categorie_reclamation</th>
                                <th scope="col">explication</th>
                                <th scope="col">show</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list as $reclamation) {
                            ?>
                                <tr>
                                    
                                    <td><?php echo filterBadWords($reclamation['date']); ?></td>
                                    <td><?php echo filterBadWords($reclamation['categorie_reclamation']); ?></td>
                                    <td><?php echo filterBadWords($reclamation['explication']); ?></td>
                                    <td><?php echo filterBadWords($rponse['reponse']); ?></td>
                                    <td>
                                        <form method="GET" action="showdetai.php">
                                            <input type="hidden" value="<?php echo $reclamation['id_reclamation']; ?>" name="id_reclamation">
                                            <button type="submit" class="btn btn-info" name="show">Show Details</button>
                                        </form>
                                    </td>
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

</body>

</html>
