<?php
class Admin_permissions_Class
{
    private static $data_view;

    public function __construct()
    {
        if (isset($_GET['id_username'])){
            $this->delete_permissions();
            exit();
        }

        if (isset($_GET['username'])){
            $this->add_permissions();
            exit();
        }

        $this->getRankByGroup(2);
        $this->getRankByGroup(3);
        $this->getRankByGroup(4);
        $this->buildView();
    }
    private function getRankByGroup($rank)
    {
        $permission = new Permissions();
        $permission->rank = $rank;
        self::$data_view['rank_'.$rank] = $permission->getRankGroup();
    }

    private function delete_permissions()
    {
        $permission = new Permissions();
        $permission->username = trim(filter_input(INPUT_GET, 'id_username', FILTER_SANITIZE_STRING));;
        if ($permission->deletePermissionById()) {
            echo 'Success';
        }
    }

    private function add_permissions()
    {


        $permission = new Permissions();
        $permission->username = trim(filter_input(INPUT_GET, 'username', FILTER_SANITIZE_STRING));
        $permission->rank = trim(filter_input(INPUT_GET, 'rank', FILTER_SANITIZE_NUMBER_INT));
        if ($permission->addPermissionByUsername()) {
            echo 'Success';
        }
    }

    private function buildView()
    {
        $view = new View("admin_permissions");
        $view->genererAdmin(self::$data_view);
    }
}