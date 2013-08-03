<? 
include_once"config.php";
if(!isset($_SESSION['username']) || !isset($_SESSION['password']) || !isset($_COOKIE['user']) || !isset($_COOKIE['usern'])){
	header("Location: index.php");
	}
	
	if ($_POST['name']=="Enter Project Name...")
	{
		echo "<script type='text/javascript'>alert('Enter a file name');</script>";
	}
	
	if (isset($_POST['submit']) && $_POST['name']!="Enter Project Name...")
	{
	
	
	
	
	$path = 'files/' . $_COOKIE['usern'];
$results = scandir($path);
$flag = 0;
$count = 0;
foreach ($results as $result) {
    if ($result === '.' or $result === '..') continue;
    if (is_file($path . '/' . $result)) {
    	$file = pathinfo($result);
    	$name = $_POST['name'].".".$_POST['lang'];
    	if($result == $name){
    	echo "<script type='text/javascript'>alert('File Already Exists');</script>";
        $flag = 1;}
    	if(($file['extension']=="java" || $file['extension']=="php" || $file['extension']=="cpp" || $file['extension']=="html") && $result != "test.php"){      
        $count = $count + 1;
        }    
        
    }
} 
$uname = $_COOKIE['usern'];
$check = mysql_query("select * from users where username = '$uname'") or die(mysql_error());
$check_r = mysql_fetch_array($check);
$fflag = 0;
if ($count == 10 && $check_r['type'] == 'trial')
{
$fflag = 1;
echo "<script>alert('You have reached the maximum number of files you can create on a free account. please Upgrade to create more files and to utilize all features of Cloud Based Compiler');document.location.href='upgrade.php'</script>";

}

if ($flag == 0 && ($fflag == 0 || $check_r['type'] == 'full'))
	{
	$name = "files/".$_COOKIE['usern']."/".$_POST['name'].".".$_POST['lang']."";	
	$ourFileHandle=fopen($name,'w');
	switch($_POST['lang'])
	{
	
	case "java":
	$name = $_POST['name'];
	$text="class $name
	{
	
	public static void main (String args[])
	
	{
	
		System.out.println(\"Hello World\");
	}
	
	}";
	fwrite($ourFileHandle, $text);	
	break;
	
	
	case "cpp":
	$text="#include <iostream>
using namespace std;

int main()
{
cout<<\"Hello World\";
return 0;
}";
	fwrite($ourFileHandle, $text);	
	break;
	
	case "html":
	$text="<html>
	<head><title>Hello World</title></head>
	<body>
	Hello World
	</body>
	</html>
	";	
	fwrite($ourFileHandle, $text);	
	break;
	
	
	case "php":
	$text="
	<?php 
	
	echo \"Hello World\";
	
	?>
	";
	fwrite($ourFileHandle, $text);	
	break;
	
	}
	fclose($ourFileHandle);
	}
	}
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
		
		<div id="main">

				<h2><a href="#">Create Project</a></h2>
				<h3>Specify Project</h3>
				
				<p class="date">
						<a href = "manage.php" style = "color: Black;font-size:20px; float: right;">Manage Projects</a>	
				<form method = "post">
				
				Create new project:&nbsp;<input type="text" name="name" value="Enter Project Name..." onblur="if(this.value=='') this.value='Enter Project Name...';" onfocus="if(this.value=='Enter Project Name...') this.value='';" /><br />
				Select Language:&nbsp;<select name = "lang">
				
				<option value = "java">Java</option>
				<option value = "cpp">C++</option>
				<option value = "html">HTML</option>
				<option value = "php">PHP</option>								
				</select>
				<input type = "submit" value = "Create" name = "submit">
				</form>
				<b>Available Projects:</b><br />
				<ul>
				
				<?php
				$count = 0;
$path = 'files/' . $_COOKIE['usern'];
$results = scandir($path);
$flag = 0;
foreach ($results as $result) {
    if ($result === '.' or $result === '..') continue;
    if (is_file($path . '/' . $result)) {
    	$file = pathinfo($result);
    	if(($file['extension']=="java" || $file['extension']=="php" || $file['extension']=="cpp" || $file['extension']=="html") && $result != "test.php"){
        echo "<li><a href = '".$file['extension'].".php?file=".$result."'>$result</a><br /></li>"; $flag = 1;
        $count = $count + 1;
        }
    }
} 
$uname = $_COOKIE['usern'];
$check = mysql_query("select * from users where username = '$uname'") or die(mysql_error());
$check_r = mysql_fetch_array($check);
if ($count == 10 && $check_r['type']=='trial')
	echo "<h2>You have reached the maximum number of files that you can create. Please <a href = upgrade.php style = 'color:black'>Upgrade</a> your account to use the complete features of CBC</h2>";
if ($flag == 0)
	echo "No Available Projects";
?></ul>
				</p><br />	

			</div>


		
		<div id="footer">
			<div class="padding">
				Copyright &copy; 2013 CBC
			</div>
		</div>
	</div>
</body>
</html>
