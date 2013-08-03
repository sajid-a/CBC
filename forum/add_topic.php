<?php

if(!isset($_COOKIE['user']) || !isset($_COOKIE['usern'])){
echo "<script>alert('You need to login to create a topic');parent.document.location.href='../index.php'</script>";
	}

$host="localhost"; // Host name
$username="root"; // Mysql username
$password=""; // Mysql password
$db_name="proj"; // Database name
$tbl_name="forum_question"; // Table name

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// get data that sent from form
$topic=$_POST['topic'];
$detail=$_POST['detail'];
$name=$_POST['name'];
$email=$_POST['email'];

$datetime=date("d/m/y h:i:s"); //create date time

$sql="INSERT INTO $tbl_name(topic, detail, name, email, datetime)VALUES('$topic', '$detail', '$name', '$email', '$datetime')";
$result=mysql_query($sql);

if($result){
echo "Successful<BR>";
echo "<a href=main_forum.php>View your topic</a>";
echo "<script>document.location.href='main_forum.php'</script>";
}
else {
echo "ERROR";
}
mysql_close();
?>
