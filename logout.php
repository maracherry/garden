<?php session_start(); ?>
<?php include 'inc/header.php';
include 'inc/functions.php';
session_destroy();
redirect('index.php');

include 'inc/footer.php';
?>
