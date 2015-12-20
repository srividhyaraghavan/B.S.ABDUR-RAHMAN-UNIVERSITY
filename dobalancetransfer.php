<html><body>
<?php
session_start(true);
?>
<?php
include("homec.php");
$id = $_SESSION['acc'];
$id1 = $_POST['accno1'];
if((intval($id1))&&($id!=$id1))
{
	$amt = $_POST['amount'];
	$j=0;
	$cur_date = date("Y-m-d");
	
	$db_link = mysql_connect("localhost","root","");
	mysql_select_db("ebanking");
	
	$query = "select status from transactionx where accno=$id";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		$status = $row['status'];
	}
	
	$query1 = "select status from transactionx where accno=$id1";
	$result1 = mysql_query($query1);
	
	while($row1 = mysql_fetch_array($result1))
	{
		$status1 = $row1['status'];
	}
	
	if($status1 == "Released")
	{
		if($status == "Released")
		{
			echo "My Account  Number is: $id<br>";
			echo "Party's Account number is: $id1<br>";
			echo "Entered Amount to be Transfered is: $amt<br>";
			
			$get_query = "select balance from account where accno=$id";
			$bal_result = mysql_query($get_query);
			while($row = mysql_fetch_array($bal_result))
			{
				$bal = $row['balance'];
			}
			
			$get_query1 = "select balance from account where accno=$id1";
			$bal_result1 = mysql_query($get_query1);
			while($row1 = mysql_fetch_array($bal_result1))
			{
				$bal1 = $row1['balance'];
			}
			
			if(($bal-500) > $amt)
			{
					echo "<br>Available Balance of My Account $id is: $bal<br>";
					echo "<br>Available Balance of Party's Account $id1 is: $bal1<br>";
			
					$bal = $bal-$amt;
					$bal1 = $bal1+$amt;
			
					$put_query = "update account set balance=$bal where accno=$id";
					$student_table = mysql_query($put_query);
					
					$enter_query = "insert into transaction values($id,'Transfer to $id1','$cur_date',$amt,$bal)";
					$bank_table = mysql_query($enter_query);
					
					$put_query1 = "update account set balance=$bal1 where accno=$id1";
					$student_table1 = mysql_query($put_query1);
					
					$enter_query1 = "insert into transaction values($id1,'Transfered from $id','$cur_date',$amt,$bal1)";
					$bank_table1 = mysql_query($enter_query1);
							
					echo "<br>New Balance of My Account is: $bal<br>";
					echo "New Balance of Party's Account is: $bal1<br>";
					
					if(($student_table)&&($student_table1)&&($bank_table)&&($bank_table1))
						echo "<br><h2>Amount Transfered</h2><br>";
					else
						echo "Amount Not Transfered Yet";
					
			}
			else
					echo "Sorry... Insufficient Balance";
		}
		else
				echo "<br><br><center><h2>Sorry.. Your Account $id is Blocked<br>Check with the bank..</h2></center>";
	}
	else
			echo "<br><br><center><h2>Sorry..Party's Account $id1 is Blocked<br>Cannot transfer Amount..</h2></center>";
			
	mysql_close($db_link);
}
else if(($id == $id1))
	echo "Enter Different Account Number";
else
	echo "Invalid number";
?>

</body></html>