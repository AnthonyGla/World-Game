<?php
$this->titre = "Ajouter un tutoriel";
?>
<div class="row justify-content-center">
    <div class="block_page col-12 col-sm-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="fas fa-pencil-alt"></i>Ajouter un tutoriel</h1>
        <?php if (!empty($validation)) { ?>
            <img alt="poro_nice" src="/public/assets/img/poro_nice.png">
            <p class="redirection_text_form text-center">Le tutoriel a bien été ajouté.</p>
        <?php }
        else {
            ?>
            <form action="/tutoriel/ajouter.html" method="post" name="add_news" class="form_Editor" id="form_news" enctype="multipart/form-data">
                <input id="x" type="hidden" name="text">
                <div class="name_form">
                    <input type="text" name="tutorial_title" placeholder="Nom du tutoriel" value="<?php if (isset($tutorial_title)) {echo $tutorial_title;}?>">
                </div>
                <div class="errors_subscribe"><?= ($errors['title']) ?? '' ?></div>

                <div class="cover_add"><img src=">" alt="Image_News"></div>
                <label for="file" class="label-file"><i class="far fa-file"></i> Choisir une image de couverture</label>
                <input id="file" class="input-file file_upload" type="file" name="cover_img">

                <div class="errors_subscribe error_cover"><?= ($errors['cover_img']) ?? '' ?></div>
                <select name="tutorial_cat">
                    <?php foreach ($list_Category as $category) { ?>
                        <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
                    <?php } ?>
                </select>
                    <textarea class="textarea_tutorial" name="tutorial_resume" placeholder="Description du tutoriel (50-60 mots)">
                        <?php if (isset($tutorial_resume)) {echo $tutorial_resume;} ?>
                    </textarea>
                <textarea id="trumbowyg" name="tutorial_txt">   <?php if (isset($text)) {echo $text;} ?></textarea>
                <div class="errors_subscribe"><?= ($errors['text']) ?? '' ?></div>
                <input type="submit" value="Envoyer le tutoriel">
            </form>
        <?php } ?>
    </div>
</div>
