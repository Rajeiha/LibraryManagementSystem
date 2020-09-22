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
           <h3 id="heading"> Send your comment </h3>
               <?php 
            if(isset($_POST["submit"]))
        {
            $sql="insert into comment(BID,SID,COMM,LOGS) values ({$_GET["id"]},{$_SESSION["ID"]},'{$_POST["comm"]}',now())  ";
            $db->query($sql);

        }
                $sql="SELECT * from BOOK where BID=".$_GET["ID"];
                $res=$db->query($sql);
                if($res->num_rows>0)
                {
                   echo "<table>";
                    $row=$res->fetch_assoc();
                    echo"
                    <tr>
                      <th>book name</th>
                      <td>{$row["BTITLE"]}</td>
                      </tr>
                    <tr>
                      <th>keywords</th>
                      <td>{$row["KEYWORDS"]}</td>
                    </tr>
                      ";
                    echo "</table>";
                }
                else
                {
                  echo "<p class='error'>No books found</p>";  
                }
                ?>
                <div id="center">
                    <form>
                    <label>Your comments</label>
                    <textarea name="mes" required></textarea>
                    <button type="submit" name="submit">Post Now </button>
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