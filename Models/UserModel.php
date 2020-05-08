<?php
class User
{
    /**
     * @var type string
     */
    public $username;

    /**
     * @var type string
     */
    public $mail;

    /**
     * @var type string
     */
    public $pass;

    /**
     * @var type string
     */
    public $key_activation;

    /**
     * @var type string
     */
    public $avatar;

    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type integer
     */
    public $rank;

    /**
     * @var type string
     */
    public $active;

    public function __construct($_username = '', $_mail = '', $_pass = '', $_key_activation = '', $_avatar = '', $_id = '', $_active = '', $_date = '', $_rank = '') {
        $this->username = $_username;
        $this->mail = $_mail;
        $this->pass = $_pass;
        $this->key_activation = $_key_activation;
        $this->avatar = $_avatar;
        $this->id = $_id;
        $this->active = $_active;
        $this->date = $_date;
        $this->rank = $_rank;
    }

    public function create() {
        $sth = Database::getInstance()->prepare('INSERT INTO `users` (`username`, `mail`, `password`, `key_activation`) VALUES (:username, :mail, :password, :key_activation)');
        $sth->bindValue(':username', $this->username, PDO::PARAM_STR);
        $sth->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $sth->bindValue(':password', $this->pass, PDO::PARAM_STR);
        $sth->bindValue(':key_activation', $this->key_activation, PDO::PARAM_STR);
        if ($sth->execute()) {
            return true;
        }
    }

    public function connection($username) {
        $sth = Database::getInstance()->prepare('SELECT id, username, avatar, id_list_rank, password, active FROM users WHERE username = :username');
        $sth->bindValue(':username', $username, PDO::PARAM_STR);
        $sth->execute();
        $select = $sth->fetch(PDO::FETCH_OBJ);
        if ($select) {
            $this->id = $select->id;
            $this->username = $select->username;
            $this->avatar = $select->avatar;
            $this->pass = $select->password;
            $this->active = $select->active;
            $this->rank = $select->id_list_rank;
            return $this;
        }  $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS NbComment FROM comments WHERE id_news = :id');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }
    }


    public function selectById($id) {
        $sth = Database::getInstance()->prepare('SELECT username, avatar, mail FROM users WHERE id = :id');
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
        $select = $sth->fetch(PDO::FETCH_OBJ);
        if ($select) {
            $this->username = $select->username;
            $this->mail = $select->mail;
            $this->avatar = $select->avatar;
            return $this;
        }
    }

    public function selectByUsername($username) {
        $sth = Database::getInstance()->prepare('SELECT id, username, avatar, mail, active, date FROM users WHERE username = :username');
        $sth->bindValue(':username', $username, PDO::PARAM_STR);
        $sth->execute();
        $select = $sth->fetch(PDO::FETCH_OBJ);
        if ($select) {
            $this->id = $select->id;
            $this->username = $select->username;
            $this->mail = $select->mail;
            $this->avatar = $select->avatar;
            $this->date = $select->date;
            $this->active = $select->active;
            return $this;
        }
    }

    public function selectSearch($value) {
        $sth = Database::getInstance()->prepare('SELECT username FROM users WHERE username LIKE :username');
        $sth->bindValue(':username', $value.'%', PDO::PARAM_STR);
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function getAll() {
        $sth = Database::getInstance()->prepare('SELECT username, avatar, mail, active FROM users');
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function memberByPage($limit, $begin) {
        $sql = 'SELECT `username`, `avatar`, `mail`, `active`, `date` FROM `users` LIMIT :limit OFFSET :begin';
        $sth = Database::getInstance()->prepare($sql);
        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sth->bindValue(':begin', $begin, PDO::PARAM_INT);
        if ($sth->execute()) {
                // Collection des données dans un tableau associatif (FETCH_ASSOC)
                return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    public function getKey()
    {
        $sth = Database::getInstance()->prepare('SELECT username, key_activation, active FROM users WHERE username = :username');
        $sth->bindValue(':username', $this->username, PDO::PARAM_STR);
        $sth->execute();
        $getKey = $sth->fetch(PDO::FETCH_OBJ);
        if ($getKey) {
            $this->key = $getKey->key_activation;
            $this->active = $getKey->active;
            return $this;
        }
    }

    public function check_mail($mail) {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) FROM users WHERE mail = :mail');
        $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
        if ($sth->execute()) {
            return $answer = $sth->fetchColumn();
        }
    }

    public function check_user($user) {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) FROM users WHERE username = :username');
        $sth->bindValue(':username', $user, PDO::PARAM_STR);
        $sth->execute();
        $answer = $sth->fetchColumn();
        if ($answer > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function check_permissions() {
        $sth = Database::getInstance()->prepare('SELECT id_list_rank FROM users WHERE id = :id');
        $sth->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
        if ($sth->execute()) {
            return $sth->fetch(PDO::FETCH_OBJ);
        }
    }

    public function updateAvatar($id, $avatar) {
        $sth = Database::getInstance()->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
        $sth->bindValue(':avatar', $avatar, PDO::PARAM_STR);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }

    public function updateMail($id, $mail) {
        $sth = Database::getInstance()->prepare('UPDATE users SET mail = :mail WHERE id = :id');
        $sth->bindValue(':mail', $mail, PDO::PARAM_STR);
        $sth->bindValue(':id', $id, PDO::PARAM_INT);
        $sth->execute();
    }

    public function updateStatut()
    {
        $sth = Database::getInstance()->prepare('UPDATE users SET active = :active WHERE username = :username');
        $sth->bindValue(':active', $this->active, PDO::PARAM_INT);
        $sth->bindValue(':username', $this->username, PDO::PARAM_STR);
        $sth->execute();
    }
}