<?php 
session_start();
?>
<?php
include("homea.php");
?>
<html>
    <body>
        <center>
          <h1>DELETION OF EMPLOYEE </h1>
        </center>
        <center>
        <form method="post" action="dodelete_emp.php">
		<br/>
                <tr>
                  <td>Enter Employee Number: 
                  <td><input type="text" name="empno" size="25"><br></tr>
        
        <br><br><br>
        <input type="submit" name="b1" value="DELETE">
        <input type="reset" name="b2" value="CLEAR">
        </form>
        </center>
        
    </body>
</html>
