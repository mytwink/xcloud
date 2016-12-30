<?php
DB::query("DELETE FROM `".$_POST['portal']."` WHERE `id` = ?",
    array($_POST['id']) );
echo "good";
?>