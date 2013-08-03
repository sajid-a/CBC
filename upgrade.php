<? 
include_once"config.php";
if(!isset($_SESSION['username']) || !isset($_SESSION['password']) || !isset($_COOKIE['user']) || !isset($_COOKIE['usern'])){
	header("Location: index.php");
	}
$report = "Enter Details";	
if(isset($_POST['register'])){
$name = $_POST['name'];
$cardno = $_POST['card1']."".$_POST['card2']."".$_POST['card3']."".$_POST['card4'];
$cvv = $_POST['cvv'];

if($name == NULL OR $cardno == NULL OR $cvv == NULL)
{
$report = "Please complete the form below.";

}else{
if(strlen($name) <= 2){
$report = "Your Name must be atleast 3 characters.";
}else{

if(strlen($cvv) <= 2){
$report = "CVV must be atleast 3 characters.";

}else{
if(strlen($cardno) < 16){
$report = "Card Number must be atleast 16 characters.";

}else
{
$tbl_name='users';
$usernam = $_COOKIE['usern'];
$sql="UPDATE users set type = 'full' where username = '$usernam'";
$result=mysql_query($sql);
if($result)
{
$report = "Successfully upgraded your account";
header( "refresh:2;url=main.php" );
}
}}}}}
?> 

<html>
<head>
	<title>CBC | Upgrade</title>
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
<form method = "post">
                    <font color = 'black'>
                   <table width="384" align="center" border="0"> <h5><? echo "<tr><td colspan='2' align = 'center'>".$report."</td></tr><tr>";?></h5>
				   <tr><td>
                    Name:</td><td><input type="text" name="name" style = "width: 200px;"/>
                                        </td></tr><tr><td>
					<label>Card No.:</label></td><td><input type="text" name="card1" style = "width: 50px;" /><input type="text" name="card2" style = "width: 50px;" /><input type="text" name="card3" style = "width: 50px;" /><input type="text" name="card4" style = "width: 50px;" />
                                        
                    </td></tr>
					
					<tr><td>
                     
                    <label>CVV:</label></td><td><input type="password" name="cvv" style = "width: 50px;"/>
                                      
                  </td></tr><tr><td align = center>
                    <input type = "reset" value = "Reset"/>
</td><td  align = center>
					<input type = "submit" value = "Submit" name = "register" class="send" />
             </td></tr></table>
                </form></font>		
								
			</div>
			

		
		<div id="footer">
			<div class="padding">
				Copyright &copy; 2013 CBC
			</div>
		</div>
	</div>
</body>
</html>
