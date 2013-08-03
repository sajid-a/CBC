<? 
session_start();

session_destroy();
setcookie("admin", "", time()-3600);
header( "refresh:0;url=../index.php" );
?> 

