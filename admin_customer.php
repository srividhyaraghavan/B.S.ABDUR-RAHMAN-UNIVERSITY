<?php 
session_start();
?>

<?php
 
 include("homea.php");
?>
        <form method="post" action="dosearch.php">
		<br/>
		<br/>
        <center><h1>ADMINISTRATOR => CUSTOMER OPTIONS<br>
   					WELCOME <?php echo $_SESSION['emp']; ?></h1>
          <p><strong>Account Number:</strong>
            <input type="text" size="20" name="accno" />
            <br />
            <br />
            <input type="submit" value="SEARCH" name="searchacc" />
          </p>
        </center>
        <center><table>
                <tr><td><b><u><a href="create.php"><img src="createuser1.jpg"></a></u></b></td>
                    <td><b><u><a href="update.php"><img src="Update1.jpg"></a></u></b></td>
			        <td><b><u><a href="delete.php"><img src="deleteuser2.jpg" width="157"></a></u></b></td>
                </tr></table>
		  <p><a href="deposit.php"><img src="button7.jpg" width="155" height="43"></a>
				    <a href="withdraw.php"> <img src="button20.jpg" width="149" height="43"></a>
				    <a href="balancetransfer_emp.php"><img src="button26.jpg" width="159" height="43"></a>
				    <a href="balanceenquiry_emp.php"><img src="buttonA1.jpg" width="174" height="45"></a></p>
				<table><tr><td><a href="history_emp.php"><img src="buttonF.jpg" width="155"></a></td>
				    <td><a href="stopacc.php"><img src="Stop1.jpg" width="155"></a></td>
					<td><a href="releaseacc.php"><img src="Release1.jpg" width="155"></a></td></tr>
        </table></center>
        </form>
   </body>
   </html>