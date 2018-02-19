<?php
session_start();
//set variables
$ptitle = $_POST['title'];
$ptext = $_POST['contents'];
$puser = $_SESSION['userID'];


include 'inc/db.php';
include 'inc/functions.php';
$query = "insert into post(title,contents,userId) values ('".$ptitle."','".$ptext."','".$puser."')";
if (db_insert_query($query))
{
	redirect('index.php');
}
else
{
	//redirect and display error page
	die(mysqli_error(db_connect()));
	

}

?>
