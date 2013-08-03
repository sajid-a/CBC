<? 
include_once"config.php";
$name = $_COOKIE['usern'];
$result = mysql_query("select * from code where username = '$name'") or die (mysql_error());
$res_r = mysql_fetch_array($result);
if ($res_r['logged'] == 1)
{
echo "<script>alert('You can attempt only once');document.location.href='logout.php';</script>";
}
else
{
mysql_query("update code set logged = 1 where username = '$name'");
}
?> 
<html>
<head>
	<title>CBC | Compiler</title>
	<style type="text/css" media="all">@import "css/style.css";</style>
	<script src="codepress/codepress.js" type="text/javascript"></script> 	
	<script src="countdown.js"></script>
</head>

<body>
	<div class="content">
		<div id="top">
			<div class="padding">
				<a href='logout.php'>Logout</a>
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
			<br />
			  	Welcome to the Online Coding Test/Competition
			</div>
			
			
		</div>
		
		<div id="main">
				<h2><a href="#">Compiler</a></h2>
				<h3>Enter and Run Code</h3>
				<p class="date_l">
				
				<form action="<?php echo "./files/code/test.php?file=".$_GET['file'].""; ?>" method = "post" onsubmit="code.toggleEditor();" target = "op">
				<textarea id="code" class="codepress java linenumbers-on" style="width:750px;height:300px;" name = "code">
   <?php 
   $path = "./files/code/".$_GET['file']."";
   $content = file_get_contents($path);
   echo $content;
   ?>
</textarea> 

<br /><br />

<input type = "submit" value = "Save" name = "save_j" id = "save_j"/>&nbsp;<input type = "submit" value = "Run" name = "run_j" id = "run_j"/>
<script type = "text/javascript">
var myCD2 = new Countdown({
	time	: 10, 	// Total number of seconds to count down.
	
	// Optional settings

	style 		: "flip", 	// flip boring whatever (only "flip" uses image/animation)
	rangeHi		: "year",		// The highest unit of time to display
	rangeLo		: "second",		// The lowest unit of time to display
	padding 	: 0.4,			// Padding between the digits and the background box. Value reflects a percentage of overall height.
	onComplete	: countdownComplete,	// Specify a function to call when done
	numberMarginTop : 5.5

});
function countdownComplete(){
	alert("Time Up");
	document.getElementById("save_j").disabled = true;
	document.getElementById("run_j").disabled = true;	
}						
</script>
</form>
			</p><br />
			
			Terminal Output:
			
<iframe src="files/sajid/test.php" frameborder = 0 seamless width="700px" height= "300px" name = "op"></iframe> 
		</div>
		
		<div id="footer">
			<div class="padding">
				Copyright &copy; 2013 CBC
			</div>
		</div>
	</div>
</body>
</html>
