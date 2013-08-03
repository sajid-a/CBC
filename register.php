<? 
include_once"config.php";
$report = "Enter Details";
if(isset($_POST['register'])){
$name = $_POST['name'];
$passid = $_POST['passid'];
$uemail = $_POST['uemail'];
$pass2 = $_POST['pass2'];
$utele = $_POST['utele'];
$user = $_POST['user'];

if($name == NULL OR $passid == NULL OR $uemail == NULL OR $pass2 == NULL OR $user == NULL)
{
$report = "Please complete the form below.";

}else{
if(strlen($name) <= 2){
$report = "Your Name must be atleast 3 characters.";
}else{
$check_members = mysql_query("SELECT * FROM `users` WHERE `username` = '$user'");   
if(mysql_num_rows($check_members) != 0){
$report = "This username is already Registered";

}else{ 
if(strlen($passid) <= 2){
$report = "Password must be atleast 3 characters.";

}else{
if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $uemail)){ 
$report = "email address not valid.";

}else{
if(!preg_match("/^[7-9][0-9]{9}$/i",$utele)){
$report = "enter valid mobile number.";

}else
if($passid != $pass2)
{
$report = "Passwords do not match.";

}else
{
$tbl_name='users';
$sql="INSERT INTO $tbl_name(id,username,password,email,name,mobile)VALUES('', '$user', '$passid' , '$uemail', '$name', '$utele')";
$result=mysql_query($sql);
$structure = './files/'.$user."";
if (!mkdir($structure, 0777)) {
    die('Failed to create folders...');
}
if($result)
{
$report = "Registration Successful. Please Proceed to login";
header( "refresh:2;url=login.php" );
}
}}}}}}}
?> 
<html>
<head>
	<title>CBC | Register</title>
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
			
			
				<h2><a href="#">Registration page</a></h2>
				<h3>Register to avail all facilities</h3>
				<p class="date_l"><form method = "post">
                    <font color = 'black'>
                   <table width="384" align="center" border="0"> <h5><? echo "<tr><td colspan='2' align = 'center'>".$report."</td></tr><tr>";?></h5>
				   <tr><td>
                    Name:</td><td><input type="text" name="name" class="contact_input" />
                                        </td></tr><tr><td>
					<label>Email:</label></td><td><input type="text" name="uemail" class="contact_input" />
                                        
                    </td></tr>
					<tr><td>
					<label>Username:</label></td><td><input type="text" name="user" class="contact_input" />
                                        
                    </td></tr>
					<tr><td>
                     
                    <label>Password:</label></td><td><input type="password" name="passid" class="contact_input" />
                                      
                  </td></tr><tr><td>
					
					<label>ReType Password:</label></td><td><input type="password" name="pass2" class="contact_input" />
                                      
                     </td></tr><tr><td>
					
					<label>Mobile:</label></td><td><input type="text" name="utele" class="contact_input" />
                                      
                     </td></tr><tr><td align = center>
                    <input type = "reset" value = "Reset"/>
</td><td  align = center>
					<input type = "submit" value = "Submit" name = "register" class="send" />
             </td></tr></table>
                </form></font>
<p><a href = "login.php">Goto Login Page</a></p>			

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
