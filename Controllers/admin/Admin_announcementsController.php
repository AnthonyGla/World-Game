<?php
class Admin_announcements_Class
{
    private static $data_view;

    public function __construct()
    {
        $announcements = new Announcements();
        $list_announcements = $announcements->getAll();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->addAnnouncement();
        }
        else if (isset($_GET['id_announcement'])) {
            $this->deleteAnnouncement($list_announcements);
        }

        $list_announcements = $announcements->getAll();
        $list_Category = new News();
        $list_Category = $list_Category->getListCategory();

        self::$data_view["list_announcements"] = $list_announcements;
        self::$data_view["list_Category"] = $list_Category;

        $this->buildView();
    }

    private function addAnnouncement() {
        $text = trim(filter_input(INPUT_POST, 'announcement', FILTER_SANITIZE_STRING));
        $category = trim(filter_input(INPUT_POST, 'choose_category', FILTER_SANITIZE_STRING));
        $announcement = $category.' - '.$text;
        if (empty($text)) {
            $error_add = 'L\'annonce ne doit pas être vide !';
            self::$data_view["error_add"] = $error_add;
        }
        else {
            $addAnnouncement = new Announcements($announcement);
            $addAnnouncement->create();
        }
    }

    private function deleteAnnouncement($list_announcements) {
        $available_delete = array();
        foreach($list_announcements as $id_available) {
            $available_delete[] = $id_available->id;
        }
        $id = trim(filter_input(INPUT_GET, 'id_announcement', FILTER_SANITIZE_NUMBER_INT));
        if(!in_array($id, $available_delete)) {
            echo 'Error';
        }
        else {
            $addAnnouncement = new Announcements();
            $addAnnouncement->delete($id);
            echo 'Success';
        }
        exit();
    }

    private function buildView() {
        $view = new View("admin_announcements");
        $view->genererAdmin(self::$data_view);
    }

}