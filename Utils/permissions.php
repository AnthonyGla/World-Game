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


$administrator = stristr($url, 'admin');


$array = array();
$array[] = 'addNews';
$array[] = 'updateNews';
foreach ($array as $value) {
    $writer = stristr($url, $value);
    if ($writer) {break;}
}

if ($administrator) {
    if ($_SESSION['rank'] < 4 || empty($_SESSION['rank'])) {
        no_access();
    }
}
else if ($writer) {
    if ($_SESSION['rank'] < 3 || empty($_SESSION['rank'])) {
        no_access();
    }
}

function no_access() {
        header('Location: /accueil.html');
        exit();
}