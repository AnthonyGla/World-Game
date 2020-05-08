<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title><?= $this->titre ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/16ce2e3750.js" crossorigin="anonymous"></script>
    <link rel="icon" href="assets/img/favicon.ico" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/admin.css" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">

</head>
<body>
<div id="back_index" class="d-flex justify-content-between">
    <a class="d-flex align-items-center pl-2" href="/accueil.html"><i class="fas fa-eye"></i>Retourner voir le site</a>
    <div id="bloc_Date" class="d-flex"><p class="m-auto"></p></div>
    <div class="d-flex align-items-center pr-2"><p>Connecté avec le compte : <?= $_SESSION['username']; ?></p><div id="navbar_avatar"><img src="<?= $_SESSION['avatar']; ?>"></div></div>
</div>
<div class="container-fluid h-100vh">
    <div class="row h-100">
<aside class="col-12 col-md-2 p-0 bg-dark">
    <nav class="navbar navbar-expand-lg navbar-admin navbar-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between">
            <a class="nav-link pl-0" href="/administration.html">
                <li class="nav-item">
                    <i class="fas fa-star-of-life"></i>Accueil
                </li>
            </a>
            <a class="nav-link pl-0" href="/administration/liste-membre.html">
                <li class="nav-item">
                    <i class="fas fa-star-of-life"></i>Liste des membres
                </li>
            </a>
            <a class="nav-link pl-0" href="/administration/modifier-utilisateur.html">
                <li class="nav-item">
                    <i class="fas fa-star-of-life"></i>Gérer un utilisateur
                </li>
            </a>
            <a class="nav-link pl-0" href="#">
                <li class="nav-item">
                    <i class="fas fa-star-of-life"></i>Gestion des droits
                </li>
            </a>
            <a class="nav-link pl-0" href="/administration/annonces.html">
                <li class="nav-item">
                <i class="fas fa-star-of-life"></i>Annonces défilantes
            </li>
            </a>
        </ul>
    </div>
</nav>
</aside>
<main class="col-12 col-md-10">
    <div class="row justify-content-center">
        <div id="main_admin" class="col-11 ">
    <?php echo $contenu; ?>
        </div>
    </div>
</main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/public/assets/js/script.js"></script>
<script src="/public/assets/js/admin.js"></script>

</body>