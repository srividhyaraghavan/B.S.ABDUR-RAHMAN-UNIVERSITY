<?php session_start();
?>
<?php
include("homea.php"); 
error_reporting(0);
?>
<html>
    <body>
        <center>
         <br><br><h1>MODIFICATION OF EMPLOYEE </h1>
        <br>
    <form method="post">
         <strong>Employee Number</strong>
         <input type="text" name="empno" size="25"><br>
         <input type="submit" name="showemp" value="SHOW DETAILS">
         <input type="reset" value="CLEAR">
<?php session_start(); ?>
<?php
$empid = $_SESSION['emp'];
if($empid=="admin")
{
	mysql_connect("localhost","root","")or die("Failed to connect MySQL");
	mysql_select_db("ebanking");

	$cur_date = date("Y-m-d");
	$id = $_POST['empno'];
	
	if($_POST['showemp'])
	{
		echo "<br>Given Employee Number is:".$id."<br>" ;
		$query = "select *from employee where empno = '$id'";
		$emp_table = mysql_query($query);
	
		if($emp_table)
			echo "Employee Details Retrieved<br>";
		else
			echo "Employee Details Retrieved<br>";
	
		$i = 1;
		while($row = mysql_fetch_array($emp_table))
		{
			echo "<b><table border=2><input type='hidden' name='n0' value=".$row[0]."><br>";
			echo "<tr><td>Name:      </td><td><input type='text' name='n1' value=".$row[1]."></td></tr>";
			echo "<tr><td>Address:   </td><td><input type='text' name='n2' value=".$row[5]."></td></tr>";
			echo "<tr><td>Date of Birth:      </td><td><input type='text' name='n3' value=".$row[2]."></td></tr>";
			echo "<tr><td>Mobile No: </td><td><input type='text' name='n4' value=".$row[6]."></td></tr>";
			echo "<tr><td>Total Salary:       </td><td><input type='text' name='n5' value=".$row[9]."></td></tr>";
			echo "<tr><td>E-Mail:       </td><td><input type='text' name='n6' value=".$row[8]."></td></tr>";
			echo "<tr><td>Branch Number:       </td><td><input type='text' name='n7' value=".$row[10]."></td></tr>";
			echo "<tr><td colspan=2><center><input type='submit' name='update' value='UPDATE'></center></td></tr></table></b>";
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
	
		echo "<br><br>Selected Employee Number:".$empno."<br>";
	
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
</form>
</center>
</body>
</html>
