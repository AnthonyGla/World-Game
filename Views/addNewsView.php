<?php
$this->titre = "Ajouter un article";
?>
<div class="row justify-content-center">
    <div class="block_page col-12 col-sm-11 col-xl-9 col-lg-10 mt-4">
    <h1><i class="fas fa-pencil-alt"></i>Ajouter un article</h1>
      <?php if (!empty($validation)) { ?>
          <img alt="poro_nice" src="/public/assets/img/poro_nice.png">
          <p class="redirection_text_form text-center">L'article a bien été envoyé.</p>
     <?php }
      else {
      ?>
    <form action="/article/ajouter.html" method="post" name="add_news" class="form_Editor" id="form_news" enctype="multipart/form-data">
        <input id="x" type="hidden" name="news_txt">
        <div class="name_form">
            <input type="text" name="news_title" placeholder="Titre de l'article" value="<?php if (isset($news_title)) {echo $news_title;} ?>">
        </div>
        <div class="errors_subscribe"><?= ($errors['title']) ?? '' ?></div>

        <div class="cover_add"><img src="" alt="Image_News"></div>
        <label for="file" class="label-file"><i class="far fa-file"></i> Choisir une image de couverture</label>
        <input id="file" class="input-file file_upload" type="file" name="cover_img">

        <div class="error_cover errors_subscribe"><?= ($errors['cover_img']) ?? '' ?></div>
        <select name="news_cat">
          <?php foreach ($list_Category as $category) { ?>
        <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
          <?php } ?>
      </select>
        <div class="d-flex justify-content-center checkbox_news">
            <input type="checkbox"  name="news_star" value="1" id="switch" <?php if (isset($news_text) && $news_star == 1) {echo 'checked';} ?>/>
            <label for="switch">Mettre cet article à la une ?</label>
            <p>Mettre cet article à la une ?</p>
        </div>
        <textarea id="trumbowyg" name="text"><?php if (isset($news_text)) {echo $news_text;} ?></textarea>
        <div class="errors_subscribe"><?= ($errors['text']) ?? '' ?></div>
        <input type="submit" value="Envoyer l'article">
    </form>
      <?php } ?>
  </div>
</div>
