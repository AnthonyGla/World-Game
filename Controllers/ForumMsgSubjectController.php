<?php
function openSubject() {
    $idSubject = $_GET['idSubject'];
    $listMsg = getMsgSubject($idSubject);
    require('fonctions.php');

    require('view/forumMsgSubjectView.php');
}
