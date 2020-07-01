<?php
$this->titre = "Administration";
?>

<h1><i class="fas fa-chart-line"></i>Statistiques</h1>
<div class="row justify-content-center">
    <fieldset class="fieldset">
        <legend><i class="fas fa-globe-europe"></i>Qui est en ligne ?</legend>
        <p>Nombre d'utilisteurs connectés : <span><?= count($list_online); ?></span></p>
        <?php foreach ($list_online as $user_online) { ?>
            <p><a href=""><?= $user_online->username; ?></a> - Derniere interaction sur le site : <span>
               <?php if ($user_online->last_time <= 2) { echo 'Maintenant';}
               else {echo 'Il y a '.$user_online->last_time.' minutes';} ?>
            </span></p>
        <?php } ?>
</div>
</fieldset>
<fieldset class="fieldset">
    <legend><i class="fas fa-users"></i>Utilisateurs</legend>
    <div class="d-flex justify-content-around">
        <div>
            <p>Nombre d'utilisteurs enregistrés : <span><?= $stats->countMember; ?></span></p>
            <p>Nombre d'utilisteurs bannis : <span><?= $stats->countMemberBanned; ?></span></p>
            <p>Nombre d'utilisteurs désactivés : <span><?= $stats->countMemberDisabled; ?></span></p>
        </div>
        <div class="d-flex">
            <div class="m-auto">
                <p>Nombre d'inscriptions durant les 7 derniers jours : <span><?= $stats->countLastSubscribe; ?></span></p>
                <p>Dernier utilisateur inscrit : <span><a href="/administration/modifier-utilisateur/<?= $stats->nameLastSubscribe;; ?>.html"><?= $stats->nameLastSubscribe; ?></a></span></p>
            </div>
        </div>
    </div>
</fieldset>
<fieldset class="fieldset">
    <legend><i class="fas fa-newspaper"></i>Articles</legend>
    <div class="d-flex justify-content-around">
        <div>
            <p>Nombre d'articles : <span><?= $stats->countNews; ?></span></p>
            <p>Nombre de commentaires total : <span><?= $stats->countComments; ?></span></p>
            <p>Moyenne de commentaires par article : <span><?= $average_comment; ?></span></p>
        </div>
        <div class="d-flex">
            <div class="m-auto">
                <p>Article le plus populaire :<br/> <span><a href="/article/<?= $stats->idNewsMostPopular; ?>.html"><?= $stats->titleNewsMostPopular; ?></a></span></p>
                <p>Nombre de commentaires sur l'article: <span><?= $stats->countNewsMostPopular; ?></span></p>
            </div>
        </div>
    </div>
</fieldset>
<fieldset class="fieldset">
    <legend><i class="fas fa-book"></i>Tutoriels</legend>
    <div class="d-flex justify-content-around">
        <div>
            <p>Nombre de tutoriels : <span><?= $stats->countTutorial; ?></span></p>
            <p>Nombre de "likes" : <span><?= $stats->countLikes; ?></span></p>
            <p>Nombre de "dislikes" : <span><?= $stats->countDislikes; ?></span></p>
        </div>
        <div class="d-flex">
            <div class="m-auto">
                <p>Tutoriel le plus apprecié :<br/> <span><a href=""><?= $stats->bestTutorial; ?></a></span></p>
                <p>Tutoriel le moins apprecié:<br/> <span><a href=""><?= $stats->worstTutorial; ?></a></span></p>
            </div>
        </div>
    </div>
</fieldset>
<fieldset class="fieldset">
    <legend><i class="far fa-comments"></i>Forum</legend>
    <div class="d-flex justify-content-around">
        <div>
            <p>Nombre de sujets : <span><?= $stats->countSubjectsForum; ?></span></p>
            <p>Nombre de commentaires total : <span><?= $stats->countMessagesForum; ?></span></p>
            <p>Moyenne de commentaires par article : <span><?= $average_forum; ?></span></p>
        </div>
        <div class="d-flex">
            <div class="m-auto">
                <p>Sujet le plus populaire : <span><a href=""><?= $stats->titleSubjectMostPopular; ?></span></a></p>
                <p>Nombre de commentaires sur le sujet : <span><?= $stats->countSubjectMostPopular; ?></span></p>
            </div>
        </div>
    </div>
</fieldset>
</div>
