<!DOCTYPE HTML>

<html>
	<head>
		<title>HIRE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <?php
include("C:/MAMP/htdocs/recsystem/company/logout.php");
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
            <h1>Logout of your Account?</h1>
                      <p>Are you sure you'd like to logout?</p>
<form action="../index.php" method="post">

        <input type="checkbox" name="alldevices" value="alldevices">Log out from all devices?<br />
        <input type="submit" name="confirm" value="Confirm">
       
	   </form>
            


