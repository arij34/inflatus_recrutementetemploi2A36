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
                <div class="card"style="width: 1200px;">
                    <div class="card-body">
                        <h4 class="card-title">Table Reponse</h4>
                        <div class="table-responsive">
                            <table class="table header-border">
                                <thead>
                                    <tr>
                                        <th>Nom_complet</th>
                                        <th>Etat_reclamation</th>
                                        <th>modifier</th>
                                        <th>supprimer</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-active">
                                        <td>syrine bouden</td>
                                        <td><input type="radio" id="Résolu" name="reponse" value="Résolu">
                                            <label for="Résolu">Résolu</label><br>
                                            <input type="radio" id="En cours" name="reponse" value="En cours">
                                            <label for="En cours">En cours</label><br>
                                        </td>
                                        
                                        <td>
                                            <span>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-edit color-muted m-r-5" style="color: #333333;"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash color-muted m-r-5" style="color: #333333;"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Chercher"><i class="fa fa-search color-muted m-r-5" style="color: #333333;"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="table-primary">
                                        <td>arij</td>
                                        <td><input type="radio" id="Résolu" name="reponse" value="Résolu">
                                            <label for="Résolu">Résolu</label><br>
                                            <input type="radio" id="En cours" name="reponse" value="En cours">
                                            <label for="En cours">En cours</label><br>
                                        </td>
                                        
                                        <td>
                                            <span>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-edit color-muted m-r-5" style="color: #333333;"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash color-muted m-r-5" style="color: #333333;"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr class="table-success">
                                        <td>farah</td>
                                        <td><input type="radio" id="Résolu" name="reponse" value="Résolu">
                                            <label for="Résolu">Résolu</label><br>
                                            <input type="radio" id="En cours" name="reponse" value="En cours">
                                            <label for="En cours">En cours</label><br>
                                        </td>
                                       
                                        <td>
                                            <span>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-edit color-muted m-r-5" style="color: #333333;"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash color-muted m-r-5" style="color: #333333;"></i></a>
                                        </td>
                                    </tr>
                                    <tr class="table-info">
                                        <td>mohamed</td>
                                        <td><input type="radio" id="Résolu" name="reponse" value="Résolu">
                                            <label for="Résolu">Résolu</label><br>
                                            <input type="radio" id="En cours" name="reponse" value="En cours">
                                            <label for="En cours">En cours</label><br>
                                        </td>
                                        
                                        <td>
                                            <span>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Modifier"><i class="fa fa-edit color-muted m-r-5" style="color: #333333;"></i></a>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Supprimer"><i class="fa fa-trash color-muted m-r-5" style="color: #333333;"></i></a>
                                            </span>
                                        </td>
                                    </tr>
                                   
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</body>

</html>