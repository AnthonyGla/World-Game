<?php
class Forum
{
    /**
     * @var type integer
     */
    public $id;

    /**
     * @var type string
     */
    public $name;

    /**
     * @var type string
     */
    public $cover_img;

    /**
     * @var type string
     */
    public $logo;

    /**
     * @var type integer
     */
    public $nb_subjects;

    public function __construct($_id = '', $_name = '', $_cover_img = '', $_logo = '', $_nb_subjects = '')
    {
        $this->id = $_id;
        $this->name = $_name;
        $this->cover_img = $_cover_img;
        $this->logo = $_logo;
        $this->nb_subjects = $_nb_subjects;
    }

    public function getCategory()
    {
        $sth = Database::getInstance()->query('SELECT * FROM forum_category');
        return $sth->fetchAll(PDO::FETCH_OBJ);
    }

    public function listSubject($id_Category)
    {
        $bdd = dbConnect();
        $req = $bdd->prepare('SELECT * FROM category_forum cf INNER JOIN subjects_forum sf ON cf.id = sf.subject_category AND sf.subject_category = :id ORDER BY subject_date DESC');
        $req->execute(['id' => $id_Category]);
        return $req;
    }

    public function countSubject()
    {
        $sth = Database::getInstance()->query('SELECT id_forum_category, COUNT(*) AS `num` FROM forum_subjects GROUP BY id_forum_category');
        if ($sth->execute()) {
            return $sth->fetchAll(PDO::FETCH_OBJ);

        }
    }

    public function getMsgSubject($id)
    {
        $bdd = dbConnect();
        $req = $bdd->prepare('SELECT * FROM espace_membre em INNER JOIN msg_forum mf ON em.id = mf.msg_author AND mf.msg_subject = :id ORDER BY msg_date DESC');
        $req->execute(['id' => $id]);
        return $req;
    }
}