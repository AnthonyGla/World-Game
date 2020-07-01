<?php
$this->titre = "Administration - Permissions";
?>
<h1>Permissions</h1>
<div class="row justify-content-center">
    <fieldset class="fieldset">
        <legend>Administrateurs</legend>
        <ul>
            <li>Dispose de tous les droits</li>
        </ul>
        <hr>
        <ul name="add_admin">
            <?php foreach ($rank_4 as $user) { ?>
                <li class="<?= $user->username;?>"><?= $user->username;?><a href=""><i id="<?= $user->username;?>" class="delete_permissions fas fa-user-times"></i></a></li>
            <?php } ?>
        </ul>
        <form action="/administration/modifier-utilisateur.html" method="POST">
            <input id="search_input" class="add_admin input_ui form-control form-control-lg" type="text" name="username" placeholder="Ajouter cet utilisateur">
            <input type="submit" class="add_permissions" id="add_admin" value="Ajouter cet utilisateur">
        </form>
    </fieldset>
    <fieldset class="fieldset">
        <legend>Journalistes</legend>
        <ul>
            <li>Peut désactiver un article ou un tutoriel</li>
            <li>Peut ajouter un article ou un tutoriel</li>
            <li>Peut modifier un commentaire</li>
            <li>Peut désactiver un commentaire</li>
        </ul>
        <hr>
        <ul  name="add_writer">
            <?php foreach ($rank_3 as $user) { ?>
                <li class="<?= $user->username;?>"><?= $user->username;?><a href=""><i id="<?= $user->username;?>" class="delete_permissions fas fa-user-times"></i></a></li>
            <?php } ?>
        </ul>
        <form action="/administration/modifier-utilisateur.html" method="POST">
            <input id="search_input" class="add_writer input_ui form-control form-control-lg" type="text" name="username" placeholder="Ajouter cet utilisateur">
            <input type="submit" class="add_permissions" id="add_writer" value="Ajouter cet utilisateur">
        </form>
    </fieldset>
    <fieldset class="fieldset">
        <legend>Modérateurs</legend>
        <ul>
            <li>Peut modifier un commentaire</li>
            <li>Peut désactiver un commentaire</li>
        </ul>
        <hr>
        <ul name="add_modo">
            <?php foreach ($rank_2 as $user) { ?>
                <li class="<?= $user->username;?>"><?= $user->username;?><a href=""><i id="<?= $user->username;?>" class="delete_permissions fas fa-user-times"></i></a></li>
            <?php } ?>
        </ul>
        <form action="/administration/modifier-utilisateur.html" method="POST">
            <input id="search_input" class="add_modo input_ui form-control form-control-lg" type="text" name="username" placeholder="Ajouter cet utilisateur">
            <input type="submit" class="add_permissions" id="add_modo" value="Ajouter cet utilisateur">
        </form>
    </fieldset>
</div>