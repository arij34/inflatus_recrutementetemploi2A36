<?php
include '..\contrller\RecruteurC.php';

$reclamationC = new reclamationC();
$list =$reclamationC->listereclamation();
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
                <script>
       function toggleResponseForm(claimId) {
        var responseForm = document.getElementById("responseForm");
        responseForm.style.display = "block"; // Show the response form
        
        // Automatically populate the claim ID
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
                                        <th scope="col">modifier</th>
                                        <th scope="col">supprimer</th>
                                        <th scope="col">show</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($list as $reclamation) {
                                ?>
                                    <tr>
                                        <td><?php echo $reclamation['id_reclamation']; ?></td>
                                        <td><?php echo $reclamation['date']; ?></td>
                                        <td><?php echo $reclamation['categorie_reclamation']; ?></td>
                                        <td><?php echo $reclamation['explication']; ?></td>
                                        <td>
                                         <form method="POST" action="updaterecruteur.php">
                                         <input type="hidden" value="<?php echo $reclamation['id_reclamation']; ?>" name="id_reclamation">
                                         <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-pencil"></i></button>
                                         </form>
                                         </td>
                                         <td>
                                         <form method="POST" action="deleterecruteur.php">
                                         <input type="hidden" value="<?php echo $reclamation['id_reclamation']; ?>" name="id_reclamation">
                                         <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
                                         </form>
                                         </td>
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