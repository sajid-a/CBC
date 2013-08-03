<?php

 include_once "config.php"; 

 if (isset($_POST['submit']))
 
 {
 
$name = $_POST['name']; 
$email = $_POST['email']; 
$phone = $_POST['phone']; 
$message = $_POST['msg']; 
 
 
$tbl_name='contact';
$sql="INSERT INTO $tbl_name (name, email, phone, message)VALUES('$name', '$email', '$phone', '$message')";
$result=mysql_query($sql);

 }
 ?>

<html>
<head>
	<title>CBC | Contact</title>
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
			
			
				<h2><a href="#">Contact Page</a></h2>
				<h3>Drop a message for any enquiry</h3><font color=black>
				<p class="date_l">      <?php	
		if(isset($_POST['submit']))
		{
		
		if($result)
{

echo "Thank You for you query. We will revert back to you shortly.";


}
            
			else
			{
				echo "There was some problem with the delivery of the query. Please <a href = 'contact.php'>submit again</a> or try again later";
			}
		}
else {		
  ?>            <form action = "" method = "post">
                    <table><tr><td>
                    <label>Name:</label></td><td><input type="text" name="name" class="contact_input" />
                    </td></tr><tr><td>
                    <label>Email:</label></td><td><input type="text" name="email" class="contact_input" />
					</td></tr><tr><td>
                    <label>Phone:</label></td><td><input type="text" name="phone" class="contact_input" />
					</td></tr><tr><td>
                    <label>Message:</label></td><td><textarea name="msg" class="contact_textarea"></textarea>
					</td></tr><tr><td colspan = 2 align = center>
					<input type = "submit" value = "Submit" name = "submit" class="send1" /></td></tr>
            </table>
                </form></font>
				</p><br /><br />
			
			<?}?>
		</div>
		
		<div id="footer">
			<div class="padding">
				Copyright &copy; 2013 CBC
			</div>
		</div>
	</div>
</body>
</html>
