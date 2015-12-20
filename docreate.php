<?php 
session_start();
?>
<?php
include("homea.php");
$n = 0;
echo "<center><h2>";

if(empty($_POST['n1']) ||   empty($_POST['n2']) ||   empty($_POST['n3']) ||   empty($_POST['n4']) ||
   empty($_POST['n5']) ||   empty($_POST['n6']) ||   empty($_POST['n7']) ||   empty($_POST['n8']) ||
   empty($_POST['n9']) ||   empty($_POST['n10']) ||   empty($_POST['n11']))
{
    $errors_null = "<br><br>Error: All Fields Are Required";
	echo "$errors_null";
	$n = $n + 1;
}

//$accno = $_POST['n0'];
$name = $_POST['n1'];
$address = $_POST['n2'];
$email = $_POST['n3'];
$mobileno = $_POST['n4'];
$dob = $_POST['n5'];
$gender = $_POST['n6'];
$balance = $_POST['n7'];
$acctype = $_POST['n8'];
$branch = $_POST['n9'];
$ques = $_POST['n10'];
$ans = $_POST['n11'];

if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",$email))
{
    $errors_email = "<br>E-Mail Error: Invalid email address";
	echo "$errors_email";
	$n = $n+1;
}

$mobile_length = strlen((string)$mobileno);
if($mobile_length != 10)
{
	$errors_mobile = "<br>MobileNumber Error: Invalid Mobile Number";
	echo "$errors_mobile";
    $n = $n + 1;
}	    

$ipaddr = $_SERVER['REMOTE_ADDR'];
$empno = $_SESSION['emp'];
$cur_date = date("Y-m-d");

$str = strtolower($name);
$loginpw = $str.'india'.date("s");

$db_link = mysql_connect("localhost","root","");
mysql_select_db("ebanking");


if((($cur_date-$dob)>=18)&&($n == 0))
{	
	$get_query = "select max(accno) from account";
	$emp_result = mysql_query($get_query);
	
	while($row = mysql_fetch_array($emp_result))
	{
		$accno = $row[0];
	}
	$accno = $accno + 1;
	
	$query1 = "insert into customer values($accno,'$name','$acctype','$cur_date',ipaddr,'$dob','$address',$mobileno,'$gender','$loginpw','$ques','$ans','$email',$empno,'$branch')";	
	$cust_table = mysql_query($query1);
	if(mysql_affected_rows()==1)
	{
		echo "<br><br><table border=3><tr><th colspan=2>Account Number $accno Login Details</th></tr>";	
		echo "<tr><td>Login Account Number</td><td> $accno</td></tr>";
		echo "<tr><td>Your Password is:</td><td> $loginpw</td></tr></table>";
		echo "Customer Details Inserted";
				
		$query2 = "insert into account(accno,acctype,balance,dateo)values($accno,'$acctype',$balance,'$cur_date')";	
		if(mysql_query($query2))
			echo "<br>Account Table Details Inserted";
		else
			echo "<br>Account Table Details not Inserted";
	}
	else
		echo "<br>Customer Details Not Inserted";
}
else if(($cur_date-$dob)<18)
	echo "<br>Cannot open the account if age is less than 18";
else
	echo "<br>Cannot open the Account";
mysql_close($db_link);
echo "</h2></center>";
?>

