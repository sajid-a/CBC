<html>
<head>
	<title>CBC | About</title>
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
			
			
				<h2><a href="#">About Us</a></h2>
				<h3>All About Cloud Based Compiler</h3>
				<p class="date_l">
				
				Compilers are used to run programs and convert them from a text format to executable format. A compiler that is to be installed manually on every system physically requires a lot of space and also configuring of it if not installed using default parameters. Also once a program is compiled it becomes platform dependent. It is also not easy to carry the same program code to multiple systems if situation doesn’t permit the usage of a single system. Another drawback is that we would need to install a different complier on each language on which we wish to work.<br /><br />

We propose a solution to this in the form of a cloud based compiler. <br /><br />

Cloud computing is a model for enabling convenient, on demand network access to a shared pool of configurable computing resources that can be rapidly provisioned and released with minimal management effort. Our project aims to create an online compiler which helps to reduce the problems of portability of storage and space by making use of the concept of cloud computing. The ability to use different compilers allows the programmer to pick up the fastest or the most convenient tool to compile the code and remove the errors. Moreover a web based application can be used remotely through any network connection which is platform independent. The errors/Output of the compiled program can be stored in a more convenient way. Also the trouble of installing a compiler on each computer is avoided. Thus these advantages make this application ideal for conducting online examinations.
<br /><br />
We would be implementing a private cloud on which the software would be hosted. The software would be provided to the end user using a SAAS cloud. The software would contain a system that has a text editor and a terminal. The user would be given an option to select the language in which he wants to compile the program. The software will compile the program and return the output to the user. Additional functionalities such as monitoring of the system, user usage, user forums, and collaborative development can be added as needed.<br /><br />


				</p><br /><br />
			
			
		</div>
		
		<div id="footer">
			<div class="padding">
				Copyright &copy; 2013 CBC
			</div>
		</div>
	</div>
</body>
</html>
