<?php

include($_SERVER['DOCUMENT_ROOT'].'/proj/VirusTotalApi.php');



if (isset($_POST['save_j']))

{


		$ourFileName = $_GET['file'];
		$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
		$text = $_POST['code'];
		fwrite($ourFileHandle, $text);
		fclose($ourFileHandle);
		echo "File Saved";
		
			}


else
if (isset($_POST['run_j']))
{	

$api = new VirusTotalAPI('ba897318e591159536bca9a3a3a4aae73e74eb8fffa80594c4b8006e83f7941e');


/* Upload and scan a local file. */
$result = $api->scanFile($_GET['file']);
$scanId = $api->getScanID($result); /* Can be used to check for the report later on. */
$x = $result->result;
if($x==1)
{

	$exec = "javac ".$_GET['file']." 2>&1";
	$output = shell_exec($exec);
if ($output==null)
	echo "1<pre>Compilation Succesfull</pre>";
else
	echo "1<pre>$output</pre>";
		$name = $_GET['file'];
	$file = substr($name,0,-5);
	$run = "java ".$file." 2>&1";
$output = shell_exec($run);
echo "2<pre>$output</pre>";
}

else
{
echo "Malicious Code Detected";
}


}
else

echo "Enter code or run code";

?>
