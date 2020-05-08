<?php
function openCategory() {
    $id_Category = $_GET['idCategory'];
    $listSubject = listSubject($id_Category);
    require('fonctions.php');
    require('view/forumListSubjectView.php');
}
