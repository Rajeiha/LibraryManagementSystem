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
           <h3 id="heading"> Search Book </h3>
            <div id="center">
                <?php
                if(isset($_POST["submit"]))
                {
                   
                }
                ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                 
                <label>Enter Book name or keywords</label>
                <input type="text"  required name="name"> 
                <button type="submit" name="submit">Search Now </button>
            </form>
            </div>
             <?php
            if(isset($_POST["submit"]))
            {
               $sql="SELECT * FROM Book where BTITLE liKe '%{$_POST["name"]}%' or keywords like '%{$_POST["name"]}%'";
              $res=$db->query($sql);
            if($res->num_rows>0)
            {
               echo "<table>
               <tr> 
                  <th>SNO</th>
                  <th>BOOK NAME</th>
                  <th>KEYWORDS</th>
                  <th>VIEW</th>
                  <th>COMMENT</th>
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
                    echo"<td><a href='comment.php?id={$row["BID"]}'>GO</a> </td>";
                    echo"</tr>";
                }
                echo "</table>";
            }
            else
            {
                echo "<p class='error'>No books Records Found</p>";
            }
            }
    
          ?>  
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