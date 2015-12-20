<?php 
session_start(); 
?>
<?php
include("homea.php"); 
?>
        <form method="post" action="dobalancetransfer_emp.php">
		<br/>
		<br/>
        <center><h1>BALANCE TRANSFER</h1></center>
        <center><table>
                <tr><td>Enter Source Account Number: <td><input type="text" name="accno" size="25"><br></tr>
                <tr><td>Enter Destination Account Number: <td><input type="text" name="accno1" size="25"><br></tr>
                <tr><td>Enter The Amount: <td><input type="text" name="amount" size="25"><br></tr>
        <br><br><br>
		</table>
        <input type="submit" name="b1" value="TRANSFER">
        <input type="reset" name="b2" value="CLEAR">
        </center>
        </form>
</body>
</html>