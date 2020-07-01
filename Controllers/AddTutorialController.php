<?php
class AddTutorial_Class
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

    public static function verification()
    {
        $errors = [];
        $tutorial_title = trim(filter_input(INPUT_POST, 'tutorial_title', FILTER_SANITIZE_STRING));
        if (empty($tutorial_title)) {
            $errors['title'] = 'Le tutoriel doit avoir un nom !';
        }

        $tutorial_resume = trim(filter_input(INPUT_POST, 'tutorial_resume', FILTER_SANITIZE_STRING));
        if (empty($tutorial_resume)) {
            $errors['title'] = 'Le tutoriel doit avoir une description !';
        }

        $text = trim(filter_input(INPUT_POST, 'tutorial_txt', FILTER_SANITIZE_STRING));
        if (empty($text)) {
            $errors['text'] = 'Le tutoriel ne peut être vide !';
        }

        if (!empty($_FILES['cover_img']['tmp_name'])) {
            list($width, $height) = getimagesize($_FILES['cover_img']['tmp_name']);
            $weightMax = 2097152;
            $sizeMin = 1390;
            $valid_extension = array('jpg', 'jpeg', 'gif', 'png');
            $upload_extension = strtolower(substr(strrchr($_FILES['cover_img']['name'], '.'), 1));

            if ($_FILES['cover_img']['size'] > $weightMax || $_FILES['cover_img']['size'] == 0) {
                $errors['cover_img'] = 'L\'image selectionné depasse le poids autorisé';
            }

            else if ($width < $sizeMin) {
                $errors['cover_img'] = 'L\'image de couverture doit faire 1390px de largeur au minimum';
            }
            else if (!in_array($upload_extension, $valid_extension)) {
                $errors['cover_img'] = 'L\'image de couverture doit être au format jpg, jpeg, gif ou png';
            }
        }
        else {
            $errors['cover_img'] = 'L\'article doit avoir une image de couverture !';
        }

        $tutorial_category = trim(filter_input(INPUT_POST, 'tutorial_cat', FILTER_SANITIZE_NUMBER_INT));

        if (count($errors) == 0) {
            $filename = pathinfo($_FILES['cover_img']['name'], PATHINFO_FILENAME);
            $road = ROOT.'/public/assets/img/tutorial_cover/' .$filename. ' - ' .$_FILES['cover_img']['size']. '.' .$upload_extension;
            move_uploaded_file($_FILES['cover_img']['tmp_name'], $road);
            $road_data = '/public/assets/img/tutorial_cover/' .$filename. ' - ' .$_FILES['cover_img']['size']. '.' .$upload_extension;
            $addTutorial = new Tutorial();
            $validation = true;
            $return = $addTutorial->create($tutorial_title, $road_data, $text, $tutorial_resume, $_SESSION['id'], $tutorial_category);
            self::$data_view["validation"] = $validation;
            var_dump($return);
        }
        else {
            self::$data_view["tutorial_title"] = $tutorial_title;
            self::$data_view["text"] = $text;
            self::$data_view["tutorial_resume"] = $tutorial_resume;
            self::$data_view["errors"] = $errors;
        }
    }

    private function buildView()
    {
        $view = new View("addTutorial");
        $view->generer(self::$data_view);
    }
}