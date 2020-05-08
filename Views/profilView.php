<?php
$this->titre = "Mon profil";
?>
<div class="row justify-content-center">
      <div class="block_profil col-11 col-xl-9 col-lg-10 mt-4">
        <h1 class="text-center"><i class="fas fa-certificate"></i>Profil</h1>
<div class="row">
          <div class="list_champ_mastery col-3">
              <h2 class="title_profil">Champions les plus joués</h2>
              <?php
              for ($i = 0; $i <= 9; $i++) { ?>
          <div class="champ_mastery d-flex">
              <?php
              foreach ($liste_champ->{'data'} as $use => $val) {
                  if ($val->{'key'} == $liste[$i]->{'championId'}) { ?>
                      <a href="index.php?action=lolChampSelect&champ=<?= $val->id ?>"><div class="champ_mastery_img"><img src="http://ddragon.leagueoflegends.com/cdn/10.4.1/img/champion/<?= $val->id ?>.png"></div></a><p>
          <?php
                  }
              }
              echo number_format($liste[$i]->championPoints, 0, ',', ' ').' points</p></div>';
          }
          ?>
          </div>
              <div class="col-9">
              <?php
            for ($a = 0; $a <= 9; $a++) {

                foreach ($liste_champ->{'data'} as $use => $val) {
                    if ($val->{'key'} == $histo->{'matches'}[$a]->champion) { ?>
                        <div class="historical_game"><img src="http://ddragon.leagueoflegends.com/cdn/10.4.1/img/champion/<?= $val->id ?>.png">
                        <?php
                    }
                }

                $gameById = file_get_contents('https://euw1.api.riotgames.com/lol/match/v4/matches/'.$histo->{'matches'}[$a]->gameId.'?api_key=RGAPI-f373f45f-9888-4f34-8b7e-2e53a5c69b44');
                $gameById = json_decode($gameById, false);


                        foreach ($gameById->{'participantIdentities'} as $key => $value) {
                            if ($value->player->summonerName == 'Kannki') {
                                echo $participantId = $value->participantId;
                            }
                        }

                echo $gameById->gameMode;
                var_dump($histo->{'matches'}[$a]->gameId);
                echo $date_game = $histo->{'matches'}[$a]->timestamp;
                echo $dateformat->format(floor($date_game/1000)).'<br/></div>';
            }
             ?>
              </div>
          </div>
    </div>
</div>