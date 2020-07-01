<?php

/*
1 = User
2 = Moderator
3 = Writer
4 = Administrator
*/

if (!empty($_SESSION['rank'])) {
    $check_permission = new User;
    $check_permission = $check_permission->check_permissions();
    $_SESSION['rank'] = $check_permission->id_list_rank;
}
//Recherche le mot "admin" dans le nom de la page
$administrator = stristr($url, 'admin');
//Stocke dans un tableau toutes les pages réservés aux journalistes
$array = array();
$array[] = 'addNews';
$array[] = 'updateNews';
$array[] = 'addTutorial';
$array[] = 'updateTutorial';
//Boucle sur ce tableau, et si une occurence est trouvé avec le nom de la page, arrête la boucle
foreach ($array as $value) {
    $writer = stristr($url, $value);
    if ($writer) {break;}
}
if ($writer) {
    if ($_SESSION['rank'] < 3 || empty($_SESSION['rank'])) {
        no_access();
    }
}
else if ($administrator) {
    if ($_SESSION['rank'] < 4 || empty($_SESSION['rank'])) {
        no_access();
    }
}
function no_access() {
        header('Location: /accueil.html');
        exit();
}