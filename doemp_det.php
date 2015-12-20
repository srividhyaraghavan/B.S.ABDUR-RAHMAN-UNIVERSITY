<?php
session_start();
include("homea.php");

echo "<center><u><h3>EMPLOYEE DETAILS</h3></u>";

$db_link = mysql_connect("localhost","root","");
$select_db = mysql_select_db("ebanking");

$get_query = "select * from employee";
$result = mysql_query($get_query) or die("Could not Execute");

echo "<table border = 2>";
echo "<tr><th>EmpNo<th>Name<th>Date of Birth<th>Date of Join<th>Gender<th>Address<th>MobileNo<th>E-Mail<th>Salary</tr>";
while($row = mysql_fetch_array($result))
    {
	echo "<tr><td>".$row[0]."<td>".$row[1]."<td>".$row[2]."<td>".$row[4]."<td>".$row[3]."<td>".$row[5]."<td>".$row[6]."<td>".$row[8]."<td>".$row[9]."</tr>";
    }
echo "</table></center>";
mysql_close($db_link);

?>
<html><body><center><a href = 'javascript:window.print()'><img src='printButton.jpg' width="147" height="39"/></a></center></body></html>