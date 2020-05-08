<?php
$page_title = "Guide des champions - LOL";
ob_start();
?>
<div class="row justify-content-center">
    <div class="block_News_Open col-11 col-xl-9 col-lg-10 mt-4"
         <h1><i class="fas fa-band-aid"></i></h1>
    <div>
    <?php while ($donnees = $listMsg->fetch()) { ?>
        <div class="col-lg-9 col-12 big_bloc_comment">
            <div class="profil_comment_img"><img alt="profil_img" src="<?php echo $donnees['avatar']; ?>"></div>
            <div id="form_square"></div>
            <div class="w-100 comment_news">
                <div class="comment_details">
                    <p>Posté par <span><?php echo $donnees['pseudo'] . '</span> ' . dateToFrench($donnees['msg_date'], "l j F, à H:i"); ?></p><a href="""><i class="fas fa-caret-down"></i></a>
                </div>
                <div class="comment_text">
                    <p><?php echo $donnees['msg_txt']; ?>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
    </div>
</div>
<?php
$content = ob_get_clean();
include('template.php');
?>
