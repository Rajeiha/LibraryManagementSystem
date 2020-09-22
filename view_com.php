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
      <title>Rajeiha Library </title> 
	  <link rel="stylesheet" type="text/css" href="css/style.css">
   </head>
   <body>
       <div id="container">
	      <div id="header">
		      <h1>E-Library management system </h1>
		</div>
        <div id="wrapper">
           <h3 id="heading"> View Comment Details</h3>
            <?php
              $sql="SELECT book.btitle,student.NAME,comment.comm,comment.LOGS FROM comment inner JOIN book on book.bid=comment.BID inner join student on comment.sid=student.id ";
              $res=$db->query($sql);
            if($res->num_rows>0)
            {
               echo "<table>
               <tr>
                  <th>SNO</th>
                  <th>BOOK</th>
                  <th>NAME</th>
                  <th>COMMENT</th>
                  <th>LOGS</th>
               </tr>
                  ";
                $i=0;
                while($row=$res->fetch_assoc())
                {
                    $i++;
                    echo"<tr>";
                    echo"<td>{$i}</td>";
                    echo"<td>{$row["btitle"]}</td>";
                    echo"<td>{$row["NAME"]}</td>";
                    echo"<td>{$row["comm"]}</td>";
                    echo"<td>{$row["LOGS"]}</td>";
                    echo"</tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<p class='error'>No comments Records Found</p>";
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