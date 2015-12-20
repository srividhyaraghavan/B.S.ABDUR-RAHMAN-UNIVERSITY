<?php
   session_start();
?>
 <?php

 if($_SESSION['acc'] == NULL)
 	header("Location: logincustomer.php");	
 else
 {
 include("homec.php");
 ?>
    <form method="post">
	<center><br><br>
	<h1>BALANCE ENQUIRY</h1>
	<table bgcolor="#00FFFF" border="2">
		<center>
        <tr><td><b>BALANCE</b></td><td><b>AVAILABLE</b></td></tr> 

<?php
$db_link = mysql_connect("localhost","root","");
$select_db = mysql_select_db("ebanking");
$id = $_SESSION['acc'];
$get_query = "select * from account where accno=$id";
$bal_result = mysql_query($get_query);
while($row = mysql_fetch_array($bal_result))
    {
	$bal = $row['balance'];
	$acctype = $row['acctype'];
    }
echo "<br>Account number: $id<br>";
echo "Account Type: $acctype<br><br>";
 
       $myfile = 'receipt.doc';
       $handle = fopen($myfile,'w');
	   $h="Account number: $id || Account Type: $acctype || balance: $bal";
       fwrite($handle,$h);
      
mysql_close($db_link);
}
?>

<tr><td>Amount:</td><td><?php echo "$bal Rupees";?></td></tr></table>
<table>
<td><p><a href="receipt.doc">print your receipt</a></p></td>
</table>	 
</center>
</form>
</body>
</html>