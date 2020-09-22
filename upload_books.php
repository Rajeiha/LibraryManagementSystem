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
           <h3 id="heading">Upload Books</h3>
            <div id="center">
                <?php
                if(isset($_POST["submit"]))
                {
                   $target_dir="upload/";
                   $target_file=$target_dir.basename($_FILES["efile"]["name"]);
                    if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
                    {
                      $sql="insert into book(BTITLE,KEYWORDS ,FILE)values('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
                    $db->query($sql);
                        echo "<p class='success'>Book Uploaded success</p>";
                        
                    }
                    else
                    {
                        echo "<p class='Error'> in Upload</p>";
                    }
                }
                ?>
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" enctype="multipart/form-data">
                 <label>Book Title</label>
                <input type="text" name="bname" required>
                <label>Keyword</label>
                <textarea name="keys" required></textarea>
                <label>Upload File</label>
                <input type="file" name="efile" required >
                <button type="submit" name="submit">upload Book </button>
            </form>
            </div>
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