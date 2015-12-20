<?php
session_start();
include("homea.php");
if($_POST['accno'])
{
	$id = $_POST['accno'];
	$cur_date = date("D, d M Y H:i:s");
	echo ("Welcome Employee: ".$_SESSION['emp']."<br>");
	echo "<h3>Entered Account number is: $id</h3>";
	$num=0;
	
	$db_link = mysql_connect("localhost","root","");
	$select_db = mysql_select_db("ebanking");
	
	$query = "select * from transactionx where accno=$id";
	$result = mysql_query($query);
	if(mysql_affected_rows()==1)
	{
		$get_query = "select * from transactionx where accno=$id and status='Blocked'";
		$get_result = mysql_query($get_query);
		$num = mysql_affected_rows();
		
		 if($num>0)
		 {
			while($row = mysql_fetch_array($get_result))
			{
				$status = $row['status'];
			}
			echo "<h2>Old Status: $status</h2>";
		
			$put_query = "update transactionx set status='Released'";
			if(mysql_query($put_query))
				echo "<h2>New Status: Released</h2><br>";
		 }
		 else
		 	echo "The account $id is not blocked..";
	}
	else if($num==0)
	 		echo "The account $id is not blocked..";
	else
		echo "No such Account found.... Invalid Account Number";
mysql_close($db_link);
}
?>