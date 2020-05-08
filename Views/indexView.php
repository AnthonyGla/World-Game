<?php
$this->titre = "World Game";
?>
<div class="row justify-content-center home_News">
    <div class="col-xl-3 col-11 m-0">
        <div class="home_Left_News slide_left">
            <ul>
                <?php
                for ($i = 0; $i <= 4; $i++) {
                    $count = new Comment();
                    $countComment = $count->countComment($donnees[$i]->id);
                    ?>
                <li><a href="article/<?= $donnees[$i]->id ?>.html">
                            <img src="<?= $donnees[$i]->cover_img ?>">
                        <div class="home_Left_News_Text">
                            <h2><?= $donnees[$i]->title ?></h2>
                            <div class="auteur_news"><img src="<?= $donnees[$i]->avatar; ?>" alt="logo candidat"/><p>Posté par <?= $donnees[$i]->username ?>, le <?= $dateformat->format($donnees[$i]->date); ?> </p><i class="fas fa-comment-alt"><span><?= $countComment->NbComment; ?></span></i></div>
                        </div>
                        </a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="col-xl-6 col-11 m-0">
        <?php
        ?>
        <div class="home_Center_News">
            <?php
                    ?>
            <a href="article/<?= $news_star->id ?>.html">
                <img src="<?= $news_star->cover_img ?>">
                <div class="home_Center_News_Text">

                    <p>Publié le <?= $dateformat->format($donnees[$i]->date); ?> - <span class="news_categorie"><?= $news_star->name; ?></span></p>
                    <h1><?php echo $news_star->title ?></h1>
                    <img src="<?= $news_star->avatar; ?>" alt="logo candidat"/><h2>Par <?= $news_star->username ?></h2>
                </div>
        </div></a>
    </div>
    <div class="col-xl-3 col-11 m-0">
        <div class="home_Left_News slide_right">
            <ul>
                <?php
                for ($i = 5; $i <= 9; $i++) {
                    $countComment = $count->countComment($donnees[$i]->id);
                    ?>
              <li><a href="article/<?= $donnees[$i]->id ?>.html">
                            <img src="<?= $donnees[$i]->cover_img ?>">
                        <div class="home_Left_News_Text">
                            <h2><?= $donnees[$i]->title ?></h2>
                            <div class="auteur_news"><img src="<?= $donnees[$i]->avatar; ?>" alt="logo candidat"/><p>Posté par <?= $donnees[$i]->username ?>, le <?= $dateformat->format($donnees[$i]->date); ?> </p><i class="fas fa-comment-alt"><span><?= $countComment->NbComment; ?></span></i></div>
                        </div>
                        </a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>