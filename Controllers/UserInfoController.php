<?php

class UserInfo_Class
{

private $userinfo;

    public function __construct()
    {
        $this->userinfo = new User();
        $this->userinfo->selectById($_SESSION['id']);
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $this->verification();
        }
        else {
            $user = new User();
            $userinfo = $user->selectById($_SESSION['id']);
            $vue = new View("userinfo");
            $vue->generer(array('userinfo' => $userinfo));
        }
    }

    private function verification()
    {
        $isSubmitted = false;
        $modifymail = false;
        $modifyavatar = false;
        $errors = [];
        $regexMail = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $isSubmitted = true;
            if (!empty($_FILES['avatar']['name'])) {
                $tailleMax = 2097152;
                $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
                $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
                if ($_FILES['avatar']['size'] > $tailleMax || $_FILES['avatar']['size'] == 0) {
                    $errors['avatar'] = $_FILES['avatar']['size'];
                } else if (!in_array($extensionUpload, $extensionsValides)) {
                    $errors['avatar'] = 'Votre avatar doit être au format jpg, jpeg, gif ou png';
                }
                else {
                    $modifyavatar = true;
                }
            }

            if (!empty($_POST['mail'])) {
                $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
                $changeMail = $this->userinfo->mail;
                if ($changeMail != $mail) {
                    if (!preg_match($regexMail, $mail)) {
                        $errors['mail'] = 'Votre mail contient des caractères non autorisés !';
                    } else {
                        $modifymail = true;
                    }
                }
            }
            else {
                $errors['mail'] = 'L\'email est obligatoire !';
            }
        }

        if ($isSubmitted && count($errors) == 0) {
            if ($modifyavatar) {
                $chemin = "assets/img/users_avatars/" . $_SESSION['id'] . "." . $extensionUpload;
                $resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
                $this->userinfo->updateAvatar($_SESSION['id'], $chemin);
                $this->userinfo->avatar = $chemin;
                $_SESSION['avatar'] = $chemin;
            }
            if ($modifymail) {
                $this->userinfo->updateMail($_SESSION['id'], $mail);
                $this->userinfo->mail = $mail;
            }
            $validateModif = true;
            $vue = new View("userinfo");
            $vue->generer(array('userinfo' => $this->userinfo, 'validateModif' => $validateModif));
        } else {
            $vue = new View("userinfo");
            $vue->generer(array('userinfo' => $this->userinfo, 'errors' => $errors));
        }
    }
}
