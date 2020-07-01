<?php
class AddNews_Class
{
    private static $data_view;

    public function __construct()
    {
        $list_Category = new News();
        $list_Category = $list_Category->getListCategory();
        self::$data_view["list_Category"] = $list_Category;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->verification();
        }
        $this->buildView();
    }

    public function verification()
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
            $sizeMin = 1690;
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
        else {
            $errors['cover_img'] = 'L\'article doit avoir une image de couverture !';
        }

        $news_category = trim(filter_input(INPUT_POST, 'news_cat', FILTER_SANITIZE_NUMBER_INT));

        if (isset($_POST['news_star'])) {
            $news_star = 1;
        } else {
            $news_star = 0;
        }

        if (count($errors) == 0) {
            $filename = pathinfo($_FILES['cover_img']['name'], PATHINFO_FILENAME);
            $road = ROOT.'/public/assets/img/news_cover/' .$filename. ' - ' .$_FILES['cover_img']['size']. '.' .$upload_extension;
            move_uploaded_file($_FILES['cover_img']['tmp_name'], $road);
            $cover_img = '/public/assets/img/tutorial_cover/' .$filename. ' - ' .$_FILES['cover_img']['size']. '.' .$upload_extension;
            $addNews = new News($news_title, $cover_img, $text, $news_star, $_SESSION['id'], $news_category);
            $validation = true;
            $addNews->create();
            self::$data_view["validation"] = $validation;
        }
        else {
            self::$data_view["news_title"] = $news_title;
            self::$data_view["news_text"] = $text;
            self::$data_view["news_star"] = $news_star;
            self::$data_view["errors"] = $errors;
        }
    }

    private function buildView() {
        $vue = new View("addNews");
        $vue->generer(self::$data_view);
    }
}