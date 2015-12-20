<?php
session_start();
include("homea.php");

echo "<br><br><center><u><h3>CURRENT ACCOUNT HOLDERS</h3></u><br>";

$db_link = mysql_connect("localhost","root","");
$select_db = mysql_select_db("ebanking");

$get_query = "select * from customer where acctype='Savings'";
$result = mysql_query($get_query) or die("Could not Execute");

echo "<table border = 2>";
echo "<tr><th>AccountNo<th>Name<th>Date of Birth<th>Gender<th>Address<th>MobileNo<th>E-Mail</tr>";
while($row = mysql_fetch_array($result))
    {
	echo "<tr><td>".$row[0]."<td>".$row[1]."<td>".$row[5]."<td>".$row[8]."<td>".$row[6]."<td>".$row[7]."<td>".$row[12]."</tr>";
    }
echo "</table></center>";
mysql_close($db_link);

?>
<html><body><center><a href = 'javascript:window.print()'><img src='printButton.jpg' width="147" height="39"/></a></center></body></html>