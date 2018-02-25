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
	if (count($settings_array) == count($db_array))
	{
		return true;
	}
	else
	{
		$db_compare = array();
		foreach($db_array as $db_value)
		{
			$db_compare[] = array($db_value["settingName"] => $db_value["settingValue"]);
		}
		$check_db_array = array();
		foreach($db_compare as $db_comp_val)
		{
			$check_db_array[key($db_comp_val)] = $db_comp_val[key($db_comp_val)];
		}
		$fields_to_add = array();
		foreach($settings_array as $set_value)
		{
			if(!array_key_exists(key($set_value),$check_db_array))
			{
				$fields_to_add [] = $set_value;
			}
		}
		foreach($fields_to_add as $field)
		{
			$settingName = key($field);
			$settingValue = $field[key($field)];
			$query = "insert into settings (settingName,settingValue) values ('".$settingName."','".$settingValue."')";
			$return = db_insert_query($query);
		}
		return $return;
		
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
			foreach($settings_array as $file_value)
			{
				foreach($db_array as $db_value)
				{
					if($db_value["settingName"] == key($file_value))
					{
						if($file_value[key($file_value)] != $db_value["settingValue"])
						{
							$query="update settings set settingValue = '".$file_value[key($file_value)]."' where settingName = '".$db_value["settingName"]."'";
							if(db_update_query($query))
							{
								echo 'a setting was updated \n';
							}
							else
							{
								echo 'a mysqlerror occurred \n';
								$error = get_db_error();
								echo 'error: '.$error.' \n';
							}
						}
					}
				}
			}
		}
		else
		{
			return false;
		}
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
