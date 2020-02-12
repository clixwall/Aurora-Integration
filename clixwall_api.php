<?php
$secret_password = 'ENTER YOUR SECRET PASSWORD HERE';
include "config.php";


$db = new mysqli("$DBHost","$DBUser","$DBPassword","$DBDatabase");


$password = isset($_REQUEST['pwd'])?$_REQUEST['pwd']:die();

//You are not allowed to edit the details below this . If you edit then your clixwall account will be banned.

if( $password == $secret_password )
{

//Fetch Members
	$members = $db->query("SELECT count(*) FROM user");
	$row =  $members->fetch_row();
	$members =  $row[0];


	$ptc = $db->query("SELECT count(*) FROM ads");
	$row =  $ptc->fetch_row();
	$ptc =  $row[0];




	$paid = $db->query("SELECT sum(amount) FROM payment_history WHERE status=1");
	$row =  $paid->fetch_row();
	$paid =  $row[0];





	$banner = $db->query("SELECT count(*) FROM banners");
	$row =  $banner->fetch_row();
	$banner =  $row[0];



	$text = $db->query("SELECT count(*) FROM fads");
	$row =  $text->fetch_row();
	$text =  $row[0];



	$task = $db->query("SELECT count(*) FROM ptsuads");
	$row =  $task->fetch_row();
	$task =  $row[0];

	$data = array(
		"members" => $members,
		"ptc" => $ptc,
		"banner" => $banner,
		"text" => $text,
		"paid" => $paid,
		"task" => $task,
		"script" => "Aurora"

	);

	echo json_encode($data);
}
else
{
	die();
}

?>
