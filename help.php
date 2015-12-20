<html>
<body>
<center>

<?php 
//session_start();
error_reporting(0);
include("homec.php");
$id = $_SESSION['acc'];
echo "<br><h1><u>HELP DESK</u></h1>Account Number: $id<br>";
$db_link = mysql_connect("localhost","root","");
mysql_select_db("ebanking");
$bal_result = mysql_query("select * from customer where accno=$id");
while($row = mysql_fetch_array($bal_result))
{
	$name = $row['name'];
}
echo "<h3>WELCOME $name</h3><br>";
mysql_close($db_link);
?>

<form method="post">
<table>
<tr><td rowspan="3"><img src="d.jpg" width="250" height="200"></td>
<td><p><a href="UsingInternetBanking.doc">Internet Banking User's Manual</a></p>
  <p>&nbsp;</p></td></tr>
<tr><td><a href="DosandDonts.doc">Do's and Dont's</a></td></tr>
<tr><td><a href="IdentifyProtectfromfraud.doc">Identify & Protect from fraud</a></td></tr>
</table>	 
</form>
</center>
</body>
</html>