<?php
include '../contrller/reponseC.php';

$error = ""; // Initialisation de la variable $error

// create reponse
$reponse = null;

// create an instance of the controller
$reponseC = new reponseC();
$list_id_rec=$reponseC->AfficherId_Reclamation();

if (
   // isset($_POST["id_rec"]) &&
    isset($_POST["reponse"]) &&
    isset($_POST["id_reclamation"]) 
) {
    if (
      //  !empty($_POST["id_rec"]) &&
        !empty($_POST["reponse"]) &&
        !empty($_POST["id_reclamation"]) 
    ) {
        $rep = new reponse(
           // $_POST['id_rec'],
            $_POST['reponse'],
            $_POST['id_reclamation']
        );
        $reponseC->addreponse($rep);
         
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-no-customizer">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Add Reponse</title>
  <meta name="description" content="" />
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <!-- Core CSS -->
  <link rel="stylesheet" href="./admin_temp/assets/vendor/css/core.css" />
  <link rel="stylesheet" href="./admin_temp/assets/vendor/css/theme-default.css" />
  <link rel="stylesheet" href="./admin_temp/assets/css/demo.css" />
  <style>
    table {
        border: 2px solid #03a4ed; /* Couleur de la bordure */
        border-collapse: collapse; /* Fusionner les bordures de cellules */
        width: 100%; /* Largeur de la table */
    }

    th, td {
        border: 1px solid #03a4ed; /* Couleur de la bordure des cellules */
        padding: 8px; /* Espacement interne */
        text-align: left; /* Alignement du texte */
    }

    th {
        background-color: #fff; /* Couleur de fond pour les en-têtes de colonne */
    }

    tr:nth-child(even) {
        background-color: #fff; /* Couleur de fond pour les lignes paires */
    }
  </style>
</head>
<body>
  <hr>
  <div id="error">
      <?php echo $error; ?>
  </div>
  <hr>  
  <form action="addreponse.php" method="POST">
      <table border="1" align="center">
          <tr>
              <td>
                  <label for="id_reclamation">Entrer l'identifiant de la reclamation : </label>
              </td>
              <td>
                   <!-- <input type="text" name="id_rec" id="id_rec" maxlength="15">   -->
                    <select name="id_reclamation" id="id_reclamation"> -->
                   <option value="">identifiant de la reclamation</option> -->
                  <?php
                  foreach ($list_id_rec as $list) {
                  ?> <option name="id_reclamation_select" value="<?php echo $list['id_reclamation']; ?>"><?= $list['id_reclamation']; ?></option> -->
                  <?php
                  }
                  ?> 
                  
              </td>
          </tr>
          <tr>
              <td>
                  <label for="reponse">Ecrire votre reponse:</label>
              </td>
              <td><textarea name="reponse" id="reponse" rows=15 cols="150"></textarea></td>
          </tr>
          <tr align="center">
              <td><input type="submit" value="envoyer la reponse"></td>
              <td><input type="reset" value="supprimer"></td>
          </tr>
      </table>
  </form>
</body>
</html>
