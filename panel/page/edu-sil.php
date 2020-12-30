<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $data = pg_query_params($db, 'SELECT * FROM "Education" WHERE "EducationID"=$1', array($id));

    if ($data) {
        $sil = pg_query_params($db, 'DELETE FROM "Education" WHERE "EducationID"=$1', array($id));
    }
    ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>edu-liste"/>
    <?php


} else { ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>"/>
<?php } ?>

