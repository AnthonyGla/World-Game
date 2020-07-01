<?php
class Index_Class {
    private static $data_view;

    public function __construct() {
        $news = new News();
        $donnees = $news->getAll();
        $news_star = $news->getStar();
        $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'dd MMMM yyyy');
        foreach($donnees as $key=>$value){
            $value->date = strtotime($value->date);
        }
        self::$data_view["donnees"] = $donnees;
        self::$data_view["news_star"] = $news_star;
        self::$data_view["dateformat"] = $dateformat;
        $this->buildView();
    }

    private function buildView() {
        $view = new View("index");
        $view->generer(self::$data_view);
    }
}