<?php session_start(); ?>
<?php include 'inc/header.php'; 
include 'inc/login_disp.php';
echo '<b>Garden Site</b><br> Annoucements<br>';
echo '<a href="login.php"> Login </a>';
if (isset($_SESSION["username"]))
{
	display_login($_SESSION["username"]);
	echo '<a href="logout.php"> logout </a>';
}
else
{
	display_no_login();
}
echo '<br><body>'; 
//place code for each annoucment here
include 'inc/display_post.php';
if (isset($_SESSION["username"]))
{
	include 'inc/add_post.php';
}
echo '</body><br>';
?>
<br>

<?php include 'inc/footer.php'; ?>
