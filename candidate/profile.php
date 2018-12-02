<!DOCTYPE HTML>

<html>
	<head>
		<title>HIRE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <?php
include("timeline.php");
include_once('C:\MAMP\htdocs\recsystem\classes\Login.php');
#include_once("resume.php");
?>
	</head>
	<body class="subpage">
		

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="../index.php" class="logo"><strong>Home</strong></a>
					<nav id="nav">
						
				
			<?php 
			  if (Login::isLoggedIn()) {
				$userid = Login::isLoggedIn();
				$path="resumes/$userid";
				
			} 
			$var="resume.pdf";
			echo "<a href='$path$var'>Resume</a>";
			?>
			<a href="candidatelogout.php">Log Out</a>
				
						
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Three -->
			<section id="three" class="wrapper">
				<div class="inner">
					<header class="align-center">
						<h2>Explore your interests!!</h2>
						
					</header>
				
					<?php timeline();?>
					
					
				</div>

			</section>
			<div class="inner">
			
			
		  <h2>	<a href="resumepage.php">Create Resume</a> </h2>
			
			
			</div>
			<section>
				<div class="inner">
					<h2>Companies you might be interested in</h2>
					<?php suggestions();?>
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="inner">

					<h3>Get in touch</h3>

					<form action="#" method="post">

						<div class="field half first">
							<label for="name">Name</label>
							<input name="name" id="name" type="text" placeholder="Name">
						</div>
						<div class="field half">
							<label for="email">Email</label>
							<input name="email" id="email" type="email" placeholder="Email">
						</div>
						<div class="field">
							<label for="message">Message</label>
							<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
						</div>
						<ul class="actions">
							<li><input value="Send Message" class="button alt" type="submit"></li>
						</ul>
					</form>

					

				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>