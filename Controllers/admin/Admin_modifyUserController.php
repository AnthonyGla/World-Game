<?php
class Admin_modifyUser_Class
{
    private static $data_view;
    private static $user_info;
    private static $usernames_games;

    public function __construct()
    {
        self::$data_view = array();
        if (isset($_POST['username']) || isset($_GET['user'])) {
            $this->getUserInfo();
            if (isset($_POST['mail'])) {
                $this->updateUser(self::$data_view['userinfo']->id);
                $this->getUserInfo();
            }
        }
        else if (isset($_GET['term'])) {
            $this->ajaxListMember();
        }
        else if (isset($_GET['active'])) {
            $this->updateStatut();
        }
        else if (isset($_GET['default_avatar'])) {
            $this->deleteAvatarAjax();
        }

        $this->buildView(self::$data_view);
    }

    private function updateStatut() {
        $active = trim(filter_input(INPUT_GET, 'active', FILTER_SANITIZE_NUMBER_INT));
        $username = trim(filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING));
        $updateStatut = new User();
            $updateStatut->active = $active;
            $updateStatut->username = $username;
            $updateStatut->updateStatut();
            echo 'Success';
            exit();
    }

    private function getUserInfo() {
        if (isset($_POST['username'])) {
          $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        }
         else {
          $username = trim(filter_input(INPUT_GET, 'user', FILTER_SANITIZE_STRING));
        }
        $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'dd MMMM yyyy à hh:mm');
        $userinfo = new User();
        $user_exist = $userinfo->check_user($username);
        if ($user_exist) {
            self::$user_info = $userinfo->selectByUsername($username);
            $userGames = new Game();
            self::$usernames_games  = $userGames->getUsernamesGames($username);
            self::$user_info->date = $dateformat->format(strtotime(self::$user_info->date));
            self::$data_view["userinfo"] = self::$user_info ;
            self::$data_view["usernames_games"] = self::$usernames_games ;
        }
        self::$data_view["user_exist"] = $user_exist;
    }

    private function ajaxListMember()  {
        $data = [];
        $search = new User();
        $search = $search->selectSearch($_GET['term']);
        foreach ($search as $value) {
            array_push($data, $value->username);
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit();
    }

    private function updateUser($id) {
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
        $updateUser = new User();
        $updateGame = new Game();
        $updateUser->updateMail($id, $mail);

        $nameLoL = trim(filter_input(INPUT_POST, 'nameLoL', FILTER_SANITIZE_STRING));
        $nameTfT = trim(filter_input(INPUT_POST, 'nameTfT', FILTER_SANITIZE_STRING));
        $nameLoR = trim(filter_input(INPUT_POST, 'nameLoR', FILTER_SANITIZE_STRING));
        $updateGame->updateNameGame($nameLoL, $id, 1);
        $updateGame->updateNameGame($nameTfT, $id, 2);
        $updateGame->updateNameGame($nameLoR, $id, 3);
    }


    private function deleteAvatarAjax() {
        $user = new User();
        $id = trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
        $avatar = trim(filter_input(INPUT_GET, 'default_avatar', FILTER_SANITIZE_STRING));
        $user->updateAvatar($id, $avatar);
        echo 'Success';
        exit();
    }

    private function buildView($array) {
        $view = new View("admin_modifyUser");
        $view->genererAdmin($array);
    }

}