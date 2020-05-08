<?php

class Inscription_Class
{
    private static $data_view;

    public function __construct()
    {
        self::$data_view = array();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->verification();
        }
        else if (isset($_GET['username'])){
            $this->checkUsernameAjax();
            exit();
        }

        $this->buildView(self::$data_view);
    }

    private function checkUsernameAjax() {
        if (!empty($_GET['username'])) {
            $user = new User();
            $answer = $user->check_user($_GET['username']);
            if (!$answer) {
                echo 'Success';
            } else {
                echo 'Failed';
            }
        } else {
            echo 'Empty';
        }
    }

    private function verification() {
        $isSubmitted = false;
        $username = $mail = $pass = $confirmpass = '';
        $errors = [];
        $user_test = new User();
        $regexMail = "/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/";
        $regexPass = "/^(?=.{6,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$/";
        if (empty($_SESSION['id'])) {
            $isSubmitted = true;

            $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
            $check_user = $user_test->check_user($username);
            if (empty($username)) {
                $errors['username'] = 'Veuillez renseigner le pseudo';
                $usernameCheck = colorCheck('Failed');
            }
            else if ($check_user == true) {
                $errors['username'] = 'Ce pseudo n\'est pas disponible !';
                $usernameCheck = colorCheck('Failed');
            }
            else {
                $usernameCheck = colorCheck('Success');
            }

            $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_STRING));
            $mailExist = $user_test->check_mail($mail);
            if (empty($mail)) {
                $errors['mail'] = 'Veuillez renseigner le mail';
            } elseif (!preg_match($regexMail, $mail)) {
                $errors['mail'] = 'Votre mail contient des caractères non autorisés !';
            }
            else if ($mailExist > 0) {
                $errors['mail'] = 'Ce mail est déjà utilisé !';
            }

            $pass = trim($_POST['pass']);
            if (empty($pass)) {
                $errors['pass'] = 'Veuillez renseigner le mot de passe';
            }
            elseif (!preg_match($regexPass, $pass)) {
                $errors['pass'] = 'Le mot de passe doit contenir : Une majuscule, un chiffre et 6 caractères au minimum';
            }
            $confirmpass = trim(htmlspecialchars($_POST['confirmpass']));
            if (empty($confirmpass)) {
                $errors['confirmpass'] = 'Veuillez confirmer le mot de passe';
            }
            elseif ($pass != $confirmpass) {
                $errors['confirmpass'] = 'Les mots de passe ne correspondent pas !';
            }
        }

    if ($isSubmitted && count($errors) == 0) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $key = md5(microtime(TRUE)*100000);
        $user = new User($username, $mail, $pass, $key);
        $user->create();
        $validation = true;

        $to	= $mail;
        $subject = "Activer votre compte sur World Game" ;
        $headers = 'From: inscription@worldgame.com' . "\r\n";
        $headers .= "X-Mailer: PHP ".phpversion()."\n";
        $headers .= "X-Priority: 3 \n";
        $headers .= "Mime-Version: 1.0\n";
        $headers .= "Content-Transfer-Encoding: 8bit\n";
        $headers .= "Content-type: text/html; charset= utf-8\n";
        $headers .= "Date:" . date("D, d M Y h:s:i") . " +0200\n";
        $message = 'Bienvenue sur World Game. Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
        ou copier/coller le dans votre navigateur Internet.
        http://votresite.com/activation.php?log='.urlencode($username).'&cle='.urlencode($key).'
         
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';
        mail($to, $subject, $message, $headers);
        header('refresh:5;url=accueil.html');

        self::$data_view["validation"] = $validation ;
    }
    else {
        self::$data_view["errors"] = $errors;
        self::$data_view["username"] = $username;
        self::$data_view["mail"] = $mail;
        self::$data_view["pass"] = $pass;
        self::$data_view["confirmpass"] = $confirmpass;
    }
        self::$data_view["isSubmitted"] = $isSubmitted;
    }

    private function buildView($array) {
        $view = new View("inscription");
        $view->generer($array);
    }

}
