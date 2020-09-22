<?php
session_start();
INCLUDE "database.php";

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
           <h3 id="heading"> Change password</h3>
            <div id="center">
                <?php
                if(isset($_POST["submit"]))
                {
                    $sql="SELECT * from admin where apass='{$_POST["opass"]}' and AID='{$_SESSION["AID"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                       $s="update admin set APASS='{$_POST["npass"]}'where AID=".$_SESSION["AID"];
                        $db->query($s);
                        echo "<p class='success'>Password Changed Success</p>";
                    }
                    else
                    {
                        echo "<p class='error'>Invalid Password</p>";
                    }
                }
                ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                 <label>old password</label>
                <input type="password" name="opass" required>
                <label>new password</label>
                <input type="password" name="npass" required>
                <button type="submit" name="submit">update password </button>
            </form>
            </div>
		</div>
        <div id="navi">
           <?php 
              include "adminsideHome.php";
            ?>
        </div>
        <div id="footer">
            <p>Copyright &copy;Rajeiha 2019</p>
        </div>			
   </body>
</html>