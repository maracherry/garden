<style>
<?php include 'css/bootstrap.css'; ?>
</style>
<?php include 'inc/header.php'; 
echo '<head><b>Garden Site</b><br> Annoucements<br></head>';
echo '&mdash<a href="login.php"> Login </a>&mdash';

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
