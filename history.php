<?php 
session_start();
?>
<?php
 if($_SESSION['acc'] == NULL)
 	header("Location: logincustomer.php");	
 else
 {
 include("homec.php");
 ?>
        <form method="post" action="dohistory.php">
        <br><center><h1><u>DATE WISE STATEMENT</u></h1>
		<table>
                <tr><td>Enter Start Date: <td><input type="text" name="t1" size="25"/>
                YYYY-MM-DD
                </tr>
                <tr><td>Enter End Date: <td><input type="text" name="t2" size="25"/>
                YYYY-MM-DD
                </tr>
		</table>
        <input type="submit" name="b1" value="STATEMENT"/>
        <input type="reset" name="b2" value="CLEAR"/><br>
        </center>
        </form>
</body>
</html>
<?php } ?>