<?php



if (isset($_POST['save']))

{

		$ourFileName = "Main.java";
		$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
		$text = $_POST['code'];
		fwrite($ourFileHandle, $text);
		fclose($ourFileHandle);
		echo "File Saved";

}
else
if (isset($_POST['run']))
{
	$output = shell_exec('javac Main.java 2>&1');
if ($output==null)
	echo "1<pre>Comilation Succesfull</pre>";
else
	echo "1<pre>$output</pre>";
$output = shell_exec('java Main 2>&1');
echo "2<pre>$output</pre>";

}

else

echo "Enter code or run code";

?>