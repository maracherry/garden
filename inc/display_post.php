<?php
//include 'db.php';
$query = 'select * from post';
$result1 = db_select_query($query);
$total_rows = mysqli_num_rows($result);
foreach($result1 as $row1)
{
	echo '<h3>'.$row1["title"].'</h3><br>';
	echo '<p>'.$row1["contents"].'</p><br>';
	echo '<p>Posted: '.$row1["date"].'</p><br>';
}

?>
