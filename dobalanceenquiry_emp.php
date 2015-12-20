<?php
include("homea.php");
if($_POST['accno'])
{
$id = $_POST['accno'];
echo "<h3>Account number is: $id</h3>";

$db_link = mysql_connect("localhost","root","");
$select_db = mysql_select_db("ebanking");

$get_query = "select balance from account where accno=$id";
$bal_result = mysql_query($get_query);
while($row = mysql_fetch_array($bal_result))
    {
	$bal = $row['balance'];
    }
echo "<h2>Available Balance in Rupees: $bal</h2><br>";

mysql_close($db_link);
}
?>