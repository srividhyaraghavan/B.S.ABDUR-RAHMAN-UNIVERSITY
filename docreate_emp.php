<?php 
session_start();
?>
<?php
include("homea.php"); 
$empid = $_SESSION['emp'];
if($empid=="admin")
{
	$empno = $_POST['n0'];
	$name = $_POST['n1'];
	$dob = $_POST['n2'];
	$gender = $_POST['n6'];
	$cur_date = date("Y-m-d");
	$address = $_POST['n4'];
	$mobileno = $_POST['n5'];
	$str = strtolower($name);
	$loginpw = $str.'tamil'.date("s");
	$email = $_POST['n3'];
	$totsalary = $_POST['n7'];
	$branch = $_POST['n9'];
	
	$db_link = mysql_connect("localhost","root","");
	$select_db = mysql_select_db("ebanking");
	
	if(($cur_date-$dob)>=18)
	{		
		$query1 = "insert into employee values($empno,'$name','$dob','$gender','$cur_date','$address',$mobileno,'$loginpw','$email',$totsalary,$branch)";	
		$emp_table = mysql_query($query1);
		if(mysql_affected_rows()==1)
		{
			echo "<center><h2><br><u><b>Login Information</b></u>";
			echo "<br>Login Employee Number: $empno";
			echo "<br>Your Password is: $loginpw";
			echo "<br>Employee Details Inserted</h2></center>";
		}
		else
			echo "<br>Employee Details Not Inserted";
	}
	else
		echo "Cannot join the bank if age is less than 18";
	mysql_close($db_link);
}
else
	echo "<br><br><center><h2>Only Administrator has Access here<br>You Cannot Admit an Employee</h2></center>";
?>
