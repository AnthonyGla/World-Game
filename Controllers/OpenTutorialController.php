<?php
class OpenTutorial_Class
{
    private static $data_view;

    public function __construct()
    {
        if (isset($_POST['id_tutorial'])) {
            $this->likeDislikeAjax();
            exit();
        }
        else {
            $this->selectTutorial();
        }

        $this->buildView();

    }

    private function selectTutorial() {
        $id_tuto = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $tutorial = new Tutorial();
        $tutorial = $tutorial->getOneById($id_tuto);

        $count_like = $tutorial->getLike($id_tuto);
        $count_dislike = $tutorial->getDislike($id_tuto);
        $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'dd MMMM yyyy à hh:mm');
        $tutorial->date = $dateformat->format(strtotime($tutorial->date));
        $tutorial->maj_tuto = $dateformat->format(strtotime($tutorial->maj_tuto));
        if (!empty($_SESSION['id'])) {
            $like = $tutorial->checkLike($id_tuto);
        }
        self::$data_view["tutorial"] = $tutorial;
        self::$data_view["count_like"] = $count_like;
        self::$data_view["count_dislike"] = $count_dislike;
    }

    private function likeDislikeAjax() {
        if (!empty($_SESSION['id'])) {
            $id_tutorial = $_POST['id_tutorial'];
            $call = $_GET['call'];
            $like_tuto = new Tutorial();
            $like_tuto->checkLike($id_tutorial);

            if (!empty($like_tuto->like)) {
                if ($call == $like_tuto->like) {
                    echo 'No Change';
                } else {
                    $like_tuto->like = (($like_tuto->like) == 1) ? 2 : 1;
                    $like_tuto->updateLike($like_tuto->like, $id_tutorial);
                    echo 'Change';
                }
            }
            else {
                $add_number = ($call == 1) ? 1 : 2;
                $like_tuto->addLike($add_number, $id_tutorial);
                echo 'Add';
            }
        }
        else {
            echo 'No session';
        }
    }

    private function buildView() {
        $view = new View("openTutorial");
        $view->generer(self::$data_view);
    }
}
