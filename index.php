<?php session_start(); ?>
<?php include 'inc/header.php'; 
include 'inc/login_disp.php';
if (isset($_SESSION["username"]))
{
	display_login($_SESSION["username"]);
	echo '<a href="logout.php"> logout </a>';
}
else
{
	display_no_login();
}
echo '<div id="main_body">';
echo '<br><body>'; 
include 'inc/display_post.php';
if (isset($_SESSION["username"]))
{
	include 'inc/add_post.php';
}
echo '</body><br>';
echo '</div>';
?>
<br>
<?php include 'inc/footer.php'; ?>
