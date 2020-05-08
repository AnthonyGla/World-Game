<?php
$page_title = "Guide des champions - LOL";
ob_start();
?>
<div class="row justify-content-center">
    <div class="block_News_Open col-11 col-xl-9 col-lg-10 mt-4"
         <h1><i class="fas fa-band-aid"></i></h1>

        <?php
        $count_subject = $listSubject->rowCount();
        if ($count_subject == 0) { ?>
        <div>Pas de msg</div>
        <?php 
        } else {
            ?>
            <table>
                <thead>
                    <tr>
                        <th>Lu</th>
                        <th>Nom du sujet</th>
                        <th>Messages</th>
                        <th>Dernier message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($donnees = $listSubject->fetch()) {
                        $subject_msg = countMsgSubject($donnees['id']);
                        $count_msg = $subject_msg->rowCount();
                        $last_msg = $subject_msg->fetch();
                        ?>
                        <tr>
                            <td><img src="assets/img/msg_noread.png"></td>
                            <td class="subject_title"><a href="index.php?action=openSubject&idSubject=<?= $donnees['id'] ?>"><?= $donnees['subject_title']; ?></a></td>
                            <td><?= $count_msg; ?></td>
                            <td><?= dateToFrench($last_msg['msg_date'], "l j F, à H:i"); ?><br/>par <?= $last_msg['msg_author'] ?></td>
                        </tr>


                    <?php }
                }
                ?>
            </tbody>
        </table>      

    </div>
</div>
<?php
$content = ob_get_clean();
include('template.php');
?>
