<?php
class Activation_Class
{
    public function __construct()
    {
        $result = array();

        if (!empty($_GET['log']) && !empty($_GET['key'])) {
            $username = $_GET['log'];
            $key = $_GET['key'];

            $user = new User($username);
            $user->getKey();

            if ($user->key != $key) {
                $result['img']='assets/img/key_notvalid.jpg';
                $result['text']='Cette clé d\'activation n\'est pas valide';
            }
            else if ($user->active == 1) {
                $result['img']='assets/img/key_valid.jpg';
                $result['text']='Votre compte a déjà eté validé. Vous pouvez vous connecter dès maintenant.';
            }
            else {
                $user->active = 1;
                $user->updateStatut();
                $result['img']='assets/img/key_nowvalid.jpg';
                $result['text']='Votre compte est maintenant validé. Vous pouvez à présent vous connecter.';
            }
        }
        else {
            $result['img']='assets/img/key_notparam.jpg';
            $result['text'] = 'Ce lien n\'est pas valide';
        }
        header('refresh:5;url=index.php');
        $vue = new View("activation");
        $vue->generer(array('result' => $result));
    }
}