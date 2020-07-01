<?php

class UserInfo_Class
{
    private static $data_view;

    public function __construct()
    {
        self::$data_view = array();
        $this->getUserInfo();
        $this->getUserGames();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->verification();
        }
        $this->buildView(self::$data_view);
    }

    private function getUserInfo()
    {
        $user = new User();
        self::$data_view["userinfo"]  = $user->selectById($_SESSION['id']);
    }

    private function getUserGames()
    {
        $userGames = new Game();
        self::$data_view["usergames"] = $userGames->getUsernamesGames(self::$data_view["userinfo"]->username);
    }

        private function verification()
        {
            $errors = [];
            $regexMail = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";

            if (!empty($_FILES['avatar']['name'])) {
                $tailleMax = 2097152;
                $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                if ($_FILES['avatar']['size'] > $tailleMax || $_FILES['avatar']['size'] == 0) {
                    $errors['avatar'] = $_FILES['avatar']['size'];
                } else if (!in_array($extensionUpload, $extensionsValides)) {
                    $errors['avatar'] = 'Votre avatar doit être au format jpg, jpeg, gif ou png';
                } else {
                    $chemin = ROOT.'/public/assets/img/users_avatars/' . $_SESSION['id'] . '.' . $extensionUpload;
                    move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                    $road_data = '/public/assets/img/users_avatars/'.$_SESSION['id'].'.'.$extensionUpload;
                    self::$data_view["userinfo"]->updateAvatar($_SESSION['id'], $road_data);
                    self::$data_view["userinfo"]->avatar = $road_data;
                    $_SESSION['avatar'] = $road_data;
                }
            }

            if (!empty($_POST['mail'])) {
                $newMail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
                $oldMail = self::$data_view["userinfo"]->mail;
                if ($oldMail != $newMail) {
                    if (!preg_match($regexMail, $newMail)) {
                        $errors['mail'] = 'Votre mail contient des caractères non autorisés !';
                    } else {
                        self::$data_view["userinfo"]->updateMail($_SESSION['id'], $newMail);
                        self::$data_view["userinfo"]->mail = $newMail;
                    }
                }
            } else {
                $errors['mail'] = 'L\'email est obligatoire !';
            }

                $newName = trim(filter_input(INPUT_POST, 'Lolname', FILTER_SANITIZE_STRING));
                $oldName = self::$data_view["usergames"][0]->username_game;
                $userGames = new Game();

            if ($oldName != $newName) {
                $userGames->updateNameGame($newName, $_SESSION['id'], 1);
                self::$data_view["usergames"][0]->username_game = $newName;
                }

                $newName = trim(filter_input(INPUT_POST, 'Tftname', FILTER_SANITIZE_STRING));
                $oldName = self::$data_view["usergames"][1]->username_game;
                if ($oldName != $newName) {
                    $userGames->updateNameGame($newName, $_SESSION['id'], 2);
                    self::$data_view["usergames"][1]->username_game = $newName;
                }

                $newName = trim(filter_input(INPUT_POST, 'Lorname', FILTER_SANITIZE_STRING));
                $oldName = self::$data_view["usergames"][2]->username_game;
                if ($oldName != $newName) {
                    $userGames->updateNameGame($newName, $_SESSION['id'], 3);
                    self::$data_view["usergames"][2]->username_game = $newName;
                }

            if (count($errors) == 0) {
                $validateModif = true;
                self::$data_view["validateModif"] = $validateModif;
            }
            else {
                self::$data_view["errors"] = $errors;
            }
    }

    private function buildView($array) {
        $view = new View("userinfo");
        $view->generer($array);
    }
}
