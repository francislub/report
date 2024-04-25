<?php
include "functions.php";
$conn = db_conn();
if(isset($_POST['county'])) {
	$data = array();
	$county = $_POST['county'];
	$county = str_replace("'", "\'", $county);
	$sql = "SELECT constituency_name  FROM regions where county_name like '$county' group by constituency_name order by constituency_name asc";
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
