<?php session_start(); ?>
<?php
include("homea.php");
$db_link = mysql_connect("localhost","root","");
mysql_select_db("ebanking");
$id = $_POST['accno'];
echo "Selected Account Number is:$id<br>";

$query = "delete from customer where accno = $id";
$cust_delete = mysql_query($query);
if(mysql_affected_rows()==1)
	echo "<html><body><center><h2>Customer Table Details Deleted</h2></center><br>";
else
	echo "Customer Table Details not Deleted<br>";

$query1 = "delete from account where accno=$id";
$acc_delete = mysql_query($query1);
if($acc_delete)
	echo "<center><h2>Account Number $id Details Deleted</h2></center></body></html>";
else
	echo "Account Table Details not Deleted";
	
mysql_close($db_link);
?>