<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../controler/entretienC.php';

$userC = new UserC();

$error = "";
$success_message = "";
$user = null;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if ID is set
    if (isset($_POST["id_test"]) && !empty($_POST["id_test"])) {
        $id_test = $_POST["id_test"];
        $user = $userC->getUserById($id_test);
        if (!$user) {
            $error = "Aucun utilisateur trouvé pour l'identifiant fourni.";
        }
    }

    // If user exists and modifier button is clicked
    if (isset($_POST["modifier"]) && $user) {
        // Retrieve form data
        $email_test = $_POST['email_test'] ?? '';
        $nom_entreprise_test = $_POST['nom_entreprise_test'] ?? '';
        $domaine_informatique_test = $_POST['domaine_informatique_test'] ?? '';
        $date_test = $_POST['date_test'] ?? '';

        // Check for empty fields
        if (empty($email_test) || empty($nom_entreprise_test) || empty($domaine_informatique_test) || empty($date_test)) {
            $error = "Tous les champs doivent être remplis";
        } else {
            // Update user
            $result = $userC->updateUser($id_test, $email_test, $nom_entreprise_test, $domaine_informatique_test, $date_test);

            // Check if update successful
            if ($result) {
                $success_message = "Modifications enregistrées avec succès.";
            } else {
                $error = "Erreur lors de la mise à jour de l'utilisateur.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">


<title>profile </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    background: #f7f7ff;
    margin-top:20px;
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
    border-radius: .25rem;
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
<div class="row">
<div class="col-lg-4">
<div class="card">
<div class="card-body">
<div class="d-flex flex-column align-items-center text-center">
<img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
<div class="mt-3">
<h4>John Doe</h4>
<p class="text-secondary mb-1">Full Stack Developer</p>
<p class="text-muted font-size-sm">Bay Area, San Francisco, CA</p>
<button class="btn btn-primary">Follow</button>
<button class="btn btn-outline-primary">Message</button>
</div>
</div>
<hr class="my-4">
<ul class="list-group list-group-flush">
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
<span class="text-secondary">https://bootdey.com</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
<span class="text-secondary">bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
<span class="text-secondary">@bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
<span class="text-secondary">bootdey</span>
</li>
<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
<h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
<span class="text-secondary">bootdey</span>
</li>
</ul>
</div>
</div>
</div>
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div class="card-title">
                <h4>Modifier votre profile</h4>
            </div>
            <div class="card-body">
                <?php if ($success_message != "") { ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success_message; ?>
                    </div>
                <?php } ?>
                <?php if ($error != "") { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php } ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" name="myForm" enctype="multipart/form-data">
                    <input type="hidden" name="id_test" value="<?php echo $user['id_test'] ?? ''; ?>">
                    <div class="row">
                        <div class="col-md-12 px-1">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email_test" class="form-control" placeholder="Email" value="<?php echo $user['email_test'] ?? ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 px-1">
                            <div class="form-group">
                                <label>Entreprise</label>
                                <input type="text" name="nom_entreprise_test" class="form-control" placeholder="Entreprise" value="<?php echo $user['nom_entreprise_test'] ?? ''; ?>">
                            </div>
                        </div>
                        <div class="col-md-12 px-1">
                            <div class="form-group">
                                <label>Domaine Informatique</label>
                                <select name="domaine_informatique_test" class="form-control">
                                    <?php if ($user && isset($user['domaine_informatique_test'])) : ?>
                                        <option value="web" <?php if ($user['domaine_informatique_test'] == 'web') echo 'selected'; ?>>Développement Web</option>
                                        <option value="mobile" <?php if ($user['domaine_informatique_test'] == 'mobile') echo 'selected'; ?>>Développement Mobile</option>
                                        <option value="data" <?php if ($user['domaine_informatique_test'] == 'data') echo 'selected'; ?>>Science des Données</option>
                                        <option value="security" <?php if ($user['domaine_informatique_test'] == 'security') echo 'selected'; ?>>Sécurité Informatique</option>
                                    <?php else : ?>
                                        <!-- Provide default options if $user is not set or if the property is not set -->
                                        <option value="web">Développement Web</option>
                                        <option value="mobile">Développement Mobile</option>
                                        <option value="data">Science des Données</option>
                                        <option value="security">Sécurité Informatique</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 px-1">
                            <div class="form-group">
                                <label>Date De Test</label>
                                <input type="date" name="date_test" class="form-control" value="<?php echo $user['date_test'] ?? ''; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-modifier" name="modifier">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card">
<div class="card-body">
<h5 class="d-flex align-items-center mb-3">Project Status</h5>
<p>Web Design</p>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<p>Website Markup</p>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-danger" role="progressbar" style="width: 72%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<p>One Page</p>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-success" role="progressbar" style="width: 89%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<p>Mobile Template</p>
<div class="progress mb-3" style="height: 5px">
<div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<p>Backend API</p>
<div class="progress" style="height: 5px">
<div class="progress-bar bg-info" role="progressbar" style="width: 66%" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">


	
</script>
</body>
</html>