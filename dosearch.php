<?php session_start(); ?>
<?php
include("homea.php");

$db_link = mysql_connect("localhost","root"," ")or die("Failed to connect MySQL");
mysql_select_db("ebanking");

$id = $_POST['accno'];
if($_POST['searchacc'])
{
	echo "<br><br><center><strong>Entered Account Number is:</strong>".$id;
	$query = "select *from customer where accno = $id";
	$acc_table = mysql_query($query);
	//echo "Number of Rows:".mysql_num_rows($emp_table)."<br><br>";
	while($row = mysql_fetch_array($acc_table))
	{
		echo "<b><table border=2><td>Name:</td><td>".$row[1]."</td></tr>";
		echo "<tr><td>Account Type:</td><td>".$row[2]."</td></tr>";
		echo "<tr><td>Last Login:</td><td>".$row[3]."</td></tr>";
		echo "<tr><td>Date of Birth:</td><td>".$row[5]."</td></tr>";
		echo "<tr><td>Address:</td><td>".$row[6]."</td></tr>";
		echo "<tr><td>Mobile No:</td><td>".$row[7]."</td></tr>";
		echo "<tr><td>Gender:</td><td>".$row[8]."</td></tr>";
		echo "<tr><td>E-Mail:</td><td>".$row[12]."</td></tr>";
		echo "<tr><td>Employee Number:</td><td>".$row[13]."</td></tr>";
		echo "<tr><td>Branch Name:</td><td>".$row[14]."</td></tr></table></b></center>";
	}
mysql_close($db_link);
}
?>
<html><body><center><a href = 'javascript:window.print()'><img src='printButton.jpg' width="147" height="39"/></a></center></body></html>