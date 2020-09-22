<?php

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
           <h3 id="heading">New user Registration</h3>
            <div id="center">
                <?php
                if(isset($_POST["submit"]))
                {
                   
                      $sql="insert into student(NAME,PASS,MAIL,DEP) values('{$_POST["name"]}','{$_POST["pass"]}','{$_POST["email"]}','{$_POST["dep"]}')";
                      $db->query($sql);
                        echo "<p class='success'>User Registration success</p>";
                        
                    
                }
                ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" >
                 <label>Name</label>
                <input type="text" name="name" required>
                <label>password</label>
                <input type="password" name="pass" required>
                <label>Email ID</label>
                <input type="email" name="email" required>
                <select name="dep" required>
                    <option value=""> Select</option>
                     <option value="SE"> SE</option>
                     <option value="BCA"> BCA</option>
                     <option value="MIT"> MIT</option>
                     <option value="Physics">physics</option>
                     <option value="OTHERS"> OTHERS</option>
                
                </select>
                <button type="submit" name="submit">Register Now </button>
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