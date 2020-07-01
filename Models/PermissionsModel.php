<?php
class Permissions
{
    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type string
     */
    public $username;

    /**
     * @var type string
     */
    public $avatar;

    /**
     * @var type integer
     */
    public $rank;


    public function __construct($_username = '', $_avatar = '',$_rank = '', $_id = '')
    {
        $this->id = $_id;
        $this->username = $_username;
        $this->avatar = $_avatar;
        $this->rank = $_rank;
    }

    public function getRankGroup() {
        $sth = Database::getInstance()->prepare('SELECT username, avatar, id FROM users WHERE id_list_rank = :rank ORDER BY username DESC');
        $sth->bindValue(':rank', $this->rank, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function deletePermissionById() {
        $sth = Database::getInstance()->prepare('UPDATE users SET id_list_rank = 1 WHERE username = :username');
        $sth->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($sth->execute()) {
            return true;
        }
    }

    public function addPermissionByUsername() {
        $sth = Database::getInstance()->prepare('UPDATE users SET id_list_rank = :id_rank WHERE username = :username');
        $sth->bindValue(':id_rank', $this->rank, PDO::PARAM_INT);
        $sth->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($sth->execute()) {
            return true;
        }
    }
}