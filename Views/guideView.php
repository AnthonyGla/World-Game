<?php
$this->titre = 'Guide - '.$search;
?>
<div class="row justify-content-center">
    <div class="block_page col-11 col-xl-9 col-lg-10 mt-4">
        <h1 class="text-center"><i class="fas fa-certificate"></i><?= $this->titre; ?></h1>
        <div class="row justify-content-center">
            <?php foreach ($donnees as $donn) { ?>
        <a href="tutoriel/<?= $donn->id; ?>.html">
            <div class="card-guide ">
                <div class="img-card-guide">
                    <img src="<?= $donn->cover_img; ?>" alt="Card image cap">
                    <div id="you">
                        <div class="card-guide-title"><h2><?= $donn->title; ?></h2></div>
                        <div class="card-guide-resume"><p><?= $donn->resume; ?></p></div>
                    </div>
                </div>
            </div>
        </a>
        <?php } ?>
        </div>
    </div>
</div>