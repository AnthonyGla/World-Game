<div class="row justify-content-center">
  <div class="col-11 col-xl-9 col-lg-10 background_comment">
      <h2 id="repere">Votre avis</h2>
      <noscript>
          <p>Javascript est désactivé. Si vous avez la possibilité de l'activer, faites-le, vous y gagnerez en confort d'utilisation du site.</p>
      </noscript>
      <?php

        if ($countComment->NbComment == 0 && !empty($_SESSION['id'])) {echo'<img src="https://vignette.wikia.nocookie.net/leagueoflegends/images/5/59/Draven_Approves%21_Emote.png/revision/latest?cb=20180308201509"><p class="p_comment">Sois le premier à donner ton avis</p>';}
        else {
          $i=0;
          foreach ($allComment as $comment) {
            $i++;
            if ( $i % 2 == 0 ) { ?>
              <div class="col-lg-10 col-12 big_bloc_comment">
                <div class="d-flex flex-column w-100 comment_news pair">
                  <div class="comment_details pair_txt">
                      <?php if (!empty($_SESSION) AND $_SESSION['rank'] >= 2) { ?>
                      <div class="dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-caret-down"></i>
                          </a> <!-- lien -->
                        <div class="dropdown-menu">
                              <a class="dropdown-item" href="#"><i class="fas fa-wrench"></i> Editer ce message</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i> Supprimer ce message</a>
                          </div>
                      </div>
                      <?php } ?>
                      <p>Posté par <?php echo $comment->username.', le '.$comment->date; ?></p>
                  </div>
                  <div class="comment_text">
                    <p><?php echo $comment->text; ?></p>
                  </div>
                </div>
                <div id="form_square-right"></div>
                <div class="profil_comment_img"><img alt="profil_img" src="<?php echo $comment->avatar; ?>"></div>
              </div>

            <?php } else { ?>
              <div class="col-lg-10 col-12 big_bloc_comment">
                <div class="profil_comment_img"><img alt="profil_img" src="<?php echo $comment->avatar; ?>"></div>
                <div id="form_square"></div>
                <div class="w-100 comment_news">
                  <div class="comment_details">
                      <?php if (!empty($_SESSION) AND $_SESSION['rank'] >= 2) { ?>
                      <div class="dropdown">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-caret-down"></i>
                          </a> <!-- lien -->
                          <div class="dropdown-menu">
                              <a class="dropdown-item" href="#"><i class="fas fa-wrench"></i> Editer ce message</a>
                              <a class="dropdown-item" href="#"><i class="fas fa-trash-alt"></i> Supprimer ce message</a>
                          </div>
                      </div>
                      <?php } ?>
                      <p>Posté par <span><?php echo $comment->username.'</span>, le '.$comment->date; ?></p>


                  </div>
                  <div class="comment_text">
                    <p><?php echo $comment->text;  ?>
                    </p>
                  </div>
                </div>
              </div>
            <?php }} }

        if (!empty($_SESSION['id'])) {
        ?><form action="/article/<?= $news->id; ?>.html" method="post" name="comment" class="form_comment col-12 col-lg-11 col-xl-9">
              <input type="hidden" name="news_id" value="<?= $news->id; ?>">
                <textarea name="comm_news" id="trumbowyg_comment"></textarea>
              <input type="submit" value="Commenter">
            </form>
      <?php }
        else { ?>
<img alt="emote" src="https://vignette.wikia.nocookie.net/leagueoflegends/images/8/82/Go_Team%21_Emote.png/revision/latest?cb=20180601212712">
            <p class="p_comment">Vous devez être connecté pour pouvoir poster un commentaire.</p>
       <?php } ?>
          </div>
    </div>