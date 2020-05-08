<?php

class Announcements
{
    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type string
     */
    public $text;

    public function __construct($_text = '')
    {
        $this->text = $_text;
    }

    public function create() {
        $sth = Database::getInstance()->prepare('INSERT INTO announcements (text) VALUES (:text)');
        $sth->bindValue(':text', $this->text, PDO::PARAM_STR);
        if ($sth->execute()) {
            return true;
        }
    }

    public function delete($id) {
        $sth = Database::getInstance()->prepare('DELETE FROM `announcements` WHERE `id` = :id');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }

    public function getAll()
    {
        $sth = Database::getInstance()->query('SELECT * FROM announcements ORDER BY id DESC LIMIT 5');
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }
}