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
                        <h4 class="card-title">Table Réponse</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered verticle-middle">
                                <thead>
                                    <tr>
                                        <th scope="col">id_reponse</th>
                                        <th scope="col">reponse</th>
                                        <th scope="col">id_reclamation</th>
                                        <th scope="col">statut</th>
                                        
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
                                        <td><?php echo $reponse['statut']; ?></td>

                                        <td>
                                        <form method="POST" action="updatereponse.php">
    <!-- Input for etat_reponse (response state) -->
    <input type="text" name="reponse" placeholder="reponse" required>
    
    <!-- Input for id_reclamation (claim ID) -->
    <input type="text" name="id_reclamation" placeholder="Claim ID" required>

    <!-- Submit button -->
    <button type="submit">update Response</button>
</form>
                                </td>
                                        <td>
                                        <form method="POST" action="addreponse.php">
    <!-- Input for etat_reponse (response state) -->
    <input type="text" name="reponse" placeholder="Response state" required>
    
    <!-- Input for id_reclamation (claim ID) -->
    <input type="text" name="id_reclamation" placeholder="Claim ID" required>

    <!-- Submit button -->
    <button type="submit">Add Response</button>
</form>
 </td>                                   
  <td>
     <form method="POST" action="deletereponse.php">
      <input type="hidden" value="<?php echo $reponse['id_reclamation']; ?>" name="id_reclamation">
         <button type="submit" class="btn btn-danger" name="delete"><i class="fa fa-trash"></i></button>
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