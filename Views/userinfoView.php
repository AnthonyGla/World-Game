<?php
$this->titre = "Modifier mes informations";
?><div class="row justify-content-center">
    <div class="block_page col-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="fas fa-id-badge"></i>Mes informations</h1>
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-7 col-xl-5">
        <div id="userinfo_avatar"><img src="<?= $userinfo->avatar; ?>"></div>
            </div>
        </div>
        <?php if (isset($validateModif)) { ?>
        <img src="">
            <p class="modifuser_info">Les modifications ont été prises en compte <i class="fas fas_green fa-check"></i></p>
        <?php } ?>
        <div class="row justify-content-center">
            <div class="col-11 col-md-8 col-lg-7 col-xl-6">
        <h2><?= $userinfo->username; ?></h2>
        <form action="index.php?action=userInfo" method="POST" class="modif_user" enctype="multipart/form-data">

            <label for="file" class="label-file"><i class="far fa-file"></i> Choisir un nouvel avatar</label>
            <input id="file" class="input-file" type="file" name="avatar">


            <div id="mail_info" class="errors_subscribe"><?= ($errors['avatar']) ?? '' ?></div>
           <fieldset><div class="name_form">
                <label for="mail_user">Modifier mon mail : </label>
                <input type="text" id="mail_user" name="mail" value="<?= $userinfo->mail; ?>">
                <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
            </div>
            <div class="name_form">
                <label for="mail_user">Pseudo sur League Of Legends : </label>
                <input type="text" id="mail_user" name="mail" value="<?= $userinfo->mail; ?>">
                <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
            </div>
            <div class="name_form">
                <label for="mail_user">Pseudo sur TeamFight Tactics : </label>
                <input type="text" id="mail_user" name="mail" value="<?= $userinfo->mail; ?>">
                <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
            </div>
            <div class="name_form">
                <label for="mail_user">Pseudo sur Legends Of Runneterra : </label>
                <input type="text" id="mail_user" name="mail" value="<?= $userinfo->mail; ?>">
                <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>
            </div>
            <input type="submit" value="Envoyer">
           </fieldset>
        </form>
    </div>
        </div>
    </div>
</div>