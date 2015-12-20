<?php
include("homea.php"); 
$id = $_POST['accno'];

if(intval($id))
{
	$id1 = $_POST['accno1'];
	$amt = $_POST['amount'];
	$j=0;
	$cur_date = date("Y-m-d");
	$status = "hi";
	$status1 = "hi";
	
	echo "Source Account  Number is: $id<br>";
	echo "Destination Account number is: $id1<br>";
	echo "Amount to be Transfered is: $amt<br>";
	
	$db_link = mysql_connect("localhost","root","");
	$select_db = mysql_select_db("ebanking");
	
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
	
	if(($status1 == "Released")||($status1 == "hi"))
	{
		if(($status == "Released")||($status == "hi"))
		{
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
		
			if(($bal-500) >= $amt)
			{
				echo "<br>Available Balance of Source Account $id is: $bal<br>";
				echo "Available Balance of Destination Account $id1 is: $bal1<br><br>";
		
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
				
		
			
				if($student_table)
					echo "Account $id 's Amount $amt Reduced<br>";
				else
				   echo "Account $id 's Amount $amt not Reduced<br>";
				   
				echo "New Balance of Account $id is: $bal<br><br>";
				
				if($student_table1)
					echo "Amount $amt added to Destination Account $id1<br>";
				else
				   echo "Amount $amt not added to Destination Account $id1<br>";
				   
				echo "New Balance of Account $id1 is: $bal1<br><br>";
				
				if($bank_table)
					echo "Added to Stmt $id<br>";
				else
				   echo "Not added in stmt $id<br>";
				
				if($bank_table1)
					echo "Added to stmt $id1<br>";
				else
				   echo "Not Added in stmt $id1<br>";
				
				
				if(($student_table)&&($student_table1)&&($bank_table)&&($bank_table1))
					echo "<br><center><h1>Amount Transfered</h1></center><br>";
				else
					echo "Amount Not Transfered Yet";
			}
			else 
				echo "Insufficient Balance in Account $id";
		}
		else
			echo "<br><br><center><h2>Source Account $id is Blocked<br>Inform Customer..</h2></center>";
	}
	else
		echo "<br><br><center><h2>Destination Account $id1 is Blocked<br>Cannot Transfer Amount..</h2></center>";
				
mysql_close($db_link);
}
else
	echo "Invalid Account Number";
?>