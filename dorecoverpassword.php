<?php 
session_start();
?>
<?php
include("logincustomer.php");

$id = $_POST['accno'];
$ques = $_POST['ques'];
$ans = $_POST['ans'];
$dob = $_POST['dob'];
$newpass = $_POST['newpass'];
$newpass1 = $_POST['newpass1'];
if(($id==NULL)||($ques=NULL)||($ans=NULL)||($dob=NULL)||($newpass=NULL)||($newpass1=NULL))
{
	echo "<h2><br>All the Values should be filled.<br> Cannot leave any Textbox Empty<br>";
	echo "<a href='recoverpassword.php' style='color:green;font-size:15px'>Back</a></h2>";
}
else
{
	$db_link = mysql_connect("localhost","root","");
	mysql_select_db("ebanking");
	
	if($newpass == $newpass1)
	{
		echo "<br><center><u><h2>Account  Number is: $id<br></h2></u></center>";
		
		$get_query = "select * from customer where accno=$id";
		$result = mysql_query($get_query);
		while($row = mysql_fetch_array($result))
			{
			$question = $row['securityques'];
			$answer = $row['securityans'];
			$dobirth = $row['dob'];
			$name = $row['name'];
			}
		
		if(($_POST['ques'] == $question)&&($_POST['ans'] == $answer)&&($_POST['dob'] == $dobirth))
		{
				echo "<center><h3>All the values are correct Mr.$name<br>";
				echo "Your new Password has been updated<br></h3>";
				
				$pass = $_POST['newpass'];
				$put_query = "update customer set loginpw='$pass' where accno=$id";
				$student_table = mysql_query($put_query);
				//echo "<a href='logincustomer.php' style='color:Green;font-size:15px'>Login</a></h2></center>";
		}
		else if($_POST['ques'] != $question)
			echo "Sorry..Incorrect Question.Cannot Change Password<br><a href='recoverpassword.php'>Back</a>";
		else if($_POST['ans'] != $answer)
			echo "Sorry..Incorrect Answer.Cannot Change Password<br><a href='recoverpassword.php'>Back</a>";
		else if($_POST['dob'] != $dobirth)
			echo "Sorry..Incorrect DateOfBirth.Cannot Change Password<br><a href='recoverpassword.php'>Back</a>";
		else
			echo "Sorry..Incorrect Values.Cannot Change Password<br><a href='recoverpassword.php'>Back</a>";
	}
	else
		echo "New Password values mis-matches<br><a href='recoverpassword.php' style='color:green;font-size:15px'>Back</a>";

	mysql_close($db_link);
}
?>