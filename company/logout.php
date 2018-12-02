<?php
include('C:\MAMP\htdocs\recsystem\classes\CLogin.php');
include('C:\MAMP\htdocs\recsystem\classes\DB.php');
if (!CLogin::isCLoggedIn()) {
        die("Not logged in.");
}
if (isset($_POST['confirm'])) {
        if (isset($_POST['alldevices'])) {
                DB::query('DELETE FROM login_tokensc WHERE comp_id=:userid', array(':userid'=>CLogin::isCLoggedIn()));
        } else {
                if (isset($_COOKIE['SNID'])) {
                        DB::query('DELETE FROM login_tokensc WHERE token=:token', array(':token'=>sha1($_COOKIE['SNID'])));
                }
                setcookie('SNID', '1', time()-3600);
                setcookie('SNID_', '1', time()-3600);
        }
}
?>
