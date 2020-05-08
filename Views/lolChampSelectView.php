<?php
$id = $_GET['champ'];
$this->titre = $id.' - League Of Legends';

$qmissiledamage = 5;
$liste_champions = file_get_contents('http://ddragon.leagueoflegends.com/cdn/9.23.1/data/fr_FR/champion/'.$id.'.json');
$liste = json_decode($liste_champions, true);
$page_title = $id.' - '.$liste['data'][$id]['title'];
$number_skins = count($liste['data'][$id]['skins']);
$numeroref = sprintf('%04d', $liste['data'][$id]['key']);
function color_lane($tags) {
  if ($tags == 'Tank') {return '#aa6542';}
  else if ($tags == 'Support') {return '#4274aa';}
  else if ($tags == 'Fighter') {return '#ba3b3b';}
  else if ($tags == 'Mage') {return '#91a9b7';}
  else if ($tags == 'Assassin') {return '#c89d9d;';}
  else if ($tags == 'Marksman') {return '#b4c850;';}
}
?>
<div class="row justify-content-center">
  <div class="block_News_Open col-11 col-xl-9 col-lg-10 mt-4">
    <h1><i class="fas fa-book"></i><?php echo $id.' - '.$liste['data'][$id]['title'];?></h1>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block w-100" src="http://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?php echo $id; ?>_0.jpg" data-src="holder.js/900x400?theme=social" alt="First slide">
        </div>
        <?php for ($i = 1; $i < $number_skins; $i++) {  ?>
          <div class="carousel-item">
            <img class="d-block w-100" src="http://ddragon.leagueoflegends.com/cdn/img/champion/splash/<?php echo $id.'_'.$liste['data'][$id]['skins'][$i]['num'] ?>.jpg" data-src="holder.js/900x400?theme=industrial" alt="slide<?php echo $i; ?>">
            <div id="skin_name"><?php echo $liste['data'][$id]['skins'][$i]['name'];?></div>
          </div>
        <?php } ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
      <?php foreach ($liste['data'][$id]['tags'] as $tags) { ?>
      <div style="background-color: <?php echo color_lane($tags); ?>" class="tags_champ"><?php echo $tags; ?></div>
    <?php } ?>
    <p><?php echo $liste['data'][$id]['lore'];?></p>
    <div id="container_tips_champ">
      <div class="tips_champs">
        <ul>
        <?php foreach ($liste['data'][$id]['allytips'] as $allytips) { ?>
          <li><?php echo $allytips ?></li>
        <?php } ?>
      </ul>
      </div>
      <div class="tips_champs">
        <ul>
        <?php foreach ($liste['data'][$id]['enemytips'] as $enemytips) { ?>
          <li><?php echo $enemytips ?></li>
        <?php } ?>
      </ul>
      </div>
    </div>
    <div class="champ_select_spells passive">
      <div id="logo_spell">
        <img src="http://ddragon.leagueoflegends.com/cdn/9.23.1/img/passive/<?php echo $liste['data'][$id]['passive']['image']['full'] ?>">
      </div>
      <div>
        <h2>
          Passif - <?php echo $liste['data'][$id]['passive']['name']; ?>
          <a href="#passif"><i class="fas fa-play-circle"></i></a
        </h2>
          <p><?php echo $liste['data'][$id]['passive']['description']; ?></p>
          <a href="#_"><div class="video_container" id="passif"><video class="video_open" type="video/mp4" controls="controls" src="https://cdn.leagueoflegends.com/champion-abilities/videos/mp4/<?php echo $numeroref; ?>_01.mp4"></video></div></a>
      </div>
    </div>
    <?php $number=2; ?>
    <?php foreach ($liste['data'][$id]['spells'] as $key => $value) {
       ?>
        <div class="champ_select_spells">
          <div id="logo_spell"><img src="http://ddragon.leagueoflegends.com/cdn/9.23.1/img/spell/<?php echo $value['image']['full'];?>"></div>
          <div>
            <h2>
              <?php echo $value['name']; ?>
              <a href="#<?php echo $number; ?>"><i class="fas fa-play-circle"></i></a>
            </h2>
              <p><?php echo $spell = $value['description']; ?></p>
              <a href="#_"><div class="video_container" id="<?php echo $number; ?>"><video class="video_open" type="video/mp4" controls="controls" src="https://cdn.leagueoflegends.com/champion-abilities/videos/mp4/<?php echo $numeroref.'_0'.$number; ?>.mp4"></video>
            </div></a>
          </div>
        </div>
    <?php $number++;} ?>
  </div>
</div>