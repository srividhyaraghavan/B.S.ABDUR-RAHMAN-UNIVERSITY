<?php
session_start();
include("homec.php");
$id = $_SESSION['acc'];
$cur_date = date("Y-m-d");
$date1 = $_POST['t1'];
$date2 = $_POST['t2'];

if(($date1>2000)&&($date2>2000)&&($date1<=$cur_date)&&($date2<=$cur_date)&&($date2>$date1))
{
echo "<center><u><b>Statement of $id from $date1 to $date2</b></u><br>";

$db_link = mysql_connect("localhost","root","");
$select_db = mysql_select_db("ebanking");

$get_query = "select * from transaction where accno=$id and datet between '$date1' and '$date2' order by datet;";
$date_result = mysql_query($get_query) or die("Could not Execute");

echo "<table border = 2>";
echo "<tr><th>AccountNo<th>TransactionType<th>Date<th>Amount<th>Balance</tr>";
while($row = mysql_fetch_array($date_result))
    {
	echo "<tr><td>".$row[0]."<td>".$row[1]."<td>".$row[2]."<td>".$row[3]."<td>".$row[4]."</tr>";
    }
echo "</table></center>";
mysql_close($db_link);
}
else if(($date1>$cur_date)||($date2>$cur_date))
	echo "Date cannot be greater than today's date";
else if($date2<$date1)
	echo "End Date cannot be less than Start Date";
else
	echo "Sorry Invalid Date..";
?>
<html><body><center><a href = 'javascript:window.print()'><img src='printButton.jpg' width="147" height="39"/></a></center></body></html>