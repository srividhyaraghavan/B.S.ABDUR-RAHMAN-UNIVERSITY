<?php 
session_start();
?>
<?php
include("homea.php");
$id = $_POST['empno'];
$empid = $_SESSION['emp'];
if($empid=="admin")
{
	mysql_connect("localhost","root","")or die("Cannot connect to MySql");
	mysql_select_db("ebanking");
	
	$query = "delete from employee where empno='$id'";
	$employee_table = mysql_query($query);
	
	if(mysql_affected_rows()==1)
		echo "Employee Details are Deleted<br>";
	else
		echo "Employee Details not Deleted";
	
	mysql_close();
}
else
	echo "<br><br><center><h2>Only Administrator has Access here<br>You Cannot Delete an Employee</h2></center>";
?>
