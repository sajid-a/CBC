<? 
include_once"config.php";
if(!isset($_SESSION['username']) || !isset($_SESSION['password']) || !isset($_COOKIE['user']) || !isset($_COOKIE['usern'])){
	header("Location: index.php");
	}
	
	// if (isset($_POST['submit']))
	// {
	// $name = "files/".$_COOKIE['usern']."/".$_POST['name']."/";
	// mkdir($name, 0700);
	// }
?> 

<html>
<head>
	<title>CBC | Home</title>
	<style type="text/css" media="all">@import "css/style.css";</style>
</head>

<body>
	<div class="content">
		<div id="top">
			<div class="padding">
				<a href="main.php">Compiler</a> | <a href="blog/">Blog</a> | <a href="forum/">Forums</a><?php 
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
					<li><a href="forum/">Forums</a></li>
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
				<h2><a href="#">Create Project</a></h2>
				<h3>Specify Project</h3>
				
				<p class="date">
				
				<form method = "post">
				
				Create new project:&nbsp;<input type="text" name="name" value="Enter Project Name..." onblur="if(this.value=='') this.value='Enter Project Name...';" onfocus="if(this.value=='Enter Project Name...') this.value='';" />
				<input type = "submit" value = "Create" name = "submit">
				</form>
				<b>Available Projects:</b><br />
				<ul>
				
				<?php
$path = 'files/' . $_COOKIE['usern'];
$results = scandir($path);
$flag = 0;
foreach ($results as $result) {
    if ($result === '.' or $result === '..') continue;
    if (is_dir($path . '/' . $result)) {
        echo "<li><a href = '#'>$result</a><br /></li>"; $flag = 1;
    }
} 
if ($flag == 0)
	echo "No Available Projects"
?></ul>
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
