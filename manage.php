<? 
include_once"config.php";
if(!isset($_SESSION['username']) || !isset($_SESSION['password']) || !isset($_COOKIE['user']) || !isset($_COOKIE['usern'])){
	header("Location: index.php");
	}

?> 

<html>
<head>
	<title>CBC | Manage</title>
	<style type="text/css" media="all">@import "css/style.css";</style>
</head>

<body>
	<div class="content">
		<div id="top">
			<div class="padding">
				<a href="main.php">Compiler</a> | <a href="blog/">Blog</a> | <a href="forum.php">Forums</a><?php 
				if(!isset($_COOKIE['user'])) {
				echo " | <a href='login.php'>Login</a> | <a href='register.php'>Register</a>";
				} else {
				echo " | <a href='logout.php'>Logout</a>";
				}?>
			</div>
		</div>
		<div id="header">
			
			<div class="title">
				<h1>Cloud Based Compiler</h1>
				<h2>One Stop shop for online compiling</h2>
			</div>
		</div>
	
		<div id="subheader">
			<div id="menu">
			  	<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="main.php">Compiler</a></li>
					<li><a href="blog/">Blog</a></li>
					<li><a href="forum.php">Forums</a></li>
					<?php 
				if(!isset($_COOKIE['user'])) {
				echo "
					<li><a href='register.php'>Register</a></li>
					<li><a href='login.php'>Login</a></li> ";}?>
      				<li><a href="about.php">About</a></li>
      				<li><a href="contact.php">Contact</a></li>
      			</ul>
			</div>
			
			
		</div>
		
		<div id="main">

<iframe src="files/view.php" height=500px width=756px border=0></iframe>	
								
			</div>
			

		
		<div id="footer">
			<div class="padding">
				Copyright &copy; 2013 CBC
			</div>
		</div>
	</div>
</body>
</html>
