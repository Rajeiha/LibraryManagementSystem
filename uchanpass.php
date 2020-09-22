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
           <h3 id="heading"> Change password</h3>
            <div id="center">
                <?php
                if(isset($_POST["submit"]))
                {
                    $sql="SELECT * from student where pass='{$_POST["opass"]}' and ID='{$_SESSION["ID"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                    {
                       $s="update student set PASS='{$_POST["npass"]}'where ID=".$_SESSION["ID"];
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
              include "usersideHome.php";
            ?>
        </div>
        <div id="footer">
            <p>Copyright &copy;Rajeiha 2019	</p>
        </div>			
   </body>
</html>