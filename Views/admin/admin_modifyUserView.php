<?php
$this->titre = "Administration";
?>
<h1>Gérer un utilisateur</h1>
<div class="row justify-content-center">
    <fieldset class="fieldset">
        <?php if (($_SERVER['REQUEST_METHOD'] == 'POST' || isset($_GET['user'])) AND ($user_exist))  { ?>
            <div id="userinfo_avatar"><img src="<?= $userinfo->avatar; ?>"></div>
            <a id="delete_avatar" href="#"><p>Supprimer son avatar <i class="fas fa-times text-danger"></i></p></a>
            <h2 id="<?= $userinfo->id; ?>"><?= $userinfo->username; ?></h2>
            <p>Date d'inscription : <?= $userinfo->date; ?></p>
            <form action="index.php?action=modifyUser&user=<?= $userinfo->username; ?>" method="POST" class="modif_user">
                    <label for="mail_user">Modifier son mail : </label>
                    <input id="search_input" class="input_ui form-control form-control-lg mb-3" type="text" name="mail" placeholder="Rechercher un utilisateur" value="<?= $userinfo->mail; ?>">
                    <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
                    <label for="mail_user">Son pseudo sur League Of Legends : </label>
                <input id="search_input" class="input_ui form-control form-control-lg mb-3" type="text" name="nameLoL" placeholder="Rechercher un utilisateur" value="<?= $usernames_games[0]->username_game; ?>">
                    <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
                    <label for="mail_user">Son pseudo sur TeamFight Tactics : </label>
                <input id="search_input" class="input_ui form-control form-control-lg mb-3" type="text" name="nameTfT" placeholder="Rechercher un utilisateur" value="<?= $usernames_games[1]->username_game; ?>">
                <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
                    <label for="mail_user">Son pseudo sur Legends Of Runneterra : </label>
                <input id="search_input" class="input_ui form-control form-control-lg mb-3" type="text" name="nameLoR" placeholder="Rechercher un utilisateur" value="<?= $usernames_games[2]->username_game; ?>">
                <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
                <div class="d-flex justify-content-center checkbox_news">
                    <input type="checkbox"  name="active" value="1" id="switch" <?php if ($userinfo->active == 2) {echo 'checked';} ?>/>
                    <label for="switch">Bannir cet utilisateur ?</label>
                    <p class="active_advert ml-2 text-danger font-weight-bold">
                        <?php if ($userinfo->active == 2) {echo 'Cet utilisateur a été banni';}
                        else {echo 'Bannir cet utilisateur';} ?>
                    </p>
                </div>
                <input type="submit">
            </form>
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