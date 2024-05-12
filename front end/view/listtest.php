<?php
include '../controler/testC.php';
include '../controler/entretienC.php';

$userC = new UserC();
$users = $userC->listUsers();

$userC2 = new UserC2();
$users2 = $userC2->listUsers2();

if ($users || $users2)  {


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="../view/dashboard/css/style.css" rel="stylesheet">

</head>

<body>
    
<div class="col-lg-6" top="10">
                <div class="card">
    <div class="card-body">
        <div class="card-title">
            <h4>Table de Test</h4>
            <!-- Bouton "Ajouter" 
            <a href="../view/adduser.php" class="btn btn-primary btn-md btn-icon float-right">
                Ajouter
                <i class="now-ui-icons ui-1_simple-add"></i>
            </a>-->
        </div>

    
        
        <input type="search" class="form-control" id="search2" placeholder="rechercher.....">
        <div id="error2"></div>

        <div class="table-responsive">
            <table class="table table-hover" id="userTable2">
                <thead>
                    <tr>
                        
                        <th>Email</th>
                        <th>Entreprise</th>
                        <th>Domaine Informatique</th>
                        <th>Date De Test</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        
                        <td><?= isset($user['email_test']) ? $user['email_test'] : ''; ?></td>
                        <td><?= isset($user['nom_entreprise_test']) ? $user['nom_entreprise_test'] : ''; ?></td>
                        <td><?= isset($user['domaine_informatique_test']) ? $user['domaine_informatique_test'] : ''; ?></td>
                        <td><?= isset($user['date_test']) ? $user['date_test'] : ''; ?></td>
                        
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script>

function showtable2(curarray) {
    var tableBody = document.getElementById("userTable2").getElementsByTagName('tbody')[0];
    tableBody.innerHTML = '';

    if (curarray.length === 0) {
        document.getElementById("error2").innerHTML = `<span class='text-danger'>Aucun résultat trouvé !</span>`;
    } else {
        document.getElementById("error2").innerHTML = "";

        for (var i = 0; i < curarray.length; i++) {
            var newRow = tableBody.insertRow(tableBody.rows.length);
            newRow.innerHTML = `
                
                <td>${curarray[i].email_test}</td>
                <td>${curarray[i].nom_entreprise_test}</td>
                <td>${curarray[i].domaine_informatique_test}</td>
                <td>${curarray[i].date_test}</td>
                
            `;
        }
    }
}

document.getElementById("search2").addEventListener("keyup", function () {
    var search = this.value.toLowerCase();

    var filteredArray = <?php echo json_encode($users); ?>.filter(function (user) {
        return Object.values(user).some(val => val.toString().toLowerCase().includes(search));
    });

    showtable2(filteredArray);
});
</script>


       
        
</div>
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by KHADAMNI</a> 2024</p>
            </div>
        </div>
</div>
        
    </div>
  
    <script src="../view/dashboard/plugins/common/common.min.js"></script>
    <script src="../view/dashboard/js/custom.min.js"></script>
    <script src="../view/dashboard/js/settings.js"></script>
    <script src="../view/dashboard/js/gleek.js"></script>
    <script src="../view/dashboard/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../view/dashboard/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../view/dashboard/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../view/dashboard/plugins/d3v3/index.js"></script>
    <script src="../view/dashboard/plugins/topojson/topojson.min.js"></script>
    <script src=".../view/dashboard/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../view/dashboard/plugins/raphael/raphael.min.js"></script>
    <script src="../view/dashboard/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../view/dashboard/plugins/moment/moment.min.js"></script>
    <script src="../view/dashboard/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../view/dashboard/plugins/chartist/js/chartist.min.js"></script>
    <script src="../view/dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>
    <script src="../view/dashboard/js/dashboard/dashboard-1.js"></script>

</body>

</html>

</body>

</html>
<?php
} else {
    echo "<center><h2>Aucun utilisateur trouvé.</h2></center>";
}
?>