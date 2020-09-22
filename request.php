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
           <h3 id="heading"> New Book Request</h3>
            <div id="center">
                <?php
                if(isset($_POST["submit"]))
                {
                    $sql="insert into request (ID,MES,LOGS) values({$_SESSION["ID"]},'{$_POST["mess"]}',now())"; 
                    $db->query($sql);
                    
                        echo "<p class='success'>Request send to Admin</p>";
                  
                }
                ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                 
                <label>message</label>
                <textarea required name="mess"></textarea> 
                <button type="submit" name="submit">send message </button>
            </form>
            </div>
		</div>
        <div id="navi">
           <?php 
              include "usersideHome.php";
            ?>
        </div>
        <div id="footer">
            <p>Copyright &copy;Rajeiha 2019</p>
        </div>			
   </body>
</html>