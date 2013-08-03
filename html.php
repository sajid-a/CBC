<? 
include_once"config.php";

if(!isset($_SESSION['username']) || !isset($_SESSION['password']) || !isset($_COOKIE['user']) || !isset($_COOKIE['usern'])){
	header("Location: index.php");
	}
	




?> 
<html>
<head>
	<title>CBC | Compiler</title>
	<style type="text/css" media="all">@import "css/style.css";</style>
	<script src="codepress/codepress.js" type="text/javascript"></script> 	
	
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
			<div class="right_side">
			<div class="nav">
			<div class="padding">
			<div class="f_search">
			<iframe src="files/index.php" frameborder = 0 height= "300px" width="200px"></iframe> 
			</div>
			</div>
			</div>
			</div>
			<div class="left_side">
				<h2><a href="#">Compiler</a></h2>
				<h3>Enter and Run Code</h3>
				<p class="date_l">
				
				<form action="<?php echo "./files/".$_COOKIE['usern']."/test.php?file=".$_GET['file'].""; ?>" method = "post" onsubmit="code.toggleEditor();" target = "op">
				<textarea id="code" class="codepress html linenumbers-on" style="width:450px;height:300px;" name = "code">
   <?php 
   $path = "./files/".$_COOKIE['usern']."/".$_GET['file']."";
   $content = file_get_contents($path);
   echo $content;
   ?>
</textarea> 

<br /><br />

<input type = "submit" value = "Save" name = "save_h" id = "save_h"/>&nbsp;<input type = "submit" value = "Run" name = "run_h" id = "run_h"/>
</form>
			</p><br />
			
			Terminal Output:
			
<iframe src="files/sajid/test.php" frameborder = 0 seamless width="700px" height= "300px" name = "op"></iframe> 
			</div>
		</div>
		
		<div id="footer">
			<div class="padding">
				Copyright &copy; 2013 CBC
			</div>
		</div>
	</div>
</body>
</html>
