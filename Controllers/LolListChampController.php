<?php
class lolListChamp_Class
{
    private static $data_view;

    public function __construct()
    {
        $liste_champions = file_get_contents("http://ddragon.leagueoflegends.com/cdn/9.23.1/data/fr_FR/champion.json");
        self::$data_view["liste"] = json_decode($liste_champions, true);
        $this->buildView();
    }

    private function buildView()
    {
        $view = new View("lolListChamp");
        $view->generer(self::$data_view);
    }
}