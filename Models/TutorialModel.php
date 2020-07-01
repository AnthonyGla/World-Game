<?php

class Tutorial
{
    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type string
     */
    public $date;

    /**
     * @var type string
     */
    public $title;

    /**
     * @var type string
     */
    public $text;

    /**
     * @var type string
     */
    public $resume;

    /**
     * @var type string
     */
    public $cover_img;

    /**
     * @var type string
     */
    public $maj_tuto;

    /**
     * @var type integer
     */
    public $id_users;

    /**
     * @var type integer
     */
    public $id_news_category;

    /**
     * @var type integer
     */
    public $like;

    /**
     * @var type integer
     */
    public $active;


    public function __construct($_id = '', $_title = '', $_text = '', $_resume = '', $_cover_img = '', $_maj_tuto = '', $_id_users = '', $_id_news_category = '', $_like = '', $_active = '', $_date = '')
    {
        $this->id = $_id;
        $this->title = $_title;
        $this->text = $_text;
        $this->resume = $_resume;
        $this->cover_img = $_cover_img;
        $this->maj_tuto = $_maj_tuto;
        $this->id_users = $_id_users;
        $this->id_news_category = $_id_news_category;
        $this->like = $_like;
        $this->active = $_active;
        $this->date = $_date;
    }

    public function create($title, $cover, $text, $resume, $id, $category) {
        $sth = Database::getInstance()->prepare('INSERT INTO tutorial (title, cover_img, text, resume, id_users, id_news_category) VALUES (:title, :cover_img, :text, :resume, :id_users, :id_news_category)');
        $sth->bindValue(':title', $title, PDO::PARAM_STR);
        $sth->bindValue(':cover_img', $cover, PDO::PARAM_STR);
        $sth->bindValue(':text', $text, PDO::PARAM_STR);
        $sth->bindValue(':resume', $resume, PDO::PARAM_STR);
        $sth->bindValue(':id_users', $id, PDO::PARAM_INT);
        $sth->bindValue(':id_news_category', $category, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getAll ($category) {
        $sql = 'SELECT * FROM tutorial WHERE id_news_category = :id_news_category AND active = 1';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id_news_category', $category, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function getIdOfCategory($string)
    {
        $sql = 'SELECT id FROM news_category WHERE name LIKE :string';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':string', $string, PDO::PARAM_STR);
        if ($sth->execute()) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }
    }

    public function getOnebyId($id)
    {
        $sql = 'SELECT t.*, u.username, u.avatar FROM tutorial AS t INNER JOIN users AS u ON t.id_users = u.id WHERE t.id = :id';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            $tutorial = $sth->fetch(PDO::FETCH_OBJ);
            if ($tutorial) {
                $this->id = $tutorial->id;
                $this->date = $tutorial->date;
                $this->title = $tutorial->title;
                $this->text = $tutorial->text;
                $this->resume = $tutorial->resume;
                $this->cover_img = $tutorial->cover_img;
                $this->maj_tuto = $tutorial->maj_tuto;
                $this->id_users = $tutorial->username;
                $this->id_news_category = $tutorial->id_news_category;
                $this->active = $tutorial->active;
                return $this;
            }
        }
    }

    public function updateTutorialById($title, $cover, $text, $resume, $category, $id)
    {
        $sth = Database::getInstance()->prepare('UPDATE tutorial SET title = :title, cover_img = :cover_img, text = :text, resume = :resume, id_news_category = :id_news_category, maj_tuto = NOW() WHERE id = :id');
        $sth->bindValue(':title', $title, PDO::PARAM_STR);
        $sth->bindValue(':cover_img', $cover, PDO::PARAM_STR);
        $sth->bindValue(':text', $text, PDO::PARAM_STR);
        $sth->bindValue(':resume', $resume, PDO::PARAM_STR);
        $sth->bindValue(':id_news_category', $category, PDO::PARAM_INT);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getLike($id) {
        $sql = 'SELECT COUNT(like_dislike) as count FROM like_tutorial WHERE id_tutorial = :id AND like_dislike = 1';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }
    }

    public function getDislike($id) {
        $sql = 'SELECT COUNT(like_dislike) as count FROM like_tutorial WHERE id_tutorial = :id AND like_dislike = 2';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }
    }

    public function checkLike($id_tutorial)
    {
        $sql = 'SELECT * FROM like_tutorial WHERE id_tutorial = :id_tutorial AND id_users = :id_users';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id_tutorial', $id_tutorial, PDO::PARAM_INT);
        $sth->bindValue(':id_users', $_SESSION['id'], PDO::PARAM_INT);
        $sth->execute();
        if ($sth->execute()) {
            $check = $sth->fetch(PDO::FETCH_OBJ);
            if ($check) {
                $this->like = $check->like_dislike;
                return $this;
            }
        }
    }

    public function addLike($like_dislike, $id_tutorial) {
        $sql = 'INSERT INTO `like_tutorial` (`like_dislike`, `id_tutorial`, `id_users`) VALUES (:like_dislike, :id_tutorial, :id_users)';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':like_dislike', $like_dislike, PDO::PARAM_INT);
        $sth->bindValue(':id_tutorial', $id_tutorial, PDO::PARAM_INT);
        $sth->bindValue(':id_users', $_SESSION['id'], PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }

    public function updateLike($like_dislike, $id_tutorial) {
        $sth = Database::getInstance()->prepare('UPDATE like_tutorial SET like_dislike = :like_dislike WHERE id_tutorial = :id_tutorial');
        $sth->bindValue(':like_dislike', $like_dislike, PDO::PARAM_STR);
        $sth->bindValue(':id_tutorial', $id_tutorial, PDO::PARAM_INT);
        $sth->execute();
    }

    public function disabled() {
        $sth = Database::getInstance()->prepare('UPDATE tutorial SET active = 0 WHERE id = :id');
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }
}