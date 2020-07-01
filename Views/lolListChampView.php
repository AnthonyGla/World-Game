<?php
$this->titre = "Guide des Champions - League Of Legends";
?>
<div class="row justify-content-center">
    <div class="block_page col-12 col-sm-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="fas fa-book"></i>Guide des Champions</h1>
        <div id="bloc_search"><input type="text" id="search_champ" placeholder="Recherche"><a href="#"><i class="fas fa-search"></a></i></div>
        <div id="champ_select_block">
            <?php
            foreach ($liste['data'] as $value) {
                ?>
                <a id="<?php echo $value['id']; ?>" class="champ_select_a" href="/league-of-legends/champions/<?php echo $value['id']; ?>.html"><div class="blok_champ_guide"><div class="champ_guide">
                            <img src="http://ddragon.leagueoflegends.com/cdn/img/champion/loading/<?php echo $value['id']; ?>_0.jpg">
                        </div>
                        <div class="champ_guide_title">
                            <p><?php echo $value['id'];?></p>
                        </div>
                    </div>
                </a>
                <?php
            }
            ?>
        </div>
    </div>
</div>
