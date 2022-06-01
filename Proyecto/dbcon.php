<?php
		$con = mysqli_connect("localhost","root","1234","db");
		 
		if (mysqli_connect_errno())
		{
		echo "Connection Failed; " . mysqli_connect_error();
		}
?>