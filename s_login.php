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
	redirect("index.php");
}
else
{
	echo "Incorrect username or password " .PHP_EOL;
	echo "<br />";
	redirect("login.php?error=1");
}
include 'inc/footer.php';
?>
