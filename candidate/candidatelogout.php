<!DOCTYPE HTML>

<html>
	<head>
		<title>HIRE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <?php
include("C:/MAMP/htdocs/recsystem/candidate/logout.php");
#include('C:\MAMP\htdocs\recsystem\classes\Login.php');
?>
</head>
<body class="subpage">
		

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="index.php" class="logo"><strong>Home</strong></a>
					<nav id="nav">
						
                    <a href="../index.php">Home</a>
                    </nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
            </header>
            <h1><b>Logout of your Account?</b></h1>
                     <h3> <p>Are you sure you'd like to logout?</p></h3>
<form action="loginpage.php" method="post">
        <input type="checkbox" name="alldevices" value="alldevices"> Logout of all devices?<br />
        <input type="submit" name="confirm" value="Confirm">
        
</form>
            


