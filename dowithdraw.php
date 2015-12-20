<?php
session_start();
?>
<?php
include("homea.php"); 
$id = $_POST['accno'];
if(intval($id))
{
	$amt = $_POST['amount'];
	$cur_date = date("Y-m-d");
	$status = "hi";
	
	echo "Account  Number is: $id<br>";
	echo "Entered Amount to be Withdrawn is: $amt<br>";
	
	$db_link = mysql_connect("localhost","root","");
	mysql_select_db("ebanking");

	$query = "select status from transactionx where accno=$id";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		$status = $row['status'];
	}
	if(($status == "Released")||($status == "hi"))
	{
		$get_query = "select balance from account where accno=$id";
		$bal_result = mysql_query($get_query);
		while($row = mysql_fetch_array($bal_result))
		{
			$bal = $row['balance'];
		}
		if(($bal-$amt) >= 500)
		{
		echo "<br>Available Balance of Account $id is: $bal<br>";
		$bal = $bal-$amt;
		
		$put_query = "update account set balance=$bal where accno=$id";
		$student_table = mysql_query($put_query);
		
		$enter_query = "insert into transaction values($id,'Amount Withdrawn','$cur_date',$amt,$bal)";
		$bank_table = mysql_query($enter_query);
		
		echo "<br><center><h2>New Balance of Account $id is: $bal<br>";
				
		
		if($student_table)
			echo "Amount $amt Reduced</h2></center><br>";
		else
		   echo "Amount $amt not Deposited<br>";
		
		
		if($bank_table)
			echo "Added to Stmt of $id<br>";
		else
		   echo "Not added in stmt of $id<br>";
		mysql_close($db_link);
		}
		else
			echo "Insufficient Balance";
	}
	else
		echo "<br><br><center><h2>Account $id is Blocked<br>Inform Customer..</h2></center>";
}
else
	echo "<br>Invalid Account Number";
?>
