<?php
class Messages
{
    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type string
     */
    public $text;

    /**
     * @var type string
     */
    public $date;

    /**
     * @var type integer
     */
    public $id_users;

    /**
     * @var type integer
     */
    public $id_users_sender;

    /**
     * @return type
     */

    public function create($subject, $text, $id_users, $id_sender)
    {
        $sth = Database::getInstance()->prepare('INSERT INTO private_msg (subject, text, id_users, id_users_sender) VALUES (:subject, :text, :id_users, :id_users_sender)');
        $sth->bindValue(':subject', $subject, PDO::PARAM_STR);
        $sth->bindValue(':text', $text, PDO::PARAM_STR);
        $sth->bindValue(':id_users', $id_users, PDO::PARAM_INT);
        $sth->bindValue(':id_users_sender', $id_sender, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }

    public function getMessages()
    {
        $sth = Database::getInstance()->prepare('SELECT mp.*, u.username, u.avatar FROM private_msg mp INNER JOIN users u ON mp.id_users_sender = u.id WHERE mp.id_users = :id');
        $sth->bindValue(':id', $this->id_users, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function getOneById() {
        $sth = Database::getInstance()->prepare('SELECT mp.*, u.username, u.avatar FROM private_msg mp INNER JOIN users u ON mp.id_users_sender = u.id WHERE mp.id_users = :id AND mp.id = :id_mp');
        $sth->bindValue(':id', $this->id_users, PDO::PARAM_INT);
        $sth->bindValue(':id_mp', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }
    }

    public function updateMessageOpen() {
        $sth = Database::getInstance()->prepare('UPDATE private_msg SET open = 1 WHERE id = :id');
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }

}
