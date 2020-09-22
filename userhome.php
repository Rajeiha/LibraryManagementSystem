<?php
session_start();
INCLUDE "database.php";

if(!isset($_SESSION["ID"]))
{
    header("location:userlogin.php");
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
           <h3 id="heading"> Welcome  <?php echo $_SESSION["NAME"];?></h3>
            
        
        </div>
        <div id="navi">
           <?php 
              include "UsersideHome.php";
            ?>
        </div>
        <div id="footer">
            <p>Copyright &copy;Rajeiha 2019	</p>
        </div>			
   </body>
</html>