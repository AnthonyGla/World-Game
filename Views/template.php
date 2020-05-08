<?php
if (!empty($_GET['category'])) {
    $page = ($_GET['category']);
}
else {
    $page = null;
}
?>
<!DOCTYPE HTML>
<html lang="fr">
<head>
    <title><?= $this->titre ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/16ce2e3750.js" crossorigin="anonymous"></script>
    <link rel="icon" href="/public/assets/img/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="stylesheet" href="/public/assets/css/guide.css">
    <link rel="stylesheet" href="/public/assets/css/profil.css">
    <link rel="stylesheet" href="/public/assets/css/news.css">
    <link rel="stylesheet" href="/public/assets/css/forum.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>


</head>
<body>
<header>
    <div class="row">
        <div id="bloc_Header_News" class="col-lg-1 col-2">
            ACTUALITÉS
        </div>
        <div id="carous" class="col-lg-8 col-7">
            <ul id="bloc_Header_Defilement" >

                <?php foreach ($list_announcements as $announcements) { ?>
                <li><i class="fas fa-bullhorn"></i><?= $announcements->text; ?></li>
                <?php } ?>
            </ul>
        </div>
        <div id="bloc_Date" class="ml-auto col-3"><p></p></div>
    </div>
</header>

<?php require('../Views/include/navbar.php'); ?>
<?php echo $contenu; ?>

</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.20.0/trumbowyg.min.js"></script>
<script src="/public/assets/js/fr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="/public/assets/js/script.js"></script>
<script src="/public/assets/js/inscription.js"></script>
<script src="/public/assets/js/connexion.js"></script>
<script src="/public/assets/js/attachments.js"></script>
<script src="/public/assets/js/tutorial.js"></script>
<script src="/public/assets/js/news.js"></script>

</body>
<footer>
    <p>© eSport Gaming, 2019 - Tous droits réservés </p>
</footer>
</html>