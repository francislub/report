<?php
require_once "functions.php";
$conn = db_conn();
	
date_default_timezone_set('Africa/Nairobi');

$leo = date('Y-m-d', strtotime('first day of this month'));
$lastday = date('Y-m-d', strtotime('last day of this month'));

$eventArray = array();
$data = array();

$sql = $conn->query("SELECT * FROM event WHERE event_date BETWEEN '$leo' AND '$lastday'");

while($row = $sql->fetch()){
		$title = $row['event'];
		$start = $row['event_date'];
		$clients = $row['full_name'];
		$end = $start;
		$data = array("title"=>"$title","start"=>"$start","end"=>"$end");
		array_push($eventArray, $data);
}

echo json_encode($eventArray);
$conn = null;
exit();

?>