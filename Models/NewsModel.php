<?php
class News
{
    /**
     * @var type string
     */
    public $title;

    /**
     * @var type string
     */
    public $cover_img;

    /**
     * @var type string
     */
    public $text;

    /**
     * @var type integer
     */
    public $star;

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
    public $active;

    /**
     * @var type string
     */
    public $date;


    public function __construct($_title = '', $_cover_img = '', $_text = '', $_star = '', $_id_users = '', $_id_news_category = '', $_active = '', $_date = '')
    {
        $this->title = $_title;
        $this->cover_img = $_cover_img;
        $this->text = $_text;
        $this->star = $_star;
        $this->id_users = $_id_users;
        $this->id_news_category = $_id_news_category;
        $this->active = $_active;
        $this->date = $_date;
    }

    public function create()
    {
        $sth = Database::getInstance()->prepare('INSERT INTO news (title, cover_img, text, star, id_users, id_news_category) VALUES (:title, :cover_img, :text, :star, :id_users, :id_news_category)');
        $sth->bindValue(':title', $this->title, PDO::PARAM_STR);
        $sth->bindValue(':cover_img', $this->cover_img, PDO::PARAM_STR);
        $sth->bindValue(':text', $this->text, PDO::PARAM_STR);
        $sth->bindValue(':star', $this->star, PDO::PARAM_INT);
        $sth->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $sth->bindValue(':id_news_category', $this->id_news_category, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }

    public function getOneById()
    {
        $sql = 'SELECT n.*, u.username, nc.name FROM news AS n INNER JOIN users AS u INNER JOIN news_category AS nc ON n.id_users = u.id AND n.id_news_category = nc.id WHERE n.id = :id AND n.active = 1';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {//hydrate la fonction, lui attribut des nouvelles valeurs
            $news = $sth->fetch(PDO::FETCH_OBJ);
            if ($news) {
                $this->date = $news->date;
                $this->title = $news->title;
                $this->cover_img = $news->cover_img;
                $this->text = $news->text;
                $this->star = $news->star;
                $this->id_users = $news->username;
                $this->id_news_category = $news->name;
                $this->active = $news->active;
                return $this;
            }
        }
    }

    public function updateById($title, $cover, $text, $star, $category, $id) {
        $sth = Database::getInstance()->prepare('UPDATE news SET title = :title, cover_img = :cover_img, text = :text, star = :star, id_news_category = :id_news_category  WHERE id = :id');
        $sth->bindValue(':title', $title, PDO::PARAM_STR);
        $sth->bindValue(':cover_img', $cover, PDO::PARAM_STR);
        $sth->bindValue(':text', $text, PDO::PARAM_STR);
        $sth->bindValue(':star', $star, PDO::PARAM_INT);
        $sth->bindValue(':id_news_category', $category, PDO::PARAM_INT);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }

    public function getAll()
    {
        $sth = Database::getInstance()->query('SELECT n.*, u.username, u.avatar FROM news AS n INNER JOIN users AS u ON n.id_users = u.id WHERE star = 0 AND n.active = 1 ORDER BY date DESC LIMIT 0,12');
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public function getStar()
    {
        $sth = Database::getInstance()->query('SELECT n.*, u.username, u.avatar, nc.name FROM news AS n INNER JOIN users AS u ON n.id_users = u.id INNER JOIN news_category AS nc ON nc.id = n.id_news_category WHERE star = 1 AND n.active = 1 ORDER BY date DESC LIMIT 0, 1');
        return $sth->fetch(PDO::FETCH_OBJ);
    }

    public function getListCategory()
    {
        $sth = Database::getInstance()->query('SELECT name, id FROM news_category');
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public function disabled() {
        $sth = Database::getInstance()->prepare('UPDATE news SET active = 0 WHERE id = :id');
        $sth->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return true;
        }
    }
}