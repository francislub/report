<?php
include "functions.php";
$conn = db_conn();

if(isset($_POST['constituency'])) {
	$data = array();
	$constituency = $_POST['constituency'];
	$constituency = str_replace("'", "\'", $constituency);
	$sql = "SELECT ward FROM regions where constituency_name = '$constituency' order by ward asc";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
		array_push($data, $row);
	}
	echo json_encode($data);
}
else{
	echo json_encode("0 results");
}

$conn = null;
?>

