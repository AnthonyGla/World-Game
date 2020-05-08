<div id="navbar" class="row">
    <div id="logo" class="d-flex col-2">
        <a href="../../index.php">
            <img src="/public/assets/img/logo.png">
        </a>
    </div>
    <div class="col-8 col-">
        <nav class="navbar navbar-expand-lg navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php if ($page == null) {echo 'active';} ?>">
                        <a class="nav-link" href="/accueil.html"><i class="fas fa-home"></i>Home</a>
                    </li>
                    <li class="nav-item dropdown <?php if ($page == 'lol') {echo 'active';} ?>">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" href="#"><i class="fas fa-chess-queen"></i>League Of Legends</a>
                        <!-- bloc menu déroulant -->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="navbar_Submenu">
                                <a href="/league-of-legends/guide.html">
                                    <div id="lol_Guide" class="navbar_Submenu_Bloc d-flex">
                                        <div class="navbar_Submenu_Bloc_Logo"><i class="fas fa-book"></i></div>
                                        <div class="navbar_Submenu_Bloc_Txt">
                                            <div class="text-left"><p><span class="h4 text-dark">Guide</span><br/>Apprends, débute et deviens le meilleur des invocateurs</p></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="navbar_Submenu">
                                <a href="/league-of-legends/champions.html">
                                    <div id="lol_Guide" class="navbar_Submenu_Bloc d-flex">
                                        <div class="navbar_Submenu_Bloc_Logo"><i class="fas fa-user-astronaut"></i></div>
                                        <div class="navbar_Submenu_Bloc_Txt">
                                            <div class="text-left"><p><span class="h4 text-dark">Champions</span><br/>Maîtrise-en un, ou maîtrise-les tous. Tout ce qu'il faut retenir.</p></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="navbar_Submenu">
                                <a href="/league-of-legends/patch.html">
                                    <div id="lol_Guide" class="navbar_Submenu_Bloc d-flex">
                                        <div class="navbar_Submenu_Bloc_Logo"><i class="fas fa-band-aid"></i></div>
                                        <div class="navbar_Submenu_Bloc_Txt">
                                            <div class="text-left"><p><span class="h4 text-dark">Patch Note</span><br/>Tous les changements sur le patch de jeu actuel</p></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown <?php if ($page == 'tft') {echo 'active';} ?>">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink">
                            <i class="fas fa-asterisk"></i>TeamFight Tactics
                        </a>
                        <!-- bloc menu déroulant -->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="navbar_Submenu">
                                <a href="/teamfight-tactics/tutoriel.html">
                                    <div id="lol_Guide" class="navbar_Submenu_Bloc d-flex">
                                        <div class="navbar_Submenu_Bloc_Logo"><i class="far fa-clipboard"></i></div>
                                        <div class="navbar_Submenu_Bloc_Txt">
                                            <div class="text-left"><p><span class="h4 text-dark">Mode d'emploi</span><br/>Ce que tu dois connaitre pour être le meilleur des stratéges</p></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="navbar_Submenu">
                                <a href="/teamfight-tactics/patch.html">
                                    <div id="lol_Guide" class="navbar_Submenu_Bloc d-flex">
                                        <div class="navbar_Submenu_Bloc_Logo"><i class="fas fa-band-aid"></i></div>
                                        <div class="navbar_Submenu_Bloc_Txt">
                                            <div class="text-left"><p><span class="h4 text-dark">Patch Note</span><br/>Tous les changements sur le patch de jeu actuel</p></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink">
                            <i class="fas fa-feather-alt"></i>Legend Of Runeterra
                        </a>
                        <!-- bloc menu déroulant -->
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <div class="navbar_Submenu">
                                <a href="../../index.php?action=LoLtuto">
                                    <div id="lol_Guide" class="navbar_Submenu_Bloc d-flex">
                                        <div class="navbar_Submenu_Bloc_Logo"><i class="fas fa-feather-alt"></i></div>
                                        <div class="navbar_Submenu_Bloc_Txt">
                                            <div class="text-left"><span class="h4 text-dark">Développement</span><br/> Le jeu est en cours de développement. Retrouvez les dernières informations</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"><i class="fas fa-user-alt"></i>Communauté</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/forum.html"><i class="far fa-comment-alt"></i>Forum</a>
                    </li>
                </ul>
        </nav>
    </div>
    <div class="col-2 d-flex profil">
        <div class="d-flex">
        <?php if (isset($_SESSION['id'])) { ?>
            <img src="<?= $_SESSION['avatar']; ?>" alt="logo candidat"/>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <span><i class="fas fa-angle-down"></i></span>
                </a> <!-- lien -->
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/modifications.html"><i class="fas fa-cog"></i> Modifier mes informations</a>
                    <a class="dropdown-item" href="/messagerie.html"><i class="fas fa-envelope-open"></i> Messages privés</a>
                    <a class="dropdown-item" href="/profil.html"><i class="fas fa-eye"></i>Voir mon profil</a>
                    <a class="dropdown-item" href="/deconnection.html"><i class="fas fa-door-open"></i>Déconnexion</a>
                    <?php if ($_SESSION['rank'] >= 3) { ?>
                    <a class="dropdown-item" id="navbar-border-top" href="/article/ajouter.html"><i class="fas fa-pencil-alt"></i>Écrire un article</a>
                    <?php }
                    if ($_SESSION['rank'] >= 4) { ?>
                    <a class="dropdown-item" href="/administration.html"><i class="fas fa-user-lock"></i>Administration</a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php } else { ?>
            <button data-toggle="modal"  data-target=".bd-example-modal-lg">
                <a href="#"><i class="fas fa-key"></i></a></button>
            <button>
                <a href="inscription.html"><i class="fas fa-sign-in-alt"></i></a></button>
        <?php } ?>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
             aria-labelledby="myLargeModalLabel" aria-hidden="true" data-show="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content div_connection">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h1><i class="fas fa-key"></i>Connexion</h1>
                    <div id="info_connexion">
                        <form action="" method="post" id="form_Connexion">
                            <div class="name_form"><input type="text" id="user_Connection" value="" placeholder="IDENTIFIANT"></div>
                            <div class="name_form"> <input type="password" id="pass_Connection" value="" placeholder="MOT DE PASSE"></div>
                            <input type="submit" id="submit_Connexion" value="Se connecter">
                        </form>
                        <p id="error_connexion"></p>
                        <a href="index.php?action=inscription"><p>Pas encore de compte ? S'inscrire</p></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>