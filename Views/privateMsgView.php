<?php
if (!empty($messageById)) {
    $this->titre = "Messagerie - ".$messageById->username;
}
else {
    $this->titre = "Messagerie - Boîte de réception";
}
?>
<div class="row justify-content-center">
    <div class="block_page col-12 col-sm-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="fas fa-envelope-open-text"></i><?= $this->titre; ?></h1>

        <?php
        if (!empty($messageById)) { ?>
            <div class="m-auto"><a class="recpetion_link" href="/messagerie.html"><i class="fas fa-mail-bulk"></i> Boîte de réception</a></div>
        <div class="col-lg-9 col-12 big_bloc_comment">
            <div class="profil_comment_img"><img alt="profil_img" src="<?php echo $messageById->avatar; ?>"></div>
            <div id="form_square"></div>
            <div class="w-100 comment_news">
                <div class="comment_text">
                    <p>
                        <?= $messageById->text; ?>
                    </p>
                    <p class="mp_text p-0 m-0">Reçu le <?= $messageById->date; ?></p>

                </div>
            </div>
        </div>
            <a href=""><div class="button_style">Répondre</div></a>
        <?php }
        else { ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Sujet</th>
                <th scope="col">De</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($list_msg as $msg) { ?>

                <tr>
                    <a href="">
                        <td scope="row">
                            <?php if ($msg->open == 0) {
                                echo '<i class="fas fa-envelope"></i>';
                            }
                            else {
                                echo '<i class="fas fa-envelope-open"></i>';
                            }
                            ?>
                        </td>
                        <td id="mp_subject"><a class="mp_subject" href="messagerie/lecture/<?= $msg->id ?>.html"><?= $msg->subject; ?></a></td>
                        <td><?= $msg->username; ?></td>
                        <td><?= $msg->date; ?></td>
                    </a>
                </tr>


            <?php } ?>
            </tbody>
        </table>
            <a href=""><div class="button_style">Envoyer un message</div></a>
        <?php } ?>
    </div>
</div>
