<?php
include '..\contrller\reponseC.php';
$reponseC = new reponseC();
$list = $reponseC->listereponse();
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
            border-radius: 20px; /* Rendre les coins du sélecteur ronds */
            border: 1px solid #ccc;
            background:  linear-gradient(230deg, #ffc480, #ff763b);
            color: #333;
        }
    
        #selectEtat option {
            background-color: #ffc480; /* Couleur de fond de l'option */
            color: #333;
        }
    </style>

</head>

<body>

<div class="col-lg-6">
                <div class="card" style="width: 1200px;">
                    <div class="card-body">
                        <h4 class="card-title">Table Reponse</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">id_reponse</th>
                                        <th scope="col">reponse</th>
                                        <th scope="col">id_reclamation</th>
                                        <th scope="col">statut</th>
                                        <th scope="col">Action</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($list as $reponse) {
                                ?>
                                    <tr>
                                        <td><?php echo $reponse['id_reponse']; ?></td>
                                        <td><?php echo $reponse['reponse']; ?></td>
                                        <td><?php echo $reponse['id_reclamation']; ?></td>
                                        <td>
                                            <form action="updateStatut.php" method="post">
                                                <input type="hidden" name="id_reponse" value="<?php echo $reponse['id_reponse']; ?>">
                                                <input type="radio" name="statut" value="En cours" <?php if ($reponse['statut'] == 'En cours') echo 'checked'; ?>> En cours
                                                <input type="radio" name="statut" value="Résolu" <?php if ($reponse['statut'] == 'Résolu') echo 'checked'; ?>> Résolu
                                                <input type="submit" value="Mettre à jour">
                                            </form>
                                        </td>
                                        <td><!-- Autres actions ici --></td>

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
