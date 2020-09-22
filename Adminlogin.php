<?PHP
session_start();
INCLUDE "database.php";
?>
<!DOCTYPE HTML>
<html>
   <head>
      <title> Rajeiha Library</title> 
	  <link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   <body>
       <div id="container">
	      <div id="header">
		      <h1>E-Library management system </h1>
		</div>
        <div id="wrapper">
           <h3 id="heading"> Admin Login Here</h3>
            <div id="center">
                <?php
                if(isset($_POST["submit"]))
                {
                   $sql="SELECT * FROM admin where aname=
                  '{$_POST["aname"]}' and apass= '{$_POST["apass"]}'";
                    $res=$db->query($sql);
                    if($res->num_rows>0)
                       {
                          $row=$res->fetch_assoc();
                          $_SESSION["AID"]=$row["AID"];
                          $_SESSION["ANAME"]=$row["ANAME"];
                          header("location:Adminhome.php");
                       }
                      else
                      {
                          echo "<p class='error'>Invalid User Details</p>";
                      }
                 
                }
                ?>
            <form action="Adminlogin.php" method="post">
                <label> Name</label>
                <input type="text" name="aname" required>
                <label> Password</label>
                <input type="password" name="apass" required>
                <button type="submit" name="submit">Login Now</button>
            </form>
           </div>
              
		</div>
        <div id="navi">
           <?php 
              include "sideHome.php";
            ?>
        </div>
        <div id="footer">
            <p>Copyright &copy;Rajeiha 2019	</p>
        </div>			
   </body>
</html>