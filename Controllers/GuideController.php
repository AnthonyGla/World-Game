<?php
class Guide_Class
{
    private static $data_view;

    public function __construct()
    {
        $category = trim(filter_input(INPUT_GET, 'category', FILTER_SANITIZE_STRING));
        if ($category == 'lol') {
            $search = 'League Of Legends';
        }
        else if ($category == 'tft') {
            $search = 'Teamfight Tactics';
        }
        $tutorial = new Tutorial();
        $idCategory = $tutorial->getIdOfCategory('%'.$search.'%');
        $donnees = $tutorial->getAll($idCategory->id);

        self::$data_view["donnees"] = $donnees;
        self::$data_view["search"] = $search;
        $this->buildView();
    }

    private function buildView() {
        $view = new View("guide");
        $view->generer(self::$data_view);
    }
}