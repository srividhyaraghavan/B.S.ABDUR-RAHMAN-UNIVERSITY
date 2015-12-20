<?php 
session_start();
?>
<?php
	include("homea.php"); 
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
			echo "<input type='hidden' name='n0' value=".$row[0]."><br>";
			echo "Name:      <input type='text' name='n1' value=".$row[1]."><br>";
			echo "Address:   <input type='text' name='n2' size=35 value=".$row[6]."><br>";
			echo "Date of Birth:      <input type='text' name='n3' value=".$row[5]."><br>";
			echo "Mobile No: <input type='text' name='n4' value=".$row[7]."><br>";
			echo "Gender:       <input type='text' name='n5' value=".$row[8]."><br>";
			echo "E-Mail:       <input type='text' name='n6' value=".$row[12]."><br>";
			echo "Branch Name:       <input type='text' name='n7' value=".$row[14]."><br>";
			echo "<input type='submit' name='update' value='UPDATE'><br>";
		$i++;
		echo "$i";
		}
	}
	else if($_POST['update'])
	{
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