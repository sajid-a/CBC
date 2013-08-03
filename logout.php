<? 


include_once"config.php";;
session_unset('username');
session_unset('password');
session_destroy();
setcookie("user",$get_user_data['name'], time()-600);
echo "<meta http-equiv='Refresh' content='0; URL=index.php'/>";
include_once"header.php";
?> 
