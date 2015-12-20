<?php
 session_start();
?>
<?php

 include("homea.php"); 
 ?>
		<center>
        <form method="post" action="doreleaseacc.php">
		<br>
	<h1>RELEASE TRANSACTION</h1>
	<table bgcolor="#CCFFFF" border="2">
		<center>
        <tr><td><b>RELEASE ACCOUNT'S</b></td><td><b>TRANSACTION</b></td></tr> 

        
                <tr><td>Account Number: </td><td><input type="text" name="accno" size="10"><br></td></tr>
                		</table><br><br><br>
		<input type="submit" name="b1" value="RELEASE TRANSACTION">
        <input type="reset" name="b2" value="CLEAR">
        </form>

</center>
</body>
</html>
