<?php
include 'db.php';
$query = 'select * from post';
$result = db_select_query($query);
$total_rows = mysqli_num_rows($result);
foreach($result as $row)
{
	echo '<h3>'.$row["title"].'</h3><br>';
	echo '<p>'.$row["contents"].'</p><br>';
	echo '<p>Posted: '.$row["date"].'</p><br>';
}

?>
