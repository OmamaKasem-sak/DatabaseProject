<?php
if (isset($_GET["id"])) { //menünün id değeri geldi mi?
    $id = $_GET["id"]; // geldiyse $id değişkenine aktar

    $data = pg_query_params($db, 'SELECT * FROM "Menu" WHERE "MenuID"=$1', array($id));
    //Öncelikle silinecek menü tablomuzda var mı diye kontrol edilir.

    if ($data) { // Menü var ise sil
        $sil = pg_query_params($db, 'DELETE FROM "Menu" WHERE "MenuID"=$1', array($id));
    }
    ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>menu-liste"/>
    <?php


} else { ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>"/>
<?php } ?>

