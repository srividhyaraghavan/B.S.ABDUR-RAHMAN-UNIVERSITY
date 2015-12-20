<?php 
session_start();
?>
<?php
include("homec.php");
?>
<html>
<body>	
        <form method="post" action="dorecoverpassword.php">
        <br><center><h1>RESET YOUR PASSWORD</h1><img src="lock.jpg" width="439" height="223"/>
       <table>
                <tr>
                  <td>Enter Your Account Number: 
                  <td><input type="text" name="accno" size="25"><br></tr>
                <tr>
                  <td>Enter Security Question:: 
                  <td><input type="text" name="ques" size="75"><br></tr>
                <tr>
                  <td>Enter The Answer: 
                  <td><input type="text" name="ans" size="50"><br></tr>
				<tr>
                  <td>Enter Your Date of Birth: 
                  <td><input type="text" name="dob" size="25"><br></tr>
				<tr>
                  <td>Enter Your New Password: 
                  <td><input type="password" name="newpass" size="25"><br></tr>
				  <tr>
                  <td>Re-Enter Your New Password: 
                  <td><input type="password" name="newpass1" size="25"><br></tr>
      </table>
	  
        <input type="submit" name="b1" value="RECOVER PASSWORD">
        <input type="reset" name="b2" value="CLEAR">
      </center>
	    </form>
</body>
</html>