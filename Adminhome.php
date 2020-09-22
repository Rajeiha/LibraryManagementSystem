<?php
session_start();
INCLUDE "database.php";
function countRecord($sql,$db)
{
   $res=$db->query($sql);
    return $res->num_rows;
}
if(!isset($_SESSION["AID"]))
{
    header("location:adminlogin.php");
}

?>
<!DOCTYPE HTML>
<html>
   <head>
      <title> Rajeiha Library </title> 
	  <link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   <body>
       <div id="container">
	      <div id="header">
		      <h1>E-Library management system </h1>
		</div>
        <div id="wrapper">
           <h3 id="heading"> Welcome Admin</h3>
            <div id="center">
               <ul class="record">
                  <li> Total Students : <?php echo countRecord("select * from student",$db); ?></li>
                   <li> Total Books   : <?php echo countRecord("select * from Book",$db); ?></li>
                   <li> Total Request : <?php echo countRecord("select * from Request",$db); ?></li>
                   <li> Total comments: <?php echo countRecord("select * from comment",$db); ?></li>
                
                </ul>   
           </div>
              
		</div>
        <div id="navi">
           <?php 
              include "adminsideHome.php";
            ?>
        </div>
        <div id="footer">
            <p>Copyright &copy;Rajeiha 2019	</p>
        </div>			
   </body>
</html>