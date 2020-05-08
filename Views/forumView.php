<div class="row justify-content-center">
    <div class="block_News_Open col-11 col-xl-9 col-lg-10 mt-4">
        <h1><i class="far fa-comment-alt"></i>Forum</h1>
        <table id="forum_category">
            <tbody>
            <?php
            foreach ($getCategory as $data) { ?>
                <tr>
                    <td>
                        <a href="index.php?action=openCategory&idCategory=<?= $data->id; ?>">
                            <img src="<?= $data->cover_img; ?>">
                            <img src="<?= $data->logo; ?>">
                            <div class="hover_category">
                                <div class="category_title"><h2><?= $data->name; ?></h2></div>
                                <div class="category_text"><p>qsdqs</p></div>
                            </div>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>

    </div>
</div>