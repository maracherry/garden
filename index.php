<?php session_start(); ?>
<?php include 'inc/header.php'; 
include 'inc/login_disp.php';
echo '<b>Garden Site</b><br> Annoucements<br>';
echo '<a href="login.php"> Login </a>';
if (isset($_SESSION["username"]))
{
	display_login($_SESSION["username"]);
}
else
{
	display_no_login();
}
echo '<br><body>'; 
//place code for each annoucment here
echo 'This Section should contain annoucments';
echo '<h3> New Annoucment </h3><br>';
?>
<form action="submit.php" method="post">
<p> Title: <input type="text" name="title" /></p>
<p> Contents: <input type="text" name="contents" /></p>
<p><input type="submit" /></p>
</form>

<?php
echo '</body><br>';
?>
<br>

<?php include 'inc/footer.php'; ?>
