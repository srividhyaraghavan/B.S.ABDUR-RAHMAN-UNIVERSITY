<?php 
  session_start();
?>
<?php

 include("homea.php"); 
 ?>
		<center>
        <form method="post" action="dobalanceenquiry_emp.php">
		<br>
	<h1>BALANCE AVAILABLE</h1>
	<table bgcolor="#00FFFF" border="2">
		<center>
        <tr><td><b>ACCOUNT</b></td><td><b>BALANCE</b></td></tr> 

        
                <tr><td>Account Number: </td><td><input type="text" name="accno" size="10"><br></td></tr>
                		</table><br><br><br>
		<input type="submit" name="b1" value="VIEW BALANCE">
        <input type="reset" name="b2" value="CLEAR">
        </form>

</center>
</body>
</html>