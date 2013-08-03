<?php

include_once"config.php";


if (!isset($_COOKIE['admin']))
{
echo "<script>alert('You are not authorized to view this page');document.location.href='../index.php';</script>";
}

if (isset($_GET['delete']))
{
$del = $_GET['delete'];
mysql_query("delete from blog where id = $del") or die(mysql_error());
echo"<script>alert('Blog Deleted');</script>";
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Blog</title>
<link rel="stylesheet" type="text/css" href="style.css" media="screen">
<link rel="stylesheet" type="text/css" href="lavalamp.css" media="screen">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.lavalamp-1.3.5.js"></script>
<script type="text/javascript">
 
    $(function() {
        $('ul#menu1').lavaLamp({ startItem: 1 });
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
        <p style="margin-right: 0px">Welcome <?php if(!isset($_COOKIE['admin'])){echo "Guest";} else {echo "<b> " . $_COOKIE['admin'] . "</b> | <a href = 'logout.php' style = 'text-decoration: none; color: #416271;'>Logout</a>";} ?></p>
        <div id="menu">
            <ul id="menu1">                                        
                <li><a href="admin.php" title="">Add Blog</a></li>
                <li class="current"><a class="current" href="view.php" title="">View Blogs</a></li>
               			
            </ul>
        </div>
        
    </div>
    
      
    
    
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

<h2 style = "margin-left: 15px;">View Blog</h2>
    	<div id="wide_content">
        
        	

            <?php 
			
			
			$result = mysql_query("select * from blog") or die (mysql_error());
			
			
			echo "<table border = 1 cellspacing = 2 cellpadding = 5><tr><th width = 100px>Title</th><th width = 300px>Content</th><th width = 100px>Date</th><th>Delete Blog</th></tr>";
			while ($row = mysql_fetch_array($result))
			{
			echo "<tr><td><a href='edit.php?id=".$row['id']."'>".$row['title']."</a></td><td>".$row['content']."</td><td>".$row['date']."</td><td><a href = 'view.php?delete=".$row['id']."'>Delete</a></td></tr>";
			}
			echo"</table>";
			
			
			
			?>
            
            
            
            
        
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