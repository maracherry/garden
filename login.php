<?php session_start(); ?>
<?php include 'inc/header.php'; 

if (isset($_GET['error']))
{
	echo '<style> h2 { color: red;} </style>';
	echo '<h2> Incorrect username or password </h2>';
	echo '<br>';
}
//php forms, grab and take the login and password for user, return false or true
echo '<form action="s_login.php" method="post">';
echo '<p>Username:  <input type="text" name="username" /> <br />';
echo '<p>Password:  <input type="password" name="pwd" /> <br />';
echo '<p> <input type="submit"> Login </p> <br />';
echo '</form>';

?>
<?php include 'inc/footer.php'; ?>
