<?php session_start(); ?>
<?php
include("homea.php");
$empid = $_SESSION['emp'];
if($empid=="admin")
{
	$db_link = mysql_connect("localhost","root","")or die("Failed to connect MySQL");
	mysql_select_db("ebanking");

	$id = $_POST['empno'];
	
	if($_POST['searchemp'])
	{
		echo "<center><strong>Entered Employee id is:</strong>".$id;
		$query = "select *from employee where empno = '$id'";
		$emp_table = mysql_query($query);
		//echo "Number of Rows:".mysql_num_rows($emp_table)."<br><br>";
		while($row = mysql_fetch_array($emp_table))
		{
			echo "<b><table border=2><td>Name:</td><td>".$row[1]."</td></tr>";
			echo "<tr><td>Address:</td><td>".$row[5]."</td></tr>";
			echo "<tr><td>Date of Birth:</td><td>".$row[2]."</td></tr>";
			echo "<tr><td>Date of Join:</td><td>".$row[4]."</td></tr>";
			echo "<tr><td>Gender:</td><td>".$row[3]."</td></tr>";
			echo "<tr><td>Mobile No:</td><td>".$row[6]."</td></tr>";
			echo "<tr><td>Total Salary:</td><td>".$row[9]."</td></tr>";
			echo "<tr><td>E-Mail:</td><td>".$row[8]."</td></tr>";
			echo "<tr><td>Branch Number:</td><td>".$row[10]."</td></tr></table></b></center>";
		}
	}
mysql_close($db_link);
}
else
	echo "<br><br><center><h2>Only Administrator has Access here<br>You Cannot Search Details of an Employee</h2></center>";
?>