<?php session_start();
 if($_SESSION['acc'] == NULL)
 	header("Location: logincustomer.php");	
 else
 {
 include("homec.php");
 ?>
    <form method="post"><br>
		<center><h1>LAST LOGIN DETAILS</h1>
<?php
$id = $_SESSION['acc'];
echo "Account Number: $id<br>";
$db_link = mysql_connect("localhost","root","");
mysql_select_db("ebanking");
$bal_result = mysql_query("select * from customer where accno=$id");
while($row = mysql_fetch_array($bal_result))
{
	$name = $row['name'];
	$lastlog = $row['lastlog'];
	$ip = $row['ipaddr'];
}
echo "<table border=1><tr><th>Name</th><th>Date and Time</th><th>IP Address</th></tr>";
echo "<tr><td>$name</td><td>$lastlog</td><td>$ip</td></tr></table>";
mysql_close($db_link);
}
?>
</center>
	 
</form>
 </body>
</html>