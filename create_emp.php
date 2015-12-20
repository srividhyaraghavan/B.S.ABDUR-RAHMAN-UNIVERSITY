<?php 
session_start();
?>
<?php
include("homea.php"); 
?>
<html>
    <body>
        <center><b>
          <h1>CREATION OF EMPLOYEE </h1>
          <form method="post" action="docreate_emp.php">
        <table>
                <tr>
                  <td>Employee Number
                  <td><input type="text" name="n0" size="25"><br></tr>
                <tr><td>Enter Name<td><input type="text" name="n1" size="25"><br></tr>
                <tr>
                  <td><p>Enter DOB (YYYY/MM/DD) </p>
                    <td><input type="text" name="n2" size="40"><br></tr>
                <tr><td>Select Gender<td><select name="n6"><option>Male</option>
                                             <option>Female</option></select><br></tr>
                <tr>
                  <td>Enter Address 
                  <td><input type="text" name="n4" size="25"><br></tr>
                <tr><td><p>Enter Phone Number </p>
                    <td><input type="text" name="n5" size="25"><br></tr>
                
                <tr><td>Enter E-Mail ID<td><input type="text" name="n3" size="25"></tr>
				
                <tr>
                  <td>Enter Total Salary:
                  <td><input type="number" name="n7" size="25"><br></tr>
				
				<tr><td>Select Branch<td><select name="n9"><option>1</option>
                                             			   <option>2</option>
														   <option>3</option>
														   <option>4</option>
														   <option>5</option>
														   <option>6</option>
									     </select><br></tr>

      	 	 <td><input type="submit" name="b1" value="CREATE"></td>
       		 <td><input type="reset" name="b2" value="CLEAR"></td>
		</table>
    </form>
    </b></center>   
 </body>
</html>

