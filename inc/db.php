<?php
//Db connector by Nicole McIntosh 
include 'db_con.php';

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
			//$row=mysqli_fetch_assoc($result);	
			db_close($link);
			return $result;
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
function db_insert_query($query)
{
	$link = db_connect();
	$result = mysqli_query($link,$query);
	if ($result)
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

?>
