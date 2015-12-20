<?php 
session_start();
?>
<?php

include("homea.php");
$empid = $_SESSION['emp'];
if($empid=="admin")
{
 ?>
        <form method="post" action="dosearch_emp.php">
		<br/>
		<br/>
        <center>
		<h1>ADMINISTRATOR OPTIONS => EMPLOYEE</h1>
		<p><strong>Employee Number:</strong><input type="text" size="20" name="empno"><br><br>
		<input type="submit" value="SEARCH" name="searchemp"></p>
		<p><a href="doemp_det.php"><img src="employees.jpg"> </a></p>
		<p>
		    <a href="create_emp.php"><img src="button66.jpg"> </a>
		    <a href="update_emp.php"><img src="button42.jpg"></a>
		    <a href="delete_emp.php"><img src="button47.jpg" width="142"></a>
		  </p>
        </center>
        </form>
<?php
}
else
	echo "<br><br><br><center><h2>Sorry...Access granted only for Administrator</h2></center>";
?>
   </body>
   </html>