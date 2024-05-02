<?php
include '../contrller/reponseC.php';

$error = "";

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
         
    } else
        $error = "Missing information";
}
?>

<!DOCTYPE html>


<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
  data-template="vertical-menu-template-no-customizer">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Add Reponse</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Core CSS -->
  <link rel="stylesheet" href="./admin_temp/assets/vendor/css/core.css" />
  <link rel="stylesheet" href="./admin_temp/assets/vendor/css/theme-default.css" />
  <link rel="stylesheet" href="./admin_temp/assets/css/demo.css" />
  <script>
    let etat_reclamation= document.getElementById(" etat_reclamation");
    function ReponseValidation(){
    if( etat_reclamation.value.length<4 ){
            var ReponseError = " Le texte de la reclamation doit compter au minimum 4 Caracteres.";
            document.getElementById("ReponseError").innerHTML = ReponseError;

            return false;
        
    }
    
    document.getElementById("ReponseError").innerHTML =
        "<p style='color:green'> Correct </p>";

    return true;
}

    </script>
</head>


<body>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #ffffff; /* Changement de l'arrière-plan en blanc */
        margin: 0; /* Suppression des marges par défaut */
        padding: 0; /* Suppression des rembourrages par défaut */
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: flex-start; /* Alignement des éléments en haut */
        min-height: 100vh;
    }

    .letter-image {
        position: relative;
        top: 50px; /* Déplacement de l'enveloppe vers le bas */
        width: 200px;
        height: 200px;
        cursor: pointer;
    }

    .animated-mail {
        position: relative;
        height: 150px;
        width: 200px;
        transition: .4s;
        border-radius: 8px;
        overflow: hidden;
    }

    .body {
        position: absolute;
        bottom: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 100px 200px;
        border-color: transparent transparent #fe3f40 transparent;
        z-index: 2;
    }

    .top-fold {
        position: absolute;
        top: 50px;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 50px 100px 0 100px;
        transform-origin: 50% 0%;
        transition: transform .4s .4s, z-index .2s .4s;
        border-color: #fe3f40 transparent transparent transparent;
        z-index: 2;
    }

    .back-fold {
        position: absolute;
        bottom: 0;
        width: 200px;
        height: 100px;
        background: #fe3f40;
        z-index: 0;
    }

    .left-fold {
        position: absolute;
        bottom: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 50px 0 50px 100px;
        border-color: transparent transparent transparent #fe3f40;
        z-index: 2;
    }

    .letter {
        left: 20px;
        bottom: 0px;
        position: absolute;
        width: 160px;
        height: 60px;
        background: white;
        z-index: 1;
        overflow: hidden;
        transition: .4s .2s;
    }

    .letter-border {
        height: 10px;
        width: 100%;
        background: repeating-linear-gradient(-45deg, #fe3f40, #fe3f40 8px, transparent 8px, transparent 18px);
    }

    .letter-title {
        margin-top: 10px;
        margin-left: 5px;
        height: 10px;
        width: 40%;
        background: #fe3f40;
    }

    .letter-context {
        margin-top: 10px;
        margin-left: 5px;
        height: 10px;
        width: 20%;
        background: #fe3f40;
    }

    .letter-stamp {
        margin-top: 30px;
        margin-left: 120px;
        border-radius: 100%;
        height: 30px;
        width: 30px;
        background: #fe3f40;
        opacity: 0.3;
    }

    .shadow {
        position: absolute;
        top: 200px;
        left: 50%;
        width: 400px;
        height: 30px;
        transition: .4s;
        transform: translateX(-50%);
        border-radius: 100%;
        background: radial-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.0), rgba(0,0,0,0.0));
    }

    .letter-image:hover .animated-mail {
        transform: translateY(50px);
    }

    .letter-image:hover .animated-mail .top-fold {
        transition: transform .4s, z-index .2s;
        transform: rotateX(180deg);
        z-index: 0;
    }

    .letter-image:hover .animated-mail .letter {
        height: 180px;
    }

    .letter-image:hover .shadow {
        width: 250px;
    }
</style>
</head>
<body>

<div class="container">
    <div class="letter-image">
        <div class="animated-mail">
            <div class="back-fold"></div>
            <div class="letter">
                <div class="letter-border"></div>
                <div class="letter-title"></div>
                <div class="letter-context"></div>
                <div class="letter-stamp">
                    <div class="letter-stamp-inner"></div>
                </div>
            </div>
            <div class="top-fold"></div>
            <div class="body"></div>
            <div class="left-fold"></div>
        </div>
        <div class="shadow"></div>
    </div>
</div>

<body>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <hr>  

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="addreponse.php" method="POST">
        <table border="1" align="center">
        <tr>
                <td>
                    <label for="id_reclamation">Entrer l'identifiant de la reclamation : </label>
                </td>
                <td>
                     <!-- <input type="text" name="id_rec" id="id_rec" maxlength="15">   -->
                      <select name="id_reclamation" id="id_reclamation"> -->
                     <option value="">--Please choose an id reclalation--</option> -->
                    <?php
                    foreach ($list_id_rec as $list) {
                    ?> <option name="id_reclamation_select" value="<?php echo $list['id_reclamation']; ?>"><?= $list['id_reclamation']; ?></option> -->
                    <?php
                    }
                    ?> 
                    
                </td>
                </td>
         </tr>
            <tr>
                <td>
                    <label for=" reponse">Ecrire votre reponse:
                    </label>
                </td>
                <td><textarea name=" reponse" id=" reponse" rows=15 cols="150" onkeyup="ReponseValidation()"></textarea>
            
                <p style="color : red;" id="ReponseError"></p></td>
            </tr>
            <tr align="center">
                <td>
                    <input type="submit" value="envoyer la reponse">
                </td>
                <td>
                    <input type="reset" value="supprimer">
                </td>
            </tr>
        </table>

        <script type="text/javascript" src="ControleDeSaisie0.js"></script>


    </form>

    <!-- <script type="text/javascript" src="ControleDeSaisie0.js"></script>  -->
</body>

</html>