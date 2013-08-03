<? 
session_start();
include_once"config.php";
$report = "Enter Details";
if(isset($_POST['login'])){
$uid= trim($_POST['uid']);
$passid = trim($_POST['passid']);
if($uid == NULL OR $passid == NULL){

$report = "Please complete the form below.";

}else{
$check_user_data = mysql_query("SELECT * FROM `admin` WHERE `username` = '$uid'") or die(mysql_error());
if(mysql_num_rows($check_user_data) == 0){

$report = "Username or password does not exist";


}
$check_user_data2 = mysql_query("SELECT * FROM `admin` WHERE `pass` = '$passid'") or die(mysql_error());
if(mysql_num_rows($check_user_data2) == 0){


$report = "Username or password does not exist";

}
$get_user_data = mysql_fetch_array($check_user_data);
if($get_user_data['pass'] == $passid)
{

setcookie("admin","$uid", time()+36000);
$report = "You are about to be logged in...";
header( "refresh:2;url=admin.php" );

}}}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen">
<link rel="stylesheet" type="text/css" href="lavalamp.css" media="screen">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.lavalamp-1.3.5.js"></script>
<script type="text/javascript">
 
    $(function() {
        $('ul#menu1').lavaLamp({ startItem: 6 });
    });
 
</script> 
<script type="text/javascript" language="javascript" src="js/jquery.jcontent.0.8.js"></script>
        <link href="css/demo.css" rel="stylesheet" type="text/css"/>  
        <link href="css/jcontent.css" rel="stylesheet" type="text/css"/> 
		
		<script type="text/javascript" language="javascript">
		$("document").ready(function(){
		$("div#demo2").jContent({orientation: 'vertical', 
                                         easing: "easeOutCirc", 
                                         duration: 500}); 
		});								 
		</script>	
</head>

<body>
<div id="main_container">
	<div id="header">
    	<div id="logo"><a href="#">Cloud Based Compiler</a>&nbsp;
		</div>
        <p style="margin-right: 0px">Welcome <?php if(!isset($_COOKIE['name'])){echo "Guest";} else {echo "<b> " . $_COOKIE['name'] . "</b> | <a href = 'logout.php' style = 'text-decoration: none; color: #416271;'>Logout</a>";} ?></p>
        <div id="menu">
            <ul id="menu1">                                        
                <li class="current"><a href="index.php" title="">Login</a></li>                
            </ul>
        </div>
        
    </div>
    
       
    
    <div id="main_content">
    	<div id="left_content">

        <!-- <p>
InvestSure is an initiatice by Mrs. Veena Kamat and Mr. Naresh Natwal to provide professional and easy Insurance Advice to the public.	        
        </p><p class="clear">&nbsp;</p>
        <h2>Know About Insurance Policies</h2> -->
         <div id="left_nav">
         
        </div>
        
          
        
        
        
        </div><!--end of left content-->



    	<div id="right_content">
        <h2>Login</h2>

                 <form method = "post">
                    
                  <p style = "margin-left: 80px;"> <?php echo $report; ?><br /><br /> </p>
                    <label>Id:</label><input type="text" name="uid" class="contact_input" />
                                        
                    <br /><br />
                     
                    <label>Pass:</label><input type="password" name="passid" class="contact_input" />
                                      
                    <br /><br />
                    

					<input type = "submit" value = "Submit" name = "login" class="send" />
            
                </form>
            
            
            
            
            
        
        </div><!--end of right content-->


    
    <div style=" clear:both;"></div>
    </div><!--end of main content-->
 

     <div id="footer">
     	
    	
    
    </div>  
 
   

</div> <!--end of main container-->


</body></html>