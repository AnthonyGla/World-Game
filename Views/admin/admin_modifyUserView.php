<?php
$this->titre = "Administration - Gérer un utilisateur";
?>
<h1>Gérer un utilisateur</h1>
<div class="row justify-content-center">
    <fieldset class="fieldset">
        <?php if (($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['user'])) AND ($user_exist))  { ?>
            <div id="userinfo_avatar"><img alt="avatar_user" src="<?= $userinfo->avatar; ?>"></div>
            <a id="delete_avatar" href="#"><p>Supprimer son avatar <i class="fas fa-times text-danger"></i></p></a>
            <h2 id="<?= $userinfo->id; ?>"><?= $userinfo->username; ?></h2>
            <p>Date d'inscription : <?= $userinfo->date; ?></p>
                <div class="d-flex justify-content-center checkbox_news">
                    <input type="checkbox"  name="active" value="1" id="switch" <?php if ($userinfo->active == 2) {echo 'checked';} ?>/>
                    <label for="switch">Bannir cet utilisateur ?</label>
                    <p class="active_advert ml-2 text-danger font-weight-bold">
                        <?php if ($userinfo->active == 2) {echo 'Cet utilisateur a été banni';}
                        else {echo 'Bannir cet utilisateur';} ?>
                    </p>
                </div>
        <?php }
        else { ?>
            <legend>Rechercher un utilisateur</legend>
            <form action="/administration/modifier-utilisateur.html" method="POST">
                <input id="search_input" class="input_ui form-control form-control-lg" type="text" name="username" placeholder="Rechercher un utilisateur">

                <input type="submit" value="Modifier cet utilisateur"">
            </form>
        <?php } ?>
    </fieldset>
</div>