<?php
include 'db.php';
//sets DB settings table to file contents as specified
//inserts or otherwise updates them
function get_settings($config_file)
{
	$setting_lines = file($config_file,FILE_IGNORE_NEW_LINES);
	$settings = array();
	foreach($setting_lines as $line)
	{
		$split = explode('=',$line);
		$settings [] = array($split[0] => $split[1]);
	}
	return $settings;
}
//assume empty set, insert items into database
function initialize_db_settings($settings_array)
{
	foreach($settings_array as $value_set)
	{
		$field_name = key($value_set);
		$query = "insert into settings(settingName,settingValue) values ('".$field_name."','".$value_set[$field_name]."')";
		db_insert_query($query);
	}
}
function check_fields($settings_array,$db_array)
{
	//return true if no fields need to be added
	//return an associative array of the fields that need to be added if they need to be added
	//only checks fields
	echo 'this is settings\n';
	var_dump($settings_array);
	echo 'this is database\n';
	var_dump($db_array);
	if (count($settings_array) == count($db_array))
	{
		return true;
	}
	else
	{
		//to do: find out which field needs to be added, return array of need to be added fields
	}
}
function check_settings($settings_array)
{
	if(is_array($settings_array))
	{
		$query="select * from settings";
		$result = db_select_query($query);
		if (!mysqli_num_rows($result))
		{
			initialize_db_settings($settings_array);
		}
		$db_array = array();
		while ($row = mysqli_fetch_assoc($result))
		{
			$db_array[] = $row;
		}
		if (check_fields($settings_array,$db_array))
		{
			
		}
		/*foreach($result as $row)
		{
			foreach($settings_array as $settings_item)
			{
				if(key($settings_item) == $row["settingName"])
				{
					if($settings_item != $row["settingValue"])
					{
						//update the db with new value
						$var_dump($settings_item);
					}
					continue;
				}
				else
				{
					//array key doesnt exist in db,insert it
				}
			}
		}*/
	
	}
	else
	{
		return false;
	}
	
}
$config_filename = "../conf/settings.conf";
$site_settings = get_settings($config_filename);
check_settings($site_settings);
?>
