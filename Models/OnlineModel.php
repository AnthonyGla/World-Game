<?php

class Online {

    public function getAll () {
        $sth = Database::getInstance()->prepare('SELECT nb.*, u.username FROM nb_online AS nb INNER JOIN users AS u ON nb.id_users = u.id');
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function check_online() {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbExists FROM nb_online WHERE id_users = :id_users');
        $sth->bindValue(':id_users', $_SESSION['id'], PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }
    }


    public function insert_online($time) {
        $sth = Database::getInstance()->prepare('INSERT INTO `nb_online` (`last_time`, `id_users`) VALUES (:last_time, :id_users)');
        $sth->bindValue(':last_time', $time, PDO::PARAM_STR);
        $sth->bindValue(':id_users', $_SESSION['id'], PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }

    public function update_online($time) {
        $sth = Database::getInstance()->prepare('UPDATE nb_online SET last_time = :last_time WHERE id_users = :id_users');
        $sth->bindValue(':last_time', $time, PDO::PARAM_STR);
        $sth->bindValue(':id_users', $_SESSION['id'], PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }

    public function delete_online($time) {
        $sth = Database::getInstance()->prepare('DELETE FROM `nb_online` WHERE `last_time` < :last_time');
        $sth->bindValue(':last_time', $time, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }


}