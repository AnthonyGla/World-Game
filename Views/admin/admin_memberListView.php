<?php
$this->titre = "Administration - Liste des membres";
?>
<h1>Liste des membres</h1>
<p>Il y a actuellement <?= $total_member; ?> inscrits sur le site.</p>
<select id="member_list_select" class="form-control form-control-lg">
    <option value="allUser">Tous les utilisateurs</option>
    <option value="mostNews">Journalistes les plus prolifiques</option>
    <option value="mostTutorial">Guides les plus prolifiques</option>
    <option value="TopComments">Top des commentateurs</option>
    <option value="TopPosts">Top des posteurs sur le forum</option>
</select>

<table class="table ajax_table" style="display: none;">
    <thead class="thead-dark">
    <tr>
        <th scope="col"></th>
        <th scope="col" class="avatar_table">Avatar</th>
        <th scope="col">Utilisateur</th>
        <th scope="col">Inscription</th>
        <th scope="col">Compte</th>
    </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<table class="table list_member_table">
    <thead class="thead-dark">
    <tr>
        <th scope="col" class="avatar_table"></th>
        <th scope="col">Utilisateur</th>
        <th scope="col" class="subscribe_table">Inscription</th>
        <th scope="col">Mail</th>
        <th scope="col">État du compte</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($list_member as $member) {
       if ($member->active == 0) {$status = '<i class="fas fa-user-times pr-2 text-secondary"></i>Inactif';}
       else if ($member->active == 1) {$status = '<i class="fas fa-user-check text-success pr-2"></i>Activé';}
       else {$status = '<i class="fas fa-user-slash pr-2 text-danger"></i>Banni';}
        ?>
            <tr>
                <th class="list_avatar avatar_table"><img alt="member_avatar" src="<?= $member->avatar ?>"></th>
                <td class="search_username">
                    <a href="/administration/modifier-utilisateur/<?= $member->username; ?>.html">
                    <?= $member->username ?>
                    </a>
                </td>
            <td class="subscribe_table"><?= $member->date ?></td>
            <td><?= $member->mail ;?></td>
            <td><?= $status ?></td>
        </tr>
    <?php  } ?>
    </tbody>
</table>

<nav>
    <ul class="pagination pagination-lg justify-content-center">
        <li class="page-item">
            <a class="page-link <?= ($page <= 1 ? 'btn disabled' : '') ?>" href="index.php?action=memberList&page=<?= $page - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>
        <?php for ($pageItem = 1; $pageItem <= $number_of_pages; $pageItem++) { ?>
        <li class="page-item <?php if ($page == $pageItem) {echo 'active';}?>">
            <a class="page-link" href="index.php?action=memberList&page=<?= $pageItem; ?>"><?= $pageItem; ?></a>
        </li>
        <?php } ?>
        <li class="page-item">
            <a class="page-link <?= ($page >= $number_of_pages ? 'btn disabled' : '') ?>" href="index.php?action=memberList&page=<?= $page + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>
