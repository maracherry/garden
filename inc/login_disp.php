<?php
?>
<style>
h6 {
	color: indigo;	
}
</style>
<?php
function display_login($name)
{
	echo "<h6> Logged in as<br />";		
	echo "User: ".$name."</h6><br />";
	
}
function display_no_login()
{
	echo "<h6>Not logged in <br />";
	echo "</h6>";
}

?>
