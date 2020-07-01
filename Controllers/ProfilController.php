<?php
class Profil_Class
{
    public function __construct()
    {
        $key_api = 'RGAPI-f373f45f-9888-4f34-8b7e-2e53a5c69b44';
        $myfile = file_get_contents('https://euw1.api.riotgames.com/lol/champion-mastery/v4/champion-masteries/by-summoner/K1XP0143l4PQrhz5WH8ZN5XlnNx9Vz8YZBzW6BbpKxmGwk55?api_key='.$key_api);
        $liste = json_decode($myfile, false);

        $liste_champions = file_get_contents("http://ddragon.leagueoflegends.com/cdn/9.23.1/data/fr_FR/champion.json");
        $liste_champ = json_decode($liste_champions, false);

        $histo = file_get_contents('https://euw1.api.riotgames.com/lol/match/v4/matchlists/by-account/6HJ-f3s4cltiLKyL9tSWc2Fr2mk2yx7Xy8xHwGdMeTxZU-4?api_key='.$key_api);
        $histo = json_decode($histo, false);

        $dateformat = new IntlDateFormatter('fr_FR', NULL, NULL, NULL, NULL, 'dd MMMM yyyy à HH:mm');


        $vue = new View("profil");
        $vue->generer(array('liste' => $liste, 'histo' => $histo, 'liste_champ' => $liste_champ, 'dateformat'=> $dateformat));
    }
}
