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
           <h3 id="heading"> View Book Details</h3>
            <?php
              $sql="SELECT * FROM Book";
              $res=$db->query($sql);
            if($res->num_rows>0)
            {
               echo "<table>
               <tr> 
                  <th>SNO</th>
                  <th>BOOK NAME</th>
                  <th>KEYWORDS</th>
                  <th>VIEW</th>
               </tr>
                  ";
                $i=0;
                while($row=$res->fetch_assoc())
                {
                    $i++;
                    echo"<tr>";
                    echo"<td>{$i}</td>";
                    echo"<td>{$row["BTITLE"]}</td>";
                    echo"<td>{$row["KEYWORDS"]}</td>";
                    echo"<td><a href='{$row["FILE"]}'targrt='_blank'>View</a></td>";
                    echo"</tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<p class='error'>No books Records Found</p>";
            }
    
          ?>  
              
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