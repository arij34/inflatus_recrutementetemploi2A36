<?php
include '../Controller/EvenementC.php';
$evenementC = new EvenementC();
$list = $evenementC->listEvenements();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            background: #f7f7ff;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            transform: scale(0.8); /* Zoom out the entire page */
            transform-origin: center; /* Set the origin of the transformation */
        }

        h4 {
            margin: 52px 0;
            color: #fe3f40;
            font-size: 22px;
            font-weight: 1000;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 80px; /* 48% to leave some space for the gap */
            height: 40px;
            padding: 0 12px;
            margin: 8px 1%; /* 1% margin between buttons */
            color: #fff;
            background: #03a4ed;
            border: none;
            border-radius: 80px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: .3s;
        }

        .btn:hover {
            gap: 10px;
            background-color: #fe3f40;
        }

        /* Custom border class */
        .thicker-border {
            border: 5px solid #ced4da;
            border-radius: 10px;
            padding: 16px;
            /*width: 50%;*/ /* Remove fixed width */
            height: 800px;
        }

        /* Custom input field class */
        .custom-input {
            width: 100%;
            height: 40px;
            padding: 0 12px;
            margin: 6px 0;
            color: #333;
            background: #acd7f6f0;
            border: 2px solid #fff;
            border-radius: 6px;
            outline: none;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.2);
            font-size: 16px;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 1.25rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
        }

        .me-2 {
            margin-right: .5rem!important;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="main-body">
            <div class="row justify-content-center"> <!-- Align center -->
                <div class="col-md-12"> <!-- Change col-lg-4 to col-md-12 -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                <div class="d-flex justify-content-start">
                         <a href="addEvenement.php" class="btn btn-primary" style="font-weight: bold; font-size: 18px; width:200px;">ajouter Evenement</a>
                        </div>

                                <table class="table table-bordered table-striped verticle-middle" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">Identifiant Evenement</th>
                                    <th scope="col">Nom Evenement</th>
                                    <th scope="col">Adresse Evenement</th>
                                    <th scope="col">Date d'Evenement</th>
                                    <th scope="col">catégorie Evenement </th>
                                    <th scope="col">modifier</th>
                                    <th scope="col">supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list as $Evenement) {
                                ?>
                                    <tr>
                                        <td><?php echo $Evenement['idEvenement']; ?></td>
                                        <td><?php echo $Evenement['nomEvenement']; ?></td>
                                        <td><?php echo $Evenement['adresseEVN']; ?></td>
                                        <td><?php echo $Evenement['dateEVN']; ?></td>
                                        <td><?php echo $Evenement['idCategorieEVN']; ?></td>
                                        <td>
                                         <form method="POST" action="updateEvenement.php">
                                         <input type="hidden" value="<?php echo $Evenement['idEvenement']; ?>" name="idEvenement">
                                            <div class="d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary" style="font-weight: bold; font-size: 18px;" name="update">modifier</button>                                                
                                            </div>
                                         </form>
                                         </td>
                                         <td>
                                         <form method="POST" action="deleteEvenement.php">
                                         <input type="hidden" value="<?php echo $Evenement['idEvenement']; ?>" name="idEvenement">
                                         <div class="d-flex justify-content-start">
                                        <button type="submit" class="btn btn-primary" style="font-weight: bold; font-size: 18px;" name="delete">annuler</button>                                                
                                        </div>
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
                </div>
            </div>
        </div>
    </div>


    
</body>

</html>