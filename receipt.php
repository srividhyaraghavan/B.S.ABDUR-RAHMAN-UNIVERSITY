<?php
       $myfile = 'receipt.txt';
       $handle = fopen($myfile,'w');
       $h=echo "Account number: $id";
	   <br>
	   $h=echo "Account Type: $acctype";
       fwrite($handle,$h);
?>