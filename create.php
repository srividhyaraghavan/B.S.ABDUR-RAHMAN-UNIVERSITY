<?php
include("homea.php");
 ?>
<html>
<head>
<script type="text/javascript">
</script>
    <body>
        <center><h1><u>CREATION OF ACCOUNT</u></h1>
        <form method="post" action="docreate.php" >
		<br/>
		<br/>
        <table>
                <!--<tr><td>Account Number<td><input type="text" name="n0" size="25"><br></tr>-->
                <tr><td>Enter Name<td><input type="text" name="n1" size="25"><br></tr>
                <tr><td>Enter Address<td><input type="text" name="n2" size="40"><br></tr>
                <tr><td>Select Gender<td><select name="n6"><option>Male</option>
                                             <option>Female</option></select><br></tr>
				<tr><td>Enter Security Question<td><input type="text" name="n10" size="75"><br></tr>
				<tr><td>Answer for Security Question<td><input type="text" name="n11" size="50"><br></tr>
                <tr><td>Enter Mobile<td><input type="text" name="n4" size="25"><br></tr>
                <tr><td><p>Enter DOB (YYYY-MM-DD) </p>
                    <td><input type="text" name="n5" size="25"><br></tr>
                <tr><td>Select Account<td><select name="n8"><option>Current</option>
                                             <option>Savings</option></select><br></tr>
                <tr><td>Enter E-Mail ID<td><input type="text" name="n3" size="25">
				</tr>
				<tr><td>Select Branch<td><select name="n9"><option>Sowcarpet</option>
                                             			   <option>Paris</option>
														   <option>Millroad</option>
														   <option>RSPuram</option>
														   <option>Town</option>
														   <option>Bazzar</option>
									     </select><br></tr>
                <tr><td>Enter Initial Balance:<td><input type="number" name="n7" size="25"><br></tr>
        </table>
        <br>

        <input type="submit" name="b1" value="SUBMIT">
        <input type="reset" name="b2" value="CLEAR">
    </form>
    </center>
	</body>
</head>
</html>