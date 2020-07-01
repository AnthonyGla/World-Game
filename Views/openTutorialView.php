<?php
$this->titre = "Tutoriel - ".$tutorial->title;
?>
<div class="row justify-content-center">
    <div class="block_page col-12 col-sm-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="fas fa-chalkboard-teacher"></i><?= $tutorial->title ?></h1>
        <p id="openNewsDate">
            Guide publié le <?= $tutorial->date ?>, par <?= $tutorial->id_users ?>
            <span><?php if ($tutorial->maj_tuto != NULL) {echo '- Derniére mise à jour le '.$tutorial->maj_tuto;} ?></span>
        <?php if (!empty($_SESSION) AND $_SESSION['rank'] >= 3) { ?>
            <a class="disable_tutorial ml-2" id="<?= $tutorial->id; ?>" href="#"><i class="h3 fas fa-eye-slash"></i></a>
            <a href="/tutoriel/modifier/<?= $tutorial->id; ?>.html"><i class="h3 fas fa-edit"></i></a>
        <?php } ?>
        </p>
        <div class="block_News_Open_Txt tutorial_img">
            <div class="block_News_Open_Img"><img src="<?= $tutorial->cover_img ?>" alt="Image_News"></div>
            <p><?= $tutorial->text; ?></p>
        </div>
            <div id="like_tuto">
                <a href="#" id="1" class="like_button">
                    <div id="<?= $tutorial->id ?>" class="click_good <?php if ($tutorial->like != 1) {echo 'disable_like';} ?>">
                        <img src="https://vignette.wikia.nocookie.net/leagueoflegends/images/5/59/Gonna_Be_A_Blast_Emote.png/revision/latest?cb=20171120235551">
                        <p class="count_like"><?= $count_like->count ?></p>
                    </div>
                </a>
                <a href="#" id="2" class="like_button">
                    <div id="<?= $tutorial->id ?>" class="click_bad <?php if ($tutorial->like != 2) {echo 'disable_like';} ?>">
                        <img src="https://vignette.wikia.nocookie.net/leagueoflegends/images/9/97/Unworthy_Emote.png/revision/latest?cb=20190110054953">
                        <p class="count_like"><?= $count_dislike->count ?></p>
                    </div>
                </a>
        </div>
        <p id="need_connection" class="error_comment"></p>
    </div>
</div>
