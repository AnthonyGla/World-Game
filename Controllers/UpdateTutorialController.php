<?php

class UpdateTutorial_Class
{
    private static $data_view;

    public function __construct()
    {
        $this->getTutorial();
        $this->getListCategory();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->verification();
        }
        $this->buildView();
    }

    public function getTutorial()
    {
        $tutorial = new Tutorial();
        $tutorial->id = trim(filter_input(INPUT_GET, 'id_tutorial', FILTER_SANITIZE_NUMBER_INT));
        if ((!$tutorial->getOneById($tutorial->id)) || $tutorial->active == 0) {
            header('Location: /page-introuvable.html');
        } else {
            self::$data_view["tutorial"] = $tutorial;
        }
    }

    public function getListCategory()
    {
        $category = new News();
        $list_Category = $category->getListCategory();
        self::$data_view["list_Category"] = $list_Category;
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

        $tutorial_category = trim(filter_input(INPUT_POST, 'tutorial_cat', FILTER_SANITIZE_NUMBER_INT));

        if (count($errors) == 0) {
            if (empty($_FILES['cover_img']['tmp_name'])) {
                $road_data = self::$data_view['tutorial']->cover_img;
            }
            else {
                $filename = pathinfo($_FILES['cover_img']['name'], PATHINFO_FILENAME);
                $road = ROOT.'/public/assets/img/tutorial_cover/' .$filename. ' - ' .$_FILES['cover_img']['size']. '.' .$upload_extension;
                move_uploaded_file($_FILES['cover_img']['tmp_name'], $road);
                $road_data = '/public/assets/img/tutorial_cover/' .$filename. ' - ' .$_FILES['cover_img']['size']. '.' .$upload_extension;
            }
            $addTutorial = new Tutorial();
            $validation = true;
            $return = $addTutorial->updateTutorialById($tutorial_title, $road_data, $text, $tutorial_resume, $tutorial_category, self::$data_view['tutorial']->id);
            self::$data_view["validation"] = $validation;
        }
        else {
            self::$data_view["errors"] = $errors;
        }
    }

    private function buildView()
    {
        $vue = new View("updateTutorial");
        $vue->generer(self::$data_view);
    }
}