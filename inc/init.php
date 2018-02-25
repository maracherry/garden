<?php
include 'session.php';
include 'db.php';
//initialize settings and store into session
if (!isset($_SESSION["is_loaded"]))
{
	$query = 'select * from settings';
	$result = db_select_query($query);
	$settings = array();
	while($row = mysqli_fetch_assoc($result))
	{
		$settings[] = $row;
	}
	foreach($settings as $setting_value)
	{
		$_SESSION[$setting_value["settingName"]] = $setting_value["settingValue"];
	}
	$_SESSION["is_loaded"] = 1;
}

?>
