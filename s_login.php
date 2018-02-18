<?php session_start(); ?>
<?php
include 'inc/header.php';
include 'inc/db.php';
include 'inc/functions.php';

$username = $_POST['username'];
$pass = $_POST['pwd'];
$query = "select * from user where name='".$username."' and password='".$pass."'";
$ret = db_select_query($query);
if (is_array($ret))
{
	echo "Login Successful".PHP_EOL;
	$_SESSION["userID"] = $ret["userId"];
	$_SESSION["username"] = $ret["name"];
	$_SESSION["usertype"] = $ret["type"];
	$url = redirect("index.php");
	?><meta http-equiv="refresh" content="0; URL='<?php echo $url?>'" />
<?php	
}
else
{
	echo "Incorrect username or password " .PHP_EOL;
	echo "<br />";
	$url = redirect("login.php?error=1");
	?><meta http-equiv="refresh" content="0; URL='<?php echo $url?>'" />
<?php
}
include 'inc/footer.php';
?>
