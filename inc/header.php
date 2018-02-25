<style>
<?php include 'css/bootstrap_nm.css'; ?>
</style>
<?php
echo '<div class="card-header"><h1><center>'.$_SESSION["sharehouse_name"].'</center></h1> </div>';
include 'nav.php';
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

?>

