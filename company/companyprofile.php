<html>
<head>
<title>Profile Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
       <?php
       
       ?>
     
</head>
<body class="subpage">
        


				<!-- Header -->
			       <div id="header">
				<div class="inner">
					<a href="../index.php" class="logo"><strong>Home</strong></a>
					<nav id="nav">
						<a href="companylogout.php">Log Out</a>
						
					</nav>
					<a href="companylogout.php" class="navPanelToggle"><span class="fa fa-bars">Log Out!</span></a>
				</div>
			
                                </div>
                        
                        <section>
                      
                                   
		<!-- Three -->
			
<?php
 #include('C:\MAMP\htdocs\recsystem\classes\DB.php');
 include('C:\MAMP\htdocs\recsystem\classes\Post.php');
 include('C:\MAMP\htdocs\recsystem\classes\Login.php');
 include('C:\MAMP\htdocs\recsystem\classes\CLogin.php');
 include('schedulenew.php');
  
 $username= "";
$verified = False;
$isFollowing = False;
$userid=0;
$followerid=0;
$logeduser=CLogin::isCLoggedIn();


if (isset($_GET['companyname'])) {
        if (DB::query('SELECT companyname FROM company WHERE companyname=:username', array(':username'=>$_GET['companyname']))) {
                $username = DB::query('SELECT companyname FROM company WHERE companyname=:username', array(':username'=>$_GET['companyname']))[0]['companyname'];
                $userid = DB::query('SELECT id FROM company WHERE companyname=:username', array(':username'=>$_GET['companyname']))[0]['id'];
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
                      
                    
                        Post::createPost($_POST['jobprofile'],$_POST['openings'],$_POST['postbody'], $logeduser , $userid);
                }
                if (isset($_GET['postid'])) {
                        Post::likePost($_GET['postid'], $followerid);
                }

               
              
        } else {
                die('User not found!');
        }
}



?>
<b><h1><?php echo $username; ?>'s Profile</h1></b>
<form action="companyprofile.php?username=<?php echo $username; ?>" method="post">
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
<form action="companyprofile.php?companyname=<?php echo $username; ?>" method="post" enctype="multipart/form-data">
        <!--<input type="submit" name="follow" value="follow"> !-->
        <br>
       <b> Role:</b><input style="background:transparent; color:black;" type="text" name="jobprofile" value="" placeholder="Ex-Software developer">
        <br>
       <b>No-Of-Openings:</b> <input style="background:transparent; color:black;" type="text" name="openings" value="" placeholder="">
        <br>
        <b> Description:</b> <textarea style="color: black; z-index: auto; position: relative; line-height: 26.4px; font-size: 16px; transition: none 0s ease 0s; background: transparent !important;" name="postbody" rows="8" cols="10"></textarea>
        <br>
        <input type="submit" name="post" value="Post">
</form>
<h2>Current Posts:</h2>

 <?php $posts = Post::displayPosts($userid, $username, $followerid);
  
 ?>
 
 <br>
<div class="posts">
        <?php echo $posts ?>
</div>

 
 <form action='companyprofile.php?companyname=<?php echo $username; ?>' method='post'>
                                <input type='submit' name='interview' value='interview'> 
                                
                                 </form>
                               	
					
                                       
  <form action='interview.php' method='post'>
                                       
                                <input type='submit' name='display' value='display-schedule'> 
                        
                                 </form>

                                 </body>

                                 </html>