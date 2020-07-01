<?php
class OpenTutorial_Class
{
    private static $data_view;

    public function __construct()
    {
        if (!empty($_GET['id_tuto'])) {
            $this->disabled_tutorial();
            exit();
        }

        if (isset($_POST['id_tutorial'])) {
            $this->likeDislikeAjax();
            exit();
        }
        $this->buildTutorial();
        $this->buildView();
    }

    private function buildTutorial() {
        $tutorial = new Tutorial();
        $tutorial->id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        if ((!$tutorial->getOneById($tutorial->id)) || $tutorial->active == 0){
            header('Location: /page-introuvable.html');
        }
        else {
            $count_like = $tutorial->getLike($tutorial->id);
            $count_dislike = $tutorial->getDislike($tutorial->id);
            $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'd MMMM yyyy à HH:mm');
            $tutorial->date = $dateformat->format(strtotime($tutorial->date));
            $tutorial->maj_tuto = $dateformat->format(strtotime($tutorial->maj_tuto));
            if (!empty($_SESSION['id'])) {
                $like = $tutorial->checkLike($tutorial->id);
            }
            self::$data_view["tutorial"] = $tutorial;
            self::$data_view["count_like"] = $count_like;
            self::$data_view["count_dislike"] = $count_dislike;
        }
    }

    private function disabled_tutorial() {
        $id_tuto = filter_input(INPUT_GET, 'id_tuto', FILTER_SANITIZE_NUMBER_INT);
        $tuto_disabled = new Tutorial();
        $tuto_disabled->id = $id_tuto;
        $tuto_disabled->disabled();
        echo 'Success';
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
