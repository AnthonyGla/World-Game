<?php
class LolChampSelect_Class
{
    private static $data_view;

    public function __construct() {
        $this->buildView();
    }

    private function buildView() {
        $view = new View("lolChampSelect");
        $view->generer(self::$data_view);
    }
}