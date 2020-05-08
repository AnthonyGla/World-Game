<?php
$this->titre = $news->title;
?>
<div class="row justify-content-center">
      <div class="block_News_Open col-11 col-xl-9 col-lg-10 mt-4">
        <h1 class="text-center">
            <i class="fas fa-certificate"></i>
            <?= $news->title ?>
        </h1>
          <p class="ml-4" id="openNewsDate">
              Publié le <?= $news->date; ?>, par <?= $news->id_users ?>
              <span>- <?= $news->id_news_category ?></span>
              <?php if (!empty($_SESSION) AND $_SESSION['rank'] >= 3) { ?>
              <a class="disable_news" id="<?= $news->id; ?>" href="#"><i class="h3 fas fa-eye-slash"></i></a>
              <a href="/article/modifier/<?= $news->id; ?>.html"><i class="h3 fas fa-edit"></i></a>
              <?php } ?>
          </p>


          <div class="block_News_Open_Img"><img src="<?= $news->cover_img ?>" alt="Image_News"></div>
        <div class="block_News_Open_Txt">
            <?= $news->text ?>
        </div>
      </div>
</div>
<?php require_once (ROOT.'/Views/commentView.php');?>
