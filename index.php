<? 
include_once"config.php";
$final_report="Please complete the form";
if(isset($_POST['login'])){
$username= trim($_POST['username']);
$password = trim($_POST['password']);
if($username == NULL OR $password == NULL){
$final_report="Please complete the form";
}else{
$check_user_data = mysql_query("SELECT * FROM `users` WHERE `username` = '$username'") or die(mysql_error());
if(mysql_num_rows($check_user_data) == 0){
$final_report="Username or Password does not exist.";
}
$check_user_data2 = mysql_query("SELECT * FROM `users` WHERE `password` = '$password'") or die(mysql_error());
if(mysql_num_rows($check_user_data2) == 0){
$final_report="Username or Password does not exist.";
}
$get_user_data = mysql_fetch_array($check_user_data);
if($get_user_data['password'] == $password){
$start_idsess = $_SESSION['username'] = "".$get_user_data['username']."";
$start_passsess = $_SESSION['password'] = "".$get_user_data['password']."";
$start_useridsess = $_SESSION['userid'] = "".$get_user_data['id']."";
setcookie("user",$get_user_data['name'], time()+600);
setcookie("usern",$get_user_data['username'], time()+600);
$sub = substr($username,0,5);
if($sub=="code_")
{
$final_report="You are about to be logged in, please wait a few moments.. <meta http-equiv='Refresh' content='0; URL=intrm.php'/>";
}
else
{
$final_report="You are about to be logged in, please wait a few moments.. <meta http-equiv='Refresh' content='0; URL=index.php'/>";}
}}}
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
		
		<div id="main"><?php 
				if(!isset($_COOKIE['user'])) {?>
			<div class="right_side">
				
				<div class="nav">
				<h2>Login</h2>
				<div class="padding">
				<div class="f_search">
					<form method="post" action="">
						<p><input type="text" name="username" value="Enter Username..." class="search" onblur="if(this.value=='') this.value='Enter Username...';" onfocus="if(this.value=='Enter Username...') this.value='';" /></p>
						<p><input type="password" name="password" value="password" class="search" onblur="if(this.value=='') this.value='password';" onfocus="if(this.value=='password') this.value='';" /></p>
						<p><? echo "$final_report"?></p>
						<p><input type="submit" value="Login" class="submit" name ="login" /></p>
						
					</form>
			</div>
				
				</div>
				
				
				
				</div>
			</div>
			<div class="left_side"><?}?>
				<h2><a href="#">Cloud Based Compiler</a></h2>
				<h3>SIMPLE, LIGHT and POWERFUL</h3>
				<div class="img"><img src="images/main/img.jpg" alt="" /></div>
				<p class="date">Data in today's world has great power. The right data in the wrong hands can mean complete destruction or in the right hands can lead to global progress. Thus this data has to be protected from anti social or corrupt people. Encryption forms a big means of safeguarding data from illegal use. The encrypted data becomes illegible to read or understand to a naïve person. The encryption algorithms use a key which is used to encrypt and decrypt the data. The key is known only to the sender and the receiver thus making sure only the authorized people are able to access the data.<br /><br />
But the fact that the encryption algorithm remains the same makes it a possibility for cryptologists to guess or deduce the key from an encrypted message by comparing it with the characteristics of the language in which the message is written. And once they guess the key it can be used to crack and decrypt all future transmission using the same algorithm or the key.<br /><br />
 Our project aims to overcome this problem so that only our software knows the key and the algorithm used and hiding this fact from all other persons. It would even be able to randomize the key and the algorithm after specific interval of time so that even if one of the transmissions is cracked, the same algorithm or the key cannot be used for cracking future transmissions.<br /><br />
The randomization algorithm will be known only to the software and the seed for the randomizer will be hidden in the encrypted message so that no traces are stored anywhere and the data can only be read and understood by the right people. The absence of the key makes it unnecessary to use a secure channel to transmit the key and the absence of traces makes it difficult for the key and algorithm to be cracked even if the software is compromised.<br /><br />

				</p><br /><br />
			</div>
			
		<?php if(!isset($_COOKIE['user'])) { ?></div> <?}?>
		
		<div id="footer">
			<div class="padding">
				Copyright &copy; 2013 CBC
			</div>
		</div>
	</div>
</body>
</html>
