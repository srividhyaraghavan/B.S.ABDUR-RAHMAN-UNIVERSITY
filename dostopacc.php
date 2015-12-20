<?php
session_start();
 include("homea.php"); 
if($_POST['accno'])
{
	$id = $_POST['accno'];
	$cur_date = date("D, d M Y H:i:s");
	$num = 0;
	
	echo ("Welcome Employee: ".$_SESSION['emp']."<br>");
	echo "<h3>Entered Account number is: $id</h3>";
	
	$db_link = mysql_connect("localhost","root","");
	$select_db = mysql_select_db("ebanking");
	
	$query = "select * from transactionx where accno=$id";
	$result = mysql_query($query);
	if(mysql_affected_rows()==1)
	{
		$get_query = "select * from transactionx where accno=$id and status='Blocked'";
		$get_result = mysql_query($get_query);
		if(mysql_affected_rows()==1)
		{
		   echo "<h2>The account $id is already blocked..</h2>";
		   $num = $num+1;
		}  
		
		$get_query1 = "select * from transactionx where accno=$id and status='Released'";
		$get_result1 = mysql_query($get_query1); 
		if(mysql_affected_rows()==1)
		{
			$put_query = "update transactionx set status='Blocked' where accno=$id";
			if(mysql_query($put_query))
				echo "<h2>Blocked</h2><br>";
			$num = $num+1;
		}
	}
	else if($num == 0)
	{
		$put_query = "insert into transactionx values($id,'$cur_date','Blocked')";
		if(mysql_query($put_query))
			echo "Account $id BLOCKED<br>";
	}
	else
		echo "No such Account is found..Invalid Account Number";
mysql_close($db_link);
}
?>