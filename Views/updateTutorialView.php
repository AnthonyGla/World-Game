<?php
$this->titre = "Modifier un tutoriel";
?>
<div class="row justify-content-center">
    <div class="block_page col-12 col-sm-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="fas fa-pencil-alt"></i>Mise à jour d'un tutoriel</h1>
        <?php if (!empty($validation)) { ?>
            <img src="/public/assets/img/poro_nice.png">
            <p class="redirection_text_form text-center">Le tutoriel a bien été mis à jour.</p>
        <?php }
        else {
            ?>
            <form action="/tutoriel/modifier/<?= $_GET['id_tutorial'] ?>.html" method="post" name="add_news" class="form_Editor" id="form_news" enctype="multipart/form-data">
                <input id="x" type="hidden" name="text">
                <div class="name_form">
                    <input type="text" name="tutorial_title" placeholder="Nom du tutoriel" value="<?= $tutorial->title; ?>">
                </div>
                <div class="errors_subscribe"><?= ($errors['title']) ?? '' ?></div>

                <div class="cover_add" style="display:block;"><img src="<?= $tutorial->cover_img; ?>" alt="Image_News"></div>
                <label for="file" class="label-file"><i class="far fa-file"></i> Choisir une image de couverture</label>
                <input id="file" class="input-file file_upload" type="file" name="cover_img">

                <div class="error_cover errors_subscribe"><?= ($errors['cover_img']) ?? '' ?></div>
                <select name="tutorial_cat">
                    <?php foreach ($list_Category as $category) { ?>
                        <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                    <?php } ?>
                </select>
                <textarea class="textarea_tutorial" name="tutorial_resume" placeholder="Description du tutoriel (50-60 mots)"><?= $tutorial->resume; ?></textarea>
                <textarea id="trumbowyg" name="tutorial_txt"><?= $tutorial->text; ?></textarea>
                <div class="errors_subscribe"><?= ($errors['text']) ?? '' ?></div>
                <input type="submit" value="Envoyer le tutoriel">
            </form>
        <?php } ?>
    </div>
</div>
