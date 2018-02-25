<?php
include 'inc/session.php';
include 'inc/header.php';
include 'inc/db.php';
function display_facts()
{
	$q='select settingName,settingValue from settings where is_visible=1';
	$result=db_select_query($q);
	echo '<table class="table">';
	while($row=mysqli_fetch_assoc($result))
	{
		echo '<tr><td>'.$row["settingName"].'</td><td>'.$row["settingValue"].'</td></tr>';
	}
	echo '</table>';
}
echo '<div id="main_body">';
echo '<body>';
echo '<h1> About </h1>';
$q_return = db_select_query("select textValue from textInfo where textName ='AboutText'");
$about_text = mysqli_fetch_assoc($q_return);
echo $about_text["textValue"];
echo '<br>';
echo '<h4> Sharehouse Facts </h4><br>';
display_facts();
echo '</body>';
include 'inc/footer.php';
?>
