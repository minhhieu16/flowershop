<?php
class database
{
	
	function connect()
	{
		global $con;
		$con=mysqli_connect("localhost","id9425738_admin","123456","id9425738_flowershop");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
mysqli_set_charset($con,"utf8");

		return $con;
	}
	
}


?>