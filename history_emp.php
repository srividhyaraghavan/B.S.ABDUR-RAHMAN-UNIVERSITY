<?php session_start();
include("homea.php"); ?>
         <center><form method="post" action="dohistory_emp.php">
		<br/>
		<br/>
        <h1>DATE WISE STATEMENT</h1>
		<table>
                <tr><td>Enter Account Number: <td><input type="text" name="accno" size="25"><br></tr>
                <tr><td>Enter Start Date: <td><input type="text" name="t1" size="25"><br></tr>
                <tr><td>Enter End Date: <td><input type="text" name="t2" size="25"><br></tr></table>
        <br>

        <input type="submit" name="b1" value="STATEMENT">
        <input type="reset" name="b2" value="CLEAR">
        </form>
   		   
         </center>
</body>
</html>
