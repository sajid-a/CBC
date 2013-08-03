<?php


$name = "files/code/".$_COOKIE['usern'].".java";	
$ourFileHandle=fopen($name,'w');
$name = $_COOKIE['usern'];
	$text="class $name
	{
	
	public static void main (String args[])
	
	{
	
		System.out.println(\"Hello World\");
	}
	
	}";
	fwrite($ourFileHandle, $text);	
fclose($ourFileHandle);
$link = $name.".java";
header("Location: java_c.php?file=$link");
?>
