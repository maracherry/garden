<?php session_start(); ?>
<?php
include 'inc/header.php';
include 'inc/db.php';
include 'inc/functions.php';

$username = $_POST['username'];
$pass = $_POST['pwd'];
$query = "select * from user where name='".$username."' and password='".$pass."'";
$return = db_select_query($query);
if ($return)
{
	$row = mysqli_fetch_assoc($return);
}
if (is_array($row))
{
	echo "Login Successful".PHP_EOL;
	$_SESSION["userID"] = $row["userId"];
	$_SESSION["username"] = $row["name"];
	$_SESSION["usertype"] = $row["type"];
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
