<?php

include_once "config.php";

$id = 1;
if(isset($_GET['id']))
{
$id = $_GET['id'];
}

?>

<html>
<head>
	<title>CBC | Blog</title>
	<style type="text/css" media="all">@import "css/style.css";</style>
</head>

<body>
	<div class="content">
		<div id="top">
			<div class="padding">
				<a href="#">Compiler</a> | <a href="index.html">Blog</a> | <a href="../forum/">Forums</a><?php 
				if(!isset($_COOKIE['user'])) {
				echo " | <a href='../login.php'>Login</a> | <a href='register.php'>Register</a>";
				} else {
				echo " | <a href='../logout.php'>Logout</a>";
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
					<li><a href="../index.php">Home</a></li>
					<li><a href="#">Compiler</a></li>
					<li><a href="../blog/">Blog</a></li>
					<li><a href="../forum/">Forums</a></li>
					<?php 
				if(!isset($_COOKIE['user'])) {
				echo "
					<li><a href='register.php'>Register</a></li>
					<li><a href='login.php'>Login</a></li> ";}?>
      				<li><a href="../about.php">About</a></li>
      				<li><a href="../contact.php">Contact</a></li>
      			</ul>
			</div>
			
			
		</div>
		
		<div id="main">
			<div class="right_side">
				
				<div class="nav">
				<h2>Topics</h2>
				<div class="padding">
				<?php
				
				$result = mysql_query("SELECT * from blog") or die(mysql_error());
				
				while($row = mysql_fetch_array($result))
				{
				$op = "<li><a href='index.php?id=".$row['id']."' ";
				if($row['id'] == $id)
				{
				$op = $op."class='current'";				
				}				
				$op = $op.">".$row['title']."</a></li>";
				echo "$op";
				
				}
				
				?>
				</div>
				
				
				
				</div>
			</div>
			<div class="left_side">
			
			
			<?php 
			
			$blog = mysql_query("SELECT * FROM blog WHERE id = '$id'") or die(mysql_error());
			$row1 = mysql_fetch_array($blog);
			echo "<h2>".$row1['title']."</h2><h3></h3><p class='date'>";
			echo $row1['content']."</p>";
			?>
			
			<br />   
			
			
				<br /><br />
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
