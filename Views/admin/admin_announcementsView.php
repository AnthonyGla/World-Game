<?php
$this->titre = "Administration";
?>
<h1>Annonces</h1>
<div class="row justify-content-center">
    <fieldset class="fieldset">
        <legend>Ajouter une annonce</legend>
        <p>Le bandeau défilant affiche automatiquement les 5 dernières annonces. Chaque nouvelle annonce envoyée remplacera la plus ancienne des cinq</p>
        <form action="/administration/annonces.html" method="POST" class="form_subscribe">
            <select class="form-control form-control-lg" name="choose_category">
                <option value="Divers">Divers</option>
            <?php foreach ($list_Category as $category) { ?>
                <option value="<?= $category->id; ?>"><?= $category->name; ?></option>
            <?php } ?>
        </select>
            <input class="form-control form-control-lg" type="text" name="announcement" placeholder="Nouvelle annonce">
        <input type="submit" value="Ajouter une annonce"">
            <p><?= ($error_add) ?? '' ?></p>
    </form>
    </fieldset>
    <fieldset class="fieldset">
        <legend>Supprimer une annonce</legend>
        <?php
        foreach ($list_announcements as $announcement) { ?>
            <div class="manage_announcement" id="<?= $announcement->id; ?>"><?= $announcement->text; ?><a href="#"><span> - Supprimer cette annonce <i class="fas fa-times text-danger"></i></span></a></div>
        <?php } ?>
        <p><?= ($error_delete) ?? '' ?></p>

    </fieldset>
</div>
