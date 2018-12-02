<?php

include('C:\MAMP\htdocs\recsystem\classes\DB.php');
if (isset($_POST['login'])) {
        echo "afb,geg.";
        $username = $_POST['companyname'];
        $password = $_POST['password'];
        if (DB::query('SELECT companyname FROM company WHERE companyname=:username', array(':username'=>$username))) {
                if (password_verify($password, DB::query('SELECT password FROM company WHERE companyname =:username', array(':username'=>$username))[0]['password'])) {
                        echo 'Logged in!';
                        $cstrong = True;
                        $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                        $user_id = DB::query('SELECT id FROM company WHERE companyname=:username', array(':username'=>$username))[0]['id'];
                        DB::query('INSERT INTO login_tokensc VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                        setcookie("SNID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
                        setcookie("SNID_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                } else {
                        echo 'Incorrect Password!';
                }
        } else {
                echo 'User not registered!';
        }
}

?>
