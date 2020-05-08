<?php

class News_Class
{
    private static $data_view;

    public function __construct()
    {
        if (!empty($_GET['id_news'])) {
            $this->disabled();
            exit();
        }

        if(empty($_GET['id']) || !filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)){
            header ('location: index.php');
            exit();
        }

        $this->buildNews();

        if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
            $this->add_comment();
        }

        $this->buildView();
    }

    private function buildNews() {
        $news = new News();
        $news->id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        if (!$news->getOneById()){
            $error = 'Cet article n\'existe pas';
            $sleep = 5;
            header('Refresh:'. $sleep .';/accueil.html');
        }
        else {
            $comment = new Comment();
            $comment->id_news = $news->id;
            $countComment = $comment->countComment($comment->id_news);
            $allComment = $comment->getByNewsId();

            $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'd MMMM yyyy à HH:mm');
            $news->date = $dateformat->format(strtotime($news->date));

            foreach($allComment as $key=>$value){
                $value->date = $dateformat->format(strtotime($value->date));
            }
            self::$data_view["news"] = $news;
            self::$data_view["countComment"] = $countComment;
            self::$data_view["allComment"] = $allComment;
        }
    }

    private function add_comment() {
        $text = trim(filter_input(INPUT_POST, 'comm_news', FILTER_SANITIZE_STRING));
        if (empty($text)) {
            $errors['$text'] = 'Vous ne pouvez envoyer un commentaire vide';
        }
        else {
            $Addcomment = new Comment($text, $_SESSION['id'], $_POST['news_id']);
            $success = $Addcomment->create();
            if ($success) {
                header('Location: /article/' . $_POST['news_id'] . '/commentaires.html#repere');
            }
        }
    }

    private function disabled() {
        $id_news = filter_input(INPUT_GET, 'id_news', FILTER_SANITIZE_NUMBER_INT);
        $news_disabled = new News();
        $news_disabled->id = $id_news;
        $news_disabled->disabled();
        echo 'Success';
    }

    private function buildView() {
        $vue = new View("news");
        $vue->generer(self::$data_view);
    }
}
