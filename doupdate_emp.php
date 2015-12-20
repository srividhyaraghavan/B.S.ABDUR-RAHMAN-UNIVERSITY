<?php session_start(); ?>
<?php
include("homea.php");
$empid = $_SESSION['emp'];
if($empid=="admin")
{
	mysql_connect("localhost","root","")or die("Failed to connect MySQL");
	mysql_select_db("ebanking");

	$cur_date = date("Y-m-d");
	$id = $_POST['empno'];
	
	if($_POST['showemp'])
	{
		echo "<br>Given Employee is:".$id."<br>" ;
		$query = "select *from employee where empno = '$id'";
		$emp_table = mysql_query($query);
	
		if($emp_table)
			echo "Employee Details Retrieved<br>";
		else
			echo "Employee Details Retrieved<br>";
	
		echo "Number of Rows:".mysql_num_rows($emp_table)."<br><br>";
		$i = 1;
		while($row = mysql_fetch_array($emp_table))
		{
			echo "<input type='hidden' name='n0' value=".$row[0]."><br>";
			echo "Name:      <input type='text' name='n1' value=".$row[1]."><br>";
			echo "Address:   <input type='text' name='n2' value=".$row[5]."><br>";
			echo "Date of Birth:      <input type='text' name='n3' value=".$row[2]."><br>";
			echo "Mobile No: <input type='text' name='n4' value=".$row[6]."><br>";
			echo "Total Salary:       <input type='text' name='n5' value=".$row[9]."><br>";
			echo "E-Mail:       <input type='text' name='n6' value=".$row[8]."><br>";
			echo "Branch Number:       <input type='text' name='n7' value=".$row[10]."><br>";
			echo "<input type='submit' name='update' value='UPDATE'><br>";
		$i++;
		}
	}
	else if($_POST['update'])
	{
		$empno = $_POST['n0'];
		$name = $_POST['n1'];
		$address = $_POST['n2'];
		$d = $_POST['n3'];
		if(($cur_date-$d)>=18)
			$dob = $_POST['n3'];
		else
			echo "<br>Date of Birth cannot be less than 18<br>";
			
		$mobileno = $_POST['n4'];
		$salary = $_POST['n5'];
		$email = $_POST['n6'];
		$branch = $_POST['n7'];
	
		echo "Selected Employee Number:".$empno."<br>";
	
		$query1 = "update employee set empname='$name',address='$address',dob='$dob',phoneno=$mobileno,totsalary=$salary,email='$email',brno=$branch where empno=$empno;";
		$emp_table = mysql_query($query1);
	
		if($emp_table)
			echo "<br>Details Stored<br>";
		else
			echo "Details Not Stored<br>";
	
		if(mysql_affected_rows()==1)
		echo "Rows Updated<br>";
		else
		echo "Rows Not Updated";
	mysql_close($db_link);
	}
}
else
	echo "<br><br><center><h2>Only Administrator has Access here<br>You Cannot Update Details of an Employee</h2></center>";
?>