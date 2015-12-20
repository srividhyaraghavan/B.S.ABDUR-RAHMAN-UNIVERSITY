<?php 
include("homea.php"); 
error_reporting(0);
?>
<html>
    <body>
        <center><h1>&nbsp;</h1>
          <h1><u>MODIFICATION OF ACCOUNT</u></h1>
    
        <br>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		
			 <p>Enter Account Number
	      <input type="text" name="accno" size="25">
		  </p>
			 <p>			        <br>
			   <input type="submit" name="showacc" value="SHOW DETAILS">
			   <input type="reset" value="CLEAR">
	         </p>
<?php
echo "<center>";
$db_link = mysql_connect("localhost","root","");

$db_name = "ebanking";
$select_db = mysql_select_db($db_name);


$id = $_POST['accno'];

if($_POST['showacc'])
{
	echo "<br><u>Selected Account Number is:".$id."</u><br></center>" ;
	$query = "select *from customer where accno = $id";
	$cust_table = mysql_query($query);

	$i = 1;
	while($row = mysql_fetch_array($cust_table))
	{
		echo "<b><table border=2><input type='hidden' name='n0' value=".$row[0]."><br>";
		echo "<tr><td>Name:</td><td>      <input type='text' name='n1' size=28 value=".$row[1]."></td></tr>";
		echo "<tr><td>Address:   </td><td><input type='text' name='n2' size=28 value=".$row[6]."></td></tr>";
		echo "<tr><td>Date of Birth:      </td><td><input type='text' name='n3' size=28 value=".$row[5]."><br></td></tr>";
		echo "<tr><td>Mobile No:</td><td> <input type='text' name='n4' size=28 value=".$row[7]."></td></tr>";
		echo "<tr><td>Gender:</td><td>       <input type='text' name='n5' size=28 value=".$row[8]."></td></tr>";
		echo "<tr><td>E-Mail:</td><td>       <input type='text' name='n6' size=28 value=".$row[12]."></td></tr>";
		echo "<tr><td>Branch Name:</td><td>       <input type='text' name='n7' size=28 value=".$row[14]."></td></tr>";
		echo "<tr><td colspan=2><center><input type='submit' name='update' value='UPDATE'></center></td></tr></table></b>";
	$i++;
	}
}
else if($_POST['update'])
{
	$cur_date = date("Y-m-d");
	$acc = $_POST['n0'];
	$name = $_POST['n1'];
	$address = $_POST['n2'];
	$d = $_POST['n3'];
	if(($cur_date-$d)>=18)
		$dob = $_POST['n3'];
	else
		echo "<br>Date of Birth cannot be less than 18<br>";
		
	$mobileno = $_POST['n4'];
	$gender = $_POST['n5'];
	$email = $_POST['n6'];
	$branch = $_POST['n7'];

	echo "Selected Account Number:".$acc;

	$query1 = "update customer set name='$name',address='$address',dob='$dob',phoneno=$mobileno,gender='$gender',email='$email',brname='$branch' where accno=$acc;";
	$cust_table = mysql_query($query1);

	if($cust_table)
		echo "<br>Details Updated.. Thank You<br>";
	else
		echo "Details Not Updated.. Sorry<br>";
mysql_close($db_link);
}
?>
		</form>
		</center>
</body>
</html>
