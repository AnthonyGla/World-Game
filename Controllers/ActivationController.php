<?php
class Activation_Class
{
    private static $data_view;

    public function __construct()
    {
        if (!empty($_GET['log']) && !empty($_GET['key'])) {
            $username = $_GET['log'];
            $key = $_GET['key'];

            $user = new User($username);
            $user->getKey();
            self::$data_view["user"] = $user;

            if ($user->key != $key) {
                $img = '/public/assets/img/key_notvalid.jpg';
                $text = 'Cette clé d\'activation n\'est pas valide';
            }
            else if ($user->active == 1) {
                $img = '/public/assets/img/key_valid.jpg';
                $text = 'Votre compte a déjà eté validé. Vous pouvez vous connecter dès maintenant.';
            }
            else {
                $this->activeUser();
                $img ='/public/assets/img/key_nowvalid.jpg';
                $text ='Votre compte est maintenant validé. Vous pouvez à présent vous connecter.';
            }
        }
        else {
            $img ='/public/assets/img/key_notparam.jpg';
            $text = 'Ce lien n\'est pas valide';
        }
        self::$data_view['result']['img'] = $img;
        self::$data_view['result']['text'] = $text;
        header('refresh:5;url=/public/index.php');
        $this->buildView();
    }

    private function activeUser() {
        self::$data_view["user"]->active = 1;
        self::$data_view["user"]->updateStatut();
    }

    private function buildView() {
        $view = new View("activation");
        $view->generer(self::$data_view);
    }
}