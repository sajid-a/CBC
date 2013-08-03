<?php

include_once"config.php";

if (!isset($_COOKIE['admin']))
{
echo "<script>alert('You are not authorized to view this page');document.location.href='../index.php';</script>";
}

$report = "Enter Details";

if(isset($_POST['login'])){
$uid= trim($_POST['uid']);
$passid = trim($_POST['passid']);
$passid2 = trim($_POST['passid2']);
if($uid == NULL OR $passid == NULL){

$report = "Please complete the form below.";

}else{
$check_user_data = mysql_query("SELECT * FROM `admin` WHERE `username` = '$uid'") or die(mysql_error());
if(mysql_num_rows($check_user_data) > 0){

$report = "Username already exists";


}else{
if($passid != $passid2){


$report = "Passwords do not match.";

}
else{
$result = mysql_query("Insert into admin (username, pass) VALUES ('$uid','$passid')") or die (mysql_error());
if ($result)
{
echo "<script>alert('Admin Succesffuly added.');</script>";
}
else{
$report = "An unknown error has occurred please retry.";
}
}}}}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>InvestSure | Blog</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen">
<link rel="stylesheet" type="text/css" href="lavalamp.css" media="screen">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.lavalamp-1.3.5.js"></script>
<script type="text/javascript">
 
    $(function() {
        $('ul#menu1').lavaLamp({ startItem: 2 });
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
    	<div id="logo"><a href="home.php"><img src="images/logo.png" alt="" title="" border="0"></a>&nbsp;
		</div>
         <p style="margin-right: 0px">Welcome <?php if(!isset($_COOKIE['admin'])){echo "Guest";} else {echo "<b> " . $_COOKIE['admin'] . "</b> | <a href = 'logout.php' style = 'text-decoration: none; color: #416271;'>Logout</a>";} ?></p>
        <div id="menu">
            <ul id="menu1">                                        
                <li><a href="admin.php" title="">Add Blog</a></li>
                <li><a href="view.php" title="">View Blogs</a></li>
                <li class="current" ><a class="current" href="add.php" title="">Add Admin</a></li>				
            </ul>
        </div>
        
    </div>
    
       <div class="box">
    	<div class="logo_1">
        <img src="images/logo_1.png" alt="" title="">             
        </div>
        <div class="text_content">
        <h1>What is InvestSure?</h1>
        <p class="green">
        InvestSure is an initiative by a group of professionals to provide professional
insurance and investment advice to the common mass. The purpose of this site is to
provide appropriate information related to insurance and investment to all people
enabling them to take informed investment and insurance decisions. 
        </p>
       <div class="read_more"><a href="about.php">Read More</a></div>
        </div>
        
        <div id="right_nav">
		
        </div>       
        
    
    </div><!--end of green box-->
    
    
    <div id="main_content">
    
<div id="left_content_blog">
        <h2>Topics</h2>
        <!-- <p>
InvestSure is an initiatice by Mrs. Veena Kamat and Mr. Naresh Natwal to provide professional and easy Insurance Advice to the public.	        
        </p><p class="clear">&nbsp;</p>
        <h2>Know About Insurance Policies</h2> -->
         <div id="left_nav_blog">
            <ul>                                        
                Any Content that you may need to add.
            </ul>
        </div>
        
          
        
        
        
        </div><!--end of left content-->

<h2 style = "margin-left: 15px;">Add Admin</h2>
    	<div id="wide_content">
        
        	

            
 <form method = "post">
                    
                  <p style = "margin-left: 80px;"> <?php echo $report; ?><br /><br /> </p>
                    <label>Id:</label><input type="text" name="uid" class="contact_input" />
                                        
                    <br /><br />
                     
                    <label>Pass:</label><input type="password" name="passid" class="contact_input" />
                                      
                    <br /><br />
                    
					<label>Re enter Pass:</label><input type="password" name="passid2" class="contact_input" />
                                      
                    <br /><br />

					<input type = "submit" value = "Submit" name = "login" class="send" />
            
                </form>
            
            
            
            
        
        </div><!--end of right content-->
    <br />
    <div style="clear:both;"></div>
    </div><!--end of main content-->
 

     <div id="footer">
     	
    	<div class="footer_links"> 
        ||<a href="blog.php">Blog</a>
		||<a href="register.php">Register</a>
        ||<a href="contact.php">Contact Us</a> ||
        &copy; InvestSure

        </div>
    
    
    </div>  
 
   

</div> <!--end of main container-->


</body></html>