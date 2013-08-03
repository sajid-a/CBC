<? 
include_once"config.php";
$final_report="Please complete all the fields below..";
if(isset($_POST['login'])){
$username= trim($_POST['username']);
$password = trim($_POST['password']);
if($username == NULL OR $password == NULL){
$final_report="Please complete all the fields below..";
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
setcookie("user",$get_user_data['name'], time()+600);
setcookie("usern",$get_user_data['username'], time()+600);
$final_report="You are about to be logged in, please wait a few moments.. <meta http-equiv='Refresh' content='0; URL=index.php'/>";
}}}
?> 
<html>
<head>
	<title>CBC | Login</title>
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
			
			
				<h2><a href="#">Login page</a></h2>
				<h3>Login to use all facilities</h3>
				<p class="date_l"><form action="" method="post"> 
<center>
<table width="384" align="center" border="0"> <h5><? echo "<tr><td colspan='2' align = 'center'>".$final_report."</td></tr><tr>";?></h5>


  <tr> 
    <td>Username:</td> 
    <td><input type="text" name="username" size="30" maxlength="25"></td> 
  </tr> 
  <tr> 
    <td>Password:</td> 
    <td><input type="password" name="password" size="30" maxlength="25"></td> 
  </tr>
 
   <tr>
   <td>&nbsp;</td>
   <td><input type="submit" value="Login" name="login" ></td>
</table>
</center>
</form>
<p><a href = "register.php">Register for CBC</a></p>	

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
