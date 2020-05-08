<?php
class Admin_memberList_Class 
{
    private static $data_view;

    public function __construct()
    {
        self::$data_view = array();

        if (isset($_POST['value'])) {
            $this->get();
            exit();
        }

        $this->memberList();
        $this->buildView(self::$data_view);
    }

    private function get() {
        $value = $_POST['value'];
        $stats = new Statistics();
        $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'd MMMM yyyy');

        switch ($value) {
            case 'mostNews':
                $contain = $stats->mostActivePoster();
                break;
            case 'mostTutorial':
                $contain = $stats->mostActiveTutorial();
                break;
            case 'TopComments':
                $contain = $stats->mostActiveComments();
                break;
            case 'TopPosts':
                $contain = $stats->mostActiveForum();
                break;
        }
        foreach($contain as $key=>$value){
            $value->date = $dateformat->format(strtotime($value->date));
        }
        echo json_encode($contain);
    }

    private function memberList() {
        $list_member = new User();
        $list_member = $list_member->getAll();

        $page = 1;
        if (!empty($_GET['page']) && filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT)) {
            $page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_NUMBER_INT);
        }

        $total_member = (count($list_member));
        $member_by_page = 15;
        $number_of_pages = ceil($total_member / $member_by_page);
        $begin = $member_by_page * ($page - 1);
        $list = new User();
        $list_member = $list->memberByPage($member_by_page, $begin);
        $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'd MMMM yyyy');
        foreach($list_member as $key=>$value){
            $value->date = $dateformat->format(strtotime($value->date));
        }
        self::$data_view["list_member"] = $list_member;
        self::$data_view["page"] = $page;
        self::$data_view["number_of_pages"] = $number_of_pages;
        self::$data_view["total_member"] = $total_member;

    }

    private function buildView($array) {
        $view = new View("admin_memberList");
        $view->genererAdmin($array);
    }

}