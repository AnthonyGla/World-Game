<?php
class Index_Class {
    public function __construct() {
        $news = new News();
        $donnees = $news->getAll();
        $news_star = $news->getStar();
        $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'dd MMMM yyyy');
        foreach($donnees as $key=>$value){
            $value->date = strtotime($value->date);
        }
        $vue = new View("index", 'E-Sport Gaming');
        $vue->generer(array('donnees' => $donnees, 'news_star' => $news_star, 'dateformat' => $dateformat));
    }
}