<?php
include("homea.php");
if($_POST['b1'])
{
$date1 = $_POST['t1'];
$date2 = $_POST['t2'];
$id = $_POST['accno'];
$cur_date = date("Y-m-d");

echo "<center><u><h3>Statement of $id from $date1 to $date2</h3></u><br>";

$db_link = mysql_connect("localhost","root","");

$db_name = "ebanking";
$select_db = mysql_select_db($db_name);

$get_query = "select * from transaction where accno=$id and datet between '$date1' and '$date2' order by datet;";
$date_result = mysql_query($get_query) or die("Could not Execute");

echo "<table border = 2>";
echo "<tr><th>AccountNo<th>TransactionType<th>Date<th>Amount</tr>";
while($row = mysql_fetch_array($date_result))
    {
	echo "<tr><td>".$row[1]."<td>".$row[2]."<td>".$row[3]."<td>".$row[4]."</tr>";
    }
echo "</table>";
mysql_close($db_link);
}
?>

<html><body><center>
<a href = 'javascript:window.print()'><img src='printButton.jpg' width="137" height="42"/></a>
</center></body></html>