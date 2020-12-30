<?php
if (isset($_GET["tablo"]) && isset($_GET["id"])) {
    $tablo = $db->filter($_GET["tablo"]);
    $id = $db->filter($_GET["id"]);
    $kontrol = $db->getData("modules", "WHERE _table=? AND state=?", array($tablo, 1), "ORDER BY id ASC", 1);
    if ($kontrol) {
        $data = $db->getData($kontrol[0]["_table"], "WHERE id=?", array($id), "ORDER BY id ASC", 1);
        if ($data) {
            $sil = $db->queryExecute("DELETE FROM " . $tablo, "WHERE id=?", array($id), 1);
        }
        ?>
        <meta http-equiv="refresh" content="0;url=<?= URL ?>liste/<?= $kontrol[0]["_table"] ?>"/>
        <?php

    } else { ?>
        <meta http-equiv="refresh" content="0;url=<?= URL ?>"/>
    <?php }
} else { ?>
    <meta http-equiv="refresh" content="0;url=<?= URL ?>"/>
<?php } ?>

