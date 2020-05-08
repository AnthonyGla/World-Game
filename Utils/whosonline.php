<?php
if (!empty($_SESSION['id'])) {
    $online = new Online();
    $check = $online->check_online();
    if ($check->nbExists == 0) {
        $online->insert_online(time());
    }
    else {
        $online->update_online(time());
    }
    $online->delete_online(time() - 900);
}