<?php

include_once "config.php";

$id = 1;
if(isset($_GET['id']))
{
$id = $_GET['id'];
}

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
    	<div id="logo"><a href="home.php"><img src="images/logo.png" alt="" title="" border="0"></a>&nbsp;
		</div>
        <p style="margin-right: 0px">Welcome <?php if(!isset($_COOKIE['name'])){echo "Guest";} else {echo "<b> " . $_COOKIE['name'] . "</b> | <a href = 'logout.php' style = 'text-decoration: none; color: #416271;'>Logout</a>";} ?></p>
        <div id="menu">
            <ul id="menu1">                                        
                <li class="current"><a href="home.php" title="">Home</a></li>
                <li><a class="current" href="blog.php" title="">Blog</a></li>
                <li><a href="life.php" title="">Life Insurance</a></li>
				<li><a href="general.php" title="">General Insurance</a></li>
                <li><a href="health.php" title="">Health Insurance</a></li>
				<li><a href="register.php" title="">Register</a></li>
				<li><a href="login.php" title="">Login</a></li>
                <li><a href="contact.php" title="">Contact Us</a></li>
				
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
		<div id="demo2" class="demo2">
            <a title="" href="#" class="prev"></a>
            <div class="slides">
                <div>
                    
                    <p class="txt">
						
						TERM PLAN is the most important Life Insurance Plan.</p>
                </div>
                <div>
                    
                    <p class="txt">
						
						Insure yourselves to 10 TIMES your Annual Income.</p>
                </div>
                
                <div>
                    
                    <p class="txt">
					
						Cover your entire family's health care expenses through "FAMILY FLOATER".</p>
                </div>
                <div>
                    
                    <p class="txt">
					
						Invest in ULIP only if you PLAN LONG TERM.</p>
                </div>  
				<div>
                    
                    <p class="txt">
					
						Never get carried away by what Insurance Advisor tells you. Do your home work.</p>
                </div> 
				<div>
                    
                    <p class="txt">
					
						As of now, the Net Returns in Insurance is never greater than 10%. However, it
does offer life cover along with investment.</p>
                </div> 
				<div>
                    
                    <p class="txt">
					
						Get INSURED early to take advantage of low mortality rate.</p>
                </div> 
				<div>
                    
                    <p class="txt">
					
						Start INVESTMENT early to use the Power of Compounding.</p>
                </div> 
				<div>
                    
                    <p class="txt">
					
						Lowest Premium Policy need not be the best Term Plan option. Look at the Claim
Settlement Ratio.</p>
                </div> 
				<div>
                    
                    <p class="txt">
					
						Live a "HEALTHY LIFE STYLE" but protect yourself against uncertainties through<br />
Life and Health Insurance.</p>
                </div> 
            </div>
            <a title="" href="#" class="next"></a>
        </div>
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
                <?php
				
				$result = mysql_query("SELECT * from blog") or die(mysql_error());
				$count = 1;
				while($row = mysql_fetch_array($result))
				{
				$op = "<li><a href='blog.php?id=".$count."' ";
				if($count == $id)
				{
				$op = $op."class='current'";				
				}				
				$op = $op.">".$row['title']."</a></li>";
				echo "$op";
				$count = $count + 1;
				}
				
				?>
            </ul>
        </div>
        
          
        
        
        
        </div><!--end of left content-->

<h2 style = "margin-left: 15px;">Blog</h2>
    	<div id="wide_content">
        
        	<?php 
			
			$blog = mysql_query("SELECT * FROM blog WHERE id = '$id'") or die(mysql_error());
			$row1 = mysql_fetch_array($blog);
			echo "<h3>".$row1['title']."</h3>";
			echo $row1['content'];
			?>
			
 <!-- <h3>Life Insurance in India</h3>  
            <p>         
Most of the times, life is smooth sailing and certain. But sometimes, it may
become uncertain and a bumpy roller coaster ride. These uncertainties create
lot of stress and may disturb family life. These uncertainties may be a sudden
loss of life of an earning member, major medical illness in family, college
education and marriage of children. It is during these times that life insurance
in its various forms and medical insurance, if properly planned and adequate
proves to be extremely useful.</p><br />
<h4>Types of Life Insurance...</h4>
A life insurance policy could offer pure protection (insurance), another variant
could offer protection as well as investment while some others could offer only
investment. The types of insurance policy are :<br />
<ul type = "disc">
<li>Term Life Insurance Policy</li>
<li>Whole Life Insurance Policy</li>
<li>Money Back Plan</li>
<li>Pension Plan</li>
<li>Endowment Policy</li>
<li>Unit-linked insurance plan (ULIP)</li>
</ul>
The most basic and the most important but often the most ignored of all
insurance policy is the <b><u>term plan</u></b> for protection of income. The minimum
coverage i.e the Sum Assured should be 10 times the annual net income i.e if
the annual net income is 5 Lacs the coverage should be 50 Lacs.</p><br />
<h4>Insurance Companies in India...</h4>
<p>
LIC was the major insurance player before the year 2000. The insurance sector
was finally opened up to private players in 2001.The Insurance Regulatory and
Development Authority, an autonomous insurance regulator set up in 2000,
has extensive powers to oversee the insurance business and regulate in a
manner that will safeguard the interests of the insured. There are currently 23
private companies in life insurance who have been provided with license by
IRDA.
			</p>
			
           <div class="read_more_link_b"> <a href="dl/index.php?id=1">Know More About...</a> </div> -->
              <br />              
      
            
            
            
            
            
            
        
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