<?php

class Statistics
{
    public $countMember;
    public $countMemberBanned;
    public $countMemberDisabled;
    public $countNews;
    public $countComments;
    public $idNewsMostPopular;
    public $titleNewsMostPopular;
    public $countNewsMostPopular;
    public $countSubjectsForum;
    public $countMessagesForum;
    public $idSubjectMostPopular;
    public $titleSubjectMostPopular;
    public $countSubjectMostPopular;
    public $countLastSubscribe;
    public $countnameLastSubscribe;
    public $countTutorial;
    public $countLikes;
    public $countDislikes;
    public $bestTutorial;
    public $worstTutorial;

    public function __construct($_countMember = '', $_countMemberBanned = '', $_countMemberDisabled = '', $_countNews = '', $_countComments = '', $_idNewsMostPopular = '', $_titleNewsMostPopular = '', $_countNewsMostPopular = '', $_countSubjectsForum = '', $_countMessagesForum = '', $_idSubjectMostPopular = '', $_titleSubjectMostPopular = '', $_subjectMostPopular = '', $_countLastSubscribe = '', $_countnameLastSubscribe = '', $_countTutorial = '', $_countLikes = '', $_countDislikes = '', $_bestTutorial = '', $_worstTutorial = '')
    {
        $this->countMember = $_countMember;
        $this->countMemberBanned = $_countMemberBanned;
        $this->countMemberDisabled = $_countMemberDisabled;
        $this->countNews = $_countNews;
        $this->countComments = $_countComments;
        $this->idNewsMostPopular = $_idNewsMostPopular;
        $this->titleNewsMostPopular = $_titleNewsMostPopular;
        $this->countNewsMostPopular = $_countNewsMostPopular;
        $this->countSubjectsForum = $_countSubjectsForum;
        $this->countMessagesForum = $_countMessagesForum;
        $this->idSubjectMostPopular = $_idSubjectMostPopular;
        $this->titleSubjectMostPopular = $_titleSubjectMostPopular;
        $this->countSubjectMostPopular = $_subjectMostPopular;
        $this->countLastSubscribe = $_countLastSubscribe;
        $this->countnameLastSubscribe = $_countnameLastSubscribe;
        $this->countTutorial = $_countTutorial;
        $this->countLikes = $_countLikes;
        $this->countDislikes = $_countDislikes;
        $this->bestTutorial = $_bestTutorial;
        $this->worstTutorial = $_worstTutorial;
    }

    //Nombre total d'utilisateurs
    public function countMember()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbMember FROM users');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countMember = $count->nbMember;
            }
        }
    }

    //Nombre total de comptes bannis
    public function countMemberBanned()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbMemberBanned FROM users WHERE active = 2');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countMemberBanned = $count->nbMemberBanned;
            }
        }
    }

    //Nombre total de comptes pas activés
    public function countMemberDisabled()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbMemberDisabled FROM users WHERE active = 0');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countMemberDisabled = $count->nbMemberDisabled;
            }
        }
    }

    //Inscris durant les 7 derniers jours
    public function countLastSubscribe()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) as nbSubscribe FROM users WHERE `date` BETWEEN (CURRENT_DATE() - INTERVAL 7 DAY)  AND  CURRENT_DATE()');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countLastSubscribe = $count->nbSubscribe;
            }
        }
    }

    //Pseudo du dernier inscrit
    public function nameLastSubscribe()
    {
        $sth = Database::getInstance()->query('SELECT username FROM users ORDER BY id DESC LIMIT 1');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->nameLastSubscribe = $count->username;
            }
        }
    }

    //Nombre total d'articles
    public function countNews()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbNews FROM news');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countNews = $count->nbNews;
            }
        }
    }

    //Nombre total de commentaires
    public function countComments()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbComments FROM comments');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countComments = $count->nbComments;
            }
        }
    }

    //Article avec le plus de commentaire
    public function newsMostPopular()
    {
        $sth = Database::getInstance()->prepare('SELECT n.title, n.id, COUNT( * ) as occurrence FROM news as n LEFT JOIN comments as cm ON n.id = cm.id_news GROUP BY n.id ORDER BY occurrence DESC LIMIT 1');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->idNewsMostPopular = $count->id;
                $this->titleNewsMostPopular = $count->title;
                $this->countNewsMostPopular = $count->occurrence;
            }
        }
    }

    //Journalistes les plus actifs
    public function mostActivePoster()
    {
        $sth = Database::getInstance()->prepare('SELECT u.username, u.avatar, u.mail, u.date, COUNT(*) AS count FROM news AS n INNER JOIN users AS u ON u.id = n.id_users GROUP BY u.id LIMIT 10');
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    //Journalistes les plus actifs
    public function mostActiveComments()
    {
        $sth = Database::getInstance()->prepare('SELECT u.username, u.avatar, u.mail, u.date, COUNT(*) AS count FROM comments AS c INNER JOIN users AS u ON u.id = c.id_users GROUP BY u.id LIMIT 10');
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    //Nombre total de sujets sur le forum
    public function countSubjectsForum()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbSubjects FROM forum_subjects');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countSubjectsForum = $count->nbSubjects;
            }
        }
    }

    //Nombre total de posts forum
    public function countMessagesForum()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbMessages FROM forum_messages');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countMessagesForum = $count->nbMessages;
            }
        }
    }

    //Sujet qui a le plus de posts
    public function subjectMostPopular()
    {
        $sth = Database::getInstance()->prepare('SELECT fs.name, fs.id, COUNT( * ) as occurrence FROM forum_subjects as fs LEFT JOIN forum_messages as fm ON fs.id = fm.id_forum_subjects GROUP BY fs.id ORDER BY occurrence DESC LIMIT 1');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->idSubjectMostPopular = $count->id;
                $this->titleSubjectMostPopular = $count->name;
                $this->countSubjectMostPopular = $count->occurrence;
            }
        }
    }

    //Utilisateurs les plus actifs sur le forum
    public function mostActiveForum()
    {
        $sth = Database::getInstance()->prepare('SELECT u.username, u.avatar, u.date, COUNT(*) AS count FROM forum_messages AS fm INNER JOIN users AS u ON u.id = fm.id_users GROUP BY u.id LIMIT 10');
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }

    //Nombre de tutoriels
    public function countTutorial()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbTutorial FROM tutorial');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countTutorial = $count->nbTutorial;
            }
        }
    }

    //Nombre total de likes
    public function countLikes()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbLikes FROM like_tutorial WHERE like_dislike = 1');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countLikes = $count->nbLikes;
            }
        }
    }

    //Nombre total de dislikes
    public function countDislikes()
    {
        $sth = Database::getInstance()->prepare('SELECT COUNT(*) AS nbDislikes FROM like_tutorial WHERE like_dislike = 2');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->countDislikes = $count->nbDislikes;
            }
        }
    }

    //Tutoriel qui a le plus de likes
    public function getBestTutorial()
    {
        $sth = Database::getInstance()->prepare('SELECT t.title, COUNT(*) FROM tutorial AS t INNER JOIN like_tutorial AS lt ON t.id = lt.id_tutorial WHERE like_dislike = 1 GROUP BY t.title');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->bestTutorial = $count->title;
            }
        }
    }

    //Tutoriel qui a le plus de dislikes
    public function getWorstTutorial()
    {
        $sth = Database::getInstance()->prepare('SELECT t.title, COUNT(*) FROM tutorial AS t INNER JOIN like_tutorial AS lt ON t.id = lt.id_tutorial WHERE like_dislike = 2 GROUP BY t.title');
        if ($sth->execute()) {
            $count = $sth->fetch(PDO::FETCH_OBJ);
            if ($count) {
                $this->worstTutorial = $count->title;
            }
        }
    }

    public function mostActiveTutorial()
    {
        $sth = Database::getInstance()->prepare('SELECT u.username, u.avatar, u.mail, u.date, COUNT(*) AS count FROM tutorial AS t INNER JOIN users AS u ON u.id = t.id_users GROUP BY u.id LIMIT 10');
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);
        }
    }
}