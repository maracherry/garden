<?php
//Db connector by Nicole McIntosh 

//connects to database, uses defaults, otherwise will error out
function db_connect($host = "localhost", $dbuser = "webdb", $pass = "test55", $dbname = "gardenDB")
{
	$link = mysqli_connect("localhost","webdb","test55","gardenDB");
	if ($link)
	{
		echo "DB Connected";
		return $link;
	}
	else
	{
		echo "unable to connect to MySQL". PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	}
}
function db_close($db_link)
{
	if ($db_link)
	{
		mysqli_close($db_link);
	}
	else
	{
		echo "no connection available to close";
	}
}
//takes a query, returns an array of results. Or Errors out
function db_select_query($query)
{
	if (strstr($query,'select'))
	{
		$link = db_connect();
        	$result = mysqli_query($link,$query);
		if (mysqli_num_rows($result) >= 1)
		{
			$row=mysqli_fetch_assoc($result);	
			db_close($link);
			return $row;
		}
		else
		{
			db_close($link);
			return FALSE;
		}
	}
	else
	{
		echo 'ERROR: Not a proper select query'. PHP_EOL;
	}
}

?>
