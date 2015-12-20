<?php 
session_start();
//error_reporting(0);
?>
<?php
if($_POST['accno'])
{
	$id = $_POST['accno'];
	$pwd = $_POST['pwd']; 
	$lastlog = date('D, d M Y H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];

	$db_link = mysql_connect("localhost","root","");
	mysql_select_db("ebanking");

	$get_query = "select count(*) from customer where accno=$id and loginpw='$pwd'";
	$acc_result = mysql_query($get_query);
	
	/*while($row = mysql_fetch_array($acc_result))
	{
		$acc_result1 = $row[0];
	}*/
	
	if($acc_result)
	{
		//echo "Username and Password are Correct";
		$put_query = "update customer set ipaddr='$ip',lastlog='$lastlog' where accno=$id";
        if(mysql_query($put_query))
				$_SESSION['acc'] = $id;
				//echo "$acc_result";
				header("Location: homec.php");	
	}
	else
	{
		include("logincustomer.php");
		echo "<script>alert('Username/Password are Incorrect')</script>";
	}
	
	/*while($row = mysql_fetch_array($acc_result))
   	{
		$pw = $row['loginpw'];
		if($pw === $pwd)
		{
			$put_query = "update customer set ipaddr='$ip',lastlog='$lastlog' where accno=$id";
        	if(mysql_query($put_query))
				$_SESSION['acc'] = $id;
				header("Location: homec.php");	
		}
		else
			header("Location: logincustomer.php");
   	}*/
	
		mysql_close($db_link);
}
else
{
	include("logincustomer.php");
	echo "<script>alert('Username/Password cannot be Null')</script>";
}
?>