<?php 
session_start();
?>

<?php
if($_POST['uname'])
{
	$id = $_POST['uname'];
	$pwd = $_POST['pwd']; 

	$db_link = mysql_connect("localhost","root","");
	mysql_select_db("ebanking");

	$get_query = "select count(*) from employee where empno='$id' and emppass='$pwd'";
	$emp_result = mysql_query($get_query);
	
	while($row = mysql_fetch_array($emp_result))
	{
		$emp_result1 = $row[0];;
	}
	
	if($emp_result1 == 1)
	{
		$_SESSION['emp'] = $id;
		echo "<script>alert('EmployeeNumber/Password Correct');</script>";
		header("Location:homea.php");	
	}
	else
	{
		include("logina.php");
		echo "<script>alert('EmployeeNumber/Password Maybe Wrong');</script>";
	}
	
	/*while($row = mysql_fetch_array($emp_result))
	{
		$pw = $row['emppass'];
		if($pw === $pwd)
		{
			$_SESSION['emp'] = $id;
			header("Location:homea.php");	
		}   
		else
			header("Location:logina.php");
	}*/
	mysql_close($db_link);
}
else
{
	include("logina.php");
	echo "<script>alert('EmployeeNumber/Password Cannot be Null');</script>";
}
?>