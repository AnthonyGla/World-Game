<?php
$this->titre = 'Inscription';
?>
<div class="row justify-content-center">
    <div class="block_page col-12 col-sm-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="fas fa-clipboard-check"></i>Inscription</h1>
        <?php if (!isset($validation)) {
            ?>
            <div class="row justify-content-center">
                <div class="col-11 col-md-8 col-lg-7 col-xl-5">
                    <form action="inscription.html" method="POST" class="form_subscribe">
                        <div class="name_form">
                            <input class="<?= (isset($isSubmitted)) ? (empty($errors["username"])) ? 'border_green' : 'border_red' : 'border_none'; ?>"
                                   id="username_subscribe" type="text" placeholder="Votre pseudo" name="username" value="<?= ($username) ?? '' ?>">
                            <div id="username_check" class="subscribe_info">
                                <?= (isset($isSubmitted)) ? (empty($errors["username"])) ? '<i class="fas_green fas fa-check"></i>' : '<i class="fas_red fas fa-exclamation-circle"></i>' : '<i title="Les pseudos offensants ou injurieux seront automatiquement bannis !" class="fas fa-info-circle"></i>'; ?>
                            </div>
                        </div>
                        <div id="username_info" class="errors_subscribe"><?= ($errors['username']) ?? '' ?></div>

                        <div class="name_form">
                            <input class="<?= (isset($isSubmitted)) ? (empty($errors["mail"])) ? 'border_green' : 'border_red' : 'border_none'; ?>" type="text" id="mail_subscribe" name="mail" placeholder="Votre email" value="<?= ($mail) ?? '' ?>">
                            <div id="mail_check" class="subscribe_info text-dark">
                                <?= (isset($isSubmitted)) ? (empty($errors["mail"])) ? '<i class="fas_green fas fa-check"></i>' : '<i class="fas_red fas fa-exclamation-circle"></i>' : '<i title="Les pseudos offensants ou injurieux seront automatiquement bannis !" class="fas fa-info-circle"></i>'; ?>
                            </div>
                        </div>
                        <div id="mail_info" class="errors_subscribe"><?= ($errors['mail']) ?? '' ?></div>

                        <div class="name_form">
                            <input class="<?= (isset($isSubmitted)) ? (empty($errors["pass"])) ? 'border_green' : 'border_red' : 'border_none'; ?>" type="password" id="pass_subscribe" name="pass" placeholder="Votre mot de passe" value="<?= ($pass) ?? '' ?>">
                            <div id="pass_check" class="subscribe_info text-dark">
                                <?= (isset($isSubmitted)) ? (empty($errors["pass"])) ? '<i class="fas_green fas fa-check"></i>' : '<i class="fas_red fas fa-exclamation-circle"></i>' : '<i title="Les pseudos offensants ou injurieux seront automatiquement bannis !" class="fas fa-info-circle"></i>'; ?>
                            </div>
                        </div>
                        <div id="pass_info" class="errors_subscribe"><?= ($errors['pass']) ?? '' ?></div>

                        <div class="name_form">
                            <input class="<?= (isset($isSubmitted)) ? (empty($errors["confirmpass"])) ? 'border_green' : 'border_red' : 'border_none'; ?>" type="password" id="confirm_subscribe" name="confirmpass" placeholder="Confirmez votre mot de passe" value="<?= ($confirmpass) ?? '' ?>">
                            <div id="confirm_check" class="subscribe_info text-dark">
                                <?= (isset($isSubmitted)) ? (empty($errors["confirmpass"])) ? '<i class="fas_green fas fa-check"></i>' : '<i class="fas_red fas fa-exclamation-circle"></i>' : '<i title="Les pseudos offensants ou injurieux seront automatiquement bannis !" class="fas fa-info-circle"></i>'; ?>
                            </div>
                        </div>
                        <div id="confirm_info" class="errors_subscribe"><?= ($errors['confirmpass']) ?? '' ?></div>

                        <input type="submit" value="M'inscrire">
                    </form>
                </div>
            </div>
        <?php }
        else {
            ?>
            <img src="https://vignette.wikia.nocookie.net/leagueoflegends/images/d/d6/Scout-Approved_Emote.png/revision/latest/top-crop/width/220/height/220?cb=20171120233445">
            <p class="redirection_text_form text-center">Votre inscription a été prise en compte. Un mail contenant un lien d'activation vous a été envoyé.</p>
            <p class="redirection_text_form text-center" id="redirection_text">Vous serez automatiquement redirigé vers l'index dans <span>5</span> secondes.</p>
        <?php } ?>
    </div>
</div>
