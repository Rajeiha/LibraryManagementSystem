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
           <h3 id="heading"> View Request Details</h3>
            <?php
              $sql="SELECT student.name,request.mes,request.LOGS FROM student inner join request on student.id=request.id";
              $res=$db->query($sql);
            if($res->num_rows>0)
            {
               echo "<table>
               <tr>
                  <th>SNO</th>
                  <th>NAME</th>
                  <th>MESSAGE</th>
                  <th>LOGS</th>
               </tr>
                  ";
                $i=0;
                while($row=$res->fetch_assoc())
                {
                    $i++;
                    echo"<tr>";
                    echo"<td>{$i}</td>";
                    echo"<td>{$row["name"]}</td>";
                    echo"<td>{$row["mes"]}</td>";
                    echo"<td>{$row["LOGS"]}</td>";
                    echo"</tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<p class='error'>No Request Records Found</p>";
            }
    
          ?>  
              
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