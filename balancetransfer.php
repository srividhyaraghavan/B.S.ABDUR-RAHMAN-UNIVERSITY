<?php session_start();
 if($_SESSION['acc'] == NULL)
 	header("Location: logincustomer.php");	
 else
 {
 include("homec.php");
 ?>
        <form method="post" action="dobalancetransfer.php">
		<br/>
		<br/>
        <center><h1>BALANCE TRANSFER</h1>
		<table>   
                <tr><td>Enter Party's Account Number:<td><input type="text" name="accno1" size="25" value = ""><br></tr>
                <tr><td>Enter The Amount: <td><input type="text" name="amount" size="25" value=""><br></tr>
		</table>
        <input type="submit" name="b1" value="TRANSFER">
        <input type="reset" name="b2" value="CLEAR">
        </center>
        </form>
</body>
</html>
<?php } ?>