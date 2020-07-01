<?php

class Comment
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
     * @var type integer
     */
    public $id_users;

    /**
     * @var type integer
     */
    public $id_news;

    public function __construct($_text = '', $_id_users = '', $_id_news = '')
    {
        $this->text = $_text;
        $this->id_users = $_id_users;
        $this->id_news = $_id_news;
    }

    public function create () {
        $sth = Database::getInstance()->prepare('INSERT INTO comments (date, id_news, id_users, text) VALUES (NOW(), :id_news, :id_users, :text)');
        $sth->bindValue(':id_news', $this->id_news, PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $sth->bindValue(':text', $this->text, PDO::PARAM_STR);
        if ($sth->execute()) {
            return true;
        }
    }

    public function getByNewsId()
    {
        $sth = Database::getInstance()->prepare('SELECT u.username, u.avatar, c.* FROM users u INNER JOIN comments c ON u.id = c.id_users AND c.id_news = :id ORDER BY date DESC');
        $sth->bindValue(':id', $this->id_news, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function countComment($id)
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS NbComment FROM comments WHERE id_news = :id');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }
    }
}

