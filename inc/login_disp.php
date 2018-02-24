<?php
?>
<style>
h6 {
	color: indigo;	
	text-align:right;
}
#login_btn {
	display:block;
	text-align:right;
}
</style>
<?php
echo '<div id="login_btn">';
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
echo '<a href="login.php"> Login </a>';
echo '</div>';

?>
