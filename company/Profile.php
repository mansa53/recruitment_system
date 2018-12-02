<html>
<head>
<title>Profile Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <?php
include("profile.php");
include("schedulenew.php");
?>
</head>
<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><strong></strong></a>
					<nav id="nav">
						<a href="../index.php">Home</a>
						
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
                        </header>
                        <section>
                        <h1>sbfkas</h1>
                                   
		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
					
				
				
					
					
				</div>

                        </section>
                      
<?php

include('C:\MAMP\htdocs\recsystem\classes\DB.php');
include('C:\MAMP\htdocs\recsystem\classes\Post.php');
include('C:\MAMP\htdocs\recsystem\classes\Login.php');
include('C:\MAMP\htdocs\recsystem\classes\CLogin.php');
$username= "";
$verified = False;
$isFollowing = False;
$userid=0;
$followerid=0;


if (isset($_GET['username'])) {
        if (DB::query('SELECT companyname FROM company WHERE companyname=:username', array(':username'=>$_GET['username']))) {
                $username = DB::query('SELECT companyname FROM company WHERE companyname=:username', array(':username'=>$_GET['username']))[0]['companyname'];
                $userid = DB::query('SELECT id FROM company WHERE companyname=:username', array(':username'=>$_GET['username']))[0]['id'];
               # $verified = DB::query('SELECT verified FROM users WHERE username=:username', array(':username'=>$_GET['username']))[0]['verified'];
                $followerid = Login::isLoggedIn();
                if (isset($_POST['follow'])) {
                        if ($userid != $followerid) {
                                if (!DB::query('SELECT follower_id FROM followers WHERE comp_id=:compid AND follower_id=:followerid', array(':compid'=>$userid, ':followerid'=>$followerid))) {
                                       
                                        DB::query('INSERT INTO followers VALUES (\'\', :compid, :followerid)', array(':compid'=>$userid, ':followerid'=>$followerid));
                                } else {
                                        echo 'Already following!';
                                }
                                $isFollowing = True;
                        }
                }
                if (isset($_POST['unfollow'])) {
                        if ($userid != $followerid) {
                                if (DB::query('SELECT follower_id FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid))) {
                                        
                                        DB::query('DELETE FROM followers WHERE user_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid));
                                }
                                $isFollowing = False;
                        }
                }
                if (DB::query('SELECT follower_id FROM followers WHERE comp_id=:userid AND follower_id=:followerid', array(':userid'=>$userid, ':followerid'=>$followerid))) {
                        //echo 'Already following!';
                        $isFollowing = True;
                }
                if (isset($_POST['post'])) {
                        Post::createPost($_POST['jobprofile'],$_POST['openings'],$_POST['postbody'], CLogin::isCLoggedIn(), $userid);
                }
                if (isset($_GET['postid'])) {
                        Post::likePost($_GET['postid'], $followerid);
                }

               
              
        } else {
                die('User not found!');
        }
}



?>
<h1><?php echo $username; ?>'s Profile<?php if ($verified) { echo ' - Verified'; } ?></h1>";
<form action="profile.php?username=<?php echo $username; ?>" method="post">";
      <?php  
      if ($userid != $followerid) {
                if ($isFollowing) {
                        echo '<input type="submit" name="unfollow" value="Unfollow">';
                } else {
                        echo '<input type="submit" name="follow" value="Follow">';
                }
        }
        ?>
        
</form>
<form action="profile.php?username=<?php echo $username; ?>" method="post" enctype="multipart/form-data">
        <!--<input type="submit" name="follow" value="follow"> !-->
        <br>
        <input type="text" name="jobprofile" value="" placeholder="Ex-Software developer">
        <br>
        <input type="text" name="openings" value="" placeholder="">
        <br>
        <textarea name="postbody" rows="8" cols="80"></textarea>
        <br>
        <input type="submit" name="post" value="Post">
</form>

 <?php $posts = Post::displayPosts($userid, $username, $followerid);
  
 ?>
 
 <br>
<div class="posts">
        <?php echo $posts ?>
</div>
<form action='schedulenew.php' method='post'>
                                <input type='submit' name='interview' value='interview'> 
                                 </form>	
					
                                        </section>
                                        <form action='schedulenew.php' method='post'>
                                        <section>
                                <input type='submit' name='display' value='display-schedule'> 
                                <?php display();?>
                                 </form>

                                 </html>