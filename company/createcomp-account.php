<?php
function createcompAccount() {
        include('C:\MAMP\htdocs\recsystem\classes\DB.php');
if (isset($_POST['createaccount'])) {
        $username = $_POST['companyname'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $industry=$_POST['area'];
        if (!DB::query('SELECT companyname FROM company WHERE companyname=:username', array(':username'=>$username))) {
                if (strlen($username) >= 3 && strlen($username) <= 32) {
                        if (preg_match('/[a-zA-Z0-9_]+/', $username)) {
                                if (strlen($password) >= 6 && strlen($password) <= 60) {
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                if (!DB::query('SELECT email FROM company WHERE email=:email', array(':email'=>$email))) {
                                        DB::query('INSERT INTO company  VALUES (\'\', :username, :password, :email,:industry)', array(':username'=>$username, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':email'=>$email,':industry'=>$industry));
                                        echo "Success!";
                                } else {
                                        echo 'Email in use!';
                                }
                        } else {
                                        echo 'Invalid email!';
                                }
                        } else {
                                echo 'Invalid password!';
                        }
                        } else {
                                echo 'Invalid username';
                        }
                } else {
                        echo 'Invalid username';
                }
        } else {
                echo 'User already exists!';
        }
}
}
?>

