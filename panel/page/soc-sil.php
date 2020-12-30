<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $data = pg_query_params($db, 'SELECT * FROM "SocialMedia" WHERE "SocialMediaID"=$1', array($id));

    if ($data) {
        $sil = pg_query_params($db, 'DELETE FROM "SocialMedia" WHERE "SocialMediaID"=$1', array($id));
    }
    ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>soc-liste"/>
    <?php


} else { ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>"/>
<?php } ?>

