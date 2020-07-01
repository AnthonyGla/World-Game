<?php
class UpdateNews_Class
{
    private static $data_view;
    public function __construct()
    {
        if (!empty($_GET['id_news'])) {
            $this->getNews();
            $this->getListCategory();
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->verification(self::$data_view["news"]->id);
        }
        $this->buildView();
    }
    public function getNews() {
        $id_news = trim(filter_input(INPUT_GET, 'id_news', FILTER_SANITIZE_NUMBER_INT));
        $news_to_modify = new News();
        $news_to_modify->id = $id_news;
        $news = $news_to_modify->getOneById();
        self::$data_view["news"] = $news;
    }
    public function getListCategory() {
        $list_Category = self::$data_view["news"]->getListCategory();
        self::$data_view["list_Category"] = $list_Category;
    }
    public function verification($id_news)
    {
        $errors = [];

        $news_title = trim(filter_input(INPUT_POST, 'news_title', FILTER_SANITIZE_STRING));
        if (empty($news_title)) {
            $errors['title'] = 'L\'article doit contenir un titre !';
        }

        $text = trim(filter_input(INPUT_POST, 'text', FILTER_SANITIZE_STRING));
        if (empty($text)) {
            $errors['text'] = 'L\'article ne peut être vide !';
        }

        if (!empty($_FILES['cover_img']['tmp_name'])) {
            list($width, $height) = getimagesize($_FILES['cover_img']['tmp_name']);
            $weightMax = 2097152;
            $sizeMin = 1500;
            $valid_extension = array('jpg', 'jpeg', 'gif', 'png');
            $upload_extension = strtolower(substr(strrchr($_FILES['cover_img']['name'], '.'), 1));


            if ($_FILES['cover_img']['size'] > $weightMax || $_FILES['cover_img']['size'] == 0) {
                $errors['cover_img'] = 'L\'image selectionné depasse le poids autorisé';
            }

            else if ($width < $sizeMin) {
                $errors['cover_img'] = 'L\'image de couverture doit faire 1690px de largeur au minimum';
            }
            else if (!in_array($upload_extension, $valid_extension)) {
                $errors['cover_img'] = 'L\'image de couverture doit être au format jpg, jpeg, gif ou png';
            }
        }

        $news_category = trim(filter_input(INPUT_POST, 'news_cat', FILTER_SANITIZE_NUMBER_INT));

        if (isset($_POST['news_star'])) {
            $news_star = 1;
        } else {
            $news_star = 0;
        }

        if (count($errors) == 0) {
            if (empty($_FILES['cover_img']['tmp_name'])) {
                $cover_img = self::$data_view['news']->cover_img;
            }
            else {
                unlink(self::$data_view['news']->cover_img);
                $filename = pathinfo($_FILES['cover_img']['name'], PATHINFO_FILENAME);
                $road = '../public/assets/img/news_cover/' . $filename . ' - ' . $_FILES['cover_img']['size'] . '.' . $upload_extension;
                move_uploaded_file($_FILES['cover_img']['tmp_name'], $road);
                $cover_img = $road;
            }
            $updateNews = new News();
            $validation = $updateNews->updateById($news_title, $cover_img, $text, $news_star, $news_category, $id_news);
            self::$data_view["validation"] = $validation;
        }
        else {
            self::$data_view["errors"] = $errors;
        }
    }

    private function buildView() {
        $vue = new View("updateNews");
        $vue->generer(self::$data_view);
    }
}