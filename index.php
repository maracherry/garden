<?php
include 'inc/session.php';
include 'inc/header.php'; 
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
