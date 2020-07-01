<?php
class PrivateMsg_Class
{
    private static $data_view;

    public function __construct()
    {

        $messages = new Messages();
        $messages->id_users = $_SESSION['id'];
        self::$data_view['messages'] = $messages;


        if (!empty($_GET['id_mp'])) {
            $this->getMessage();
        }
        else {
            $this->buildListMessages();
        }
        $this->buildView();
    }

    private function getMessage()
    {
        self::$data_view['messages']->id = filter_input(INPUT_GET, 'id_mp', FILTER_SANITIZE_NUMBER_INT);
        if ((!self::$data_view['messages']->getOneById())) {
            header('Location: /page-introuvable.html');
        }
        else {
            $messageById = self::$data_view['messages']->getOneById();
            $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'd MMMM yyyy à HH:mm');
            $messageById->date = $dateformat->format(strtotime($messageById->date));
            self::$data_view['messageById'] = $messageById;
            if ($messageById->open == 0) {
                $this->updateOpen();
            }
        }
    }

    private function updateOpen()
    {
        self::$data_view['messages']->updateMessageOpen();
    }

    private function buildListMessages()
    {
        $listMsg = self::$data_view['messages']->getMessages();
        $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'd MMMM yyyy à HH:mm');
        foreach($listMsg as $key=>$value){
            $value->date = $dateformat->format(strtotime($value->date));
            $value->subject = strlen($value->subject) > 40 ? substr($value->subject,0,40)."..." : $value->subject;
        }
        self::$data_view['list_msg'] = $listMsg;
    }

    private function buildView()
    {
        $view = new View("privateMsg");
        $view->generer(self::$data_view);
    }
}