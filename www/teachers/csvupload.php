<?php 
require "../conn.php";

if(isset($_POST['upload'])){

$exam = $_POST['exam'];
$askclass = $_POST['askclass'];
$subject = $_POST['subject'];

$filename = explode('.',$_FILES["myfile"]["name"]);

if(end($filename)=='csv'){
$handle = fopen($_FILES["myfile"]["tmp_name"], "r+");

while(($data = fgetcsv($handle, 1000, ",")) !==FALSE){
$total = $data[2]+$data[3];

if($total<40){
	$remarks="Fail";
}
else if($total<60){
	$remarks="Pass";
}
else if($total<80){
	$remarks="Credits";
}
else if($total<=100){
	$remarks="Distinction";
}
else{
	$remarks="Invalid";
}
$sql = "INSERT INTO marks (examname, class, midterm, endterm, subject, student, admno, average, remarks) VALUES('$exam','$askclass','$data[2]','$data[3]','$subject','$data[0]','$data[1]','$total','$remarks')";
$ret = $db->exec($sql);
}
fclose($handle);
   	echo '<script language="javascript">';
	echo 'alert("Successfully Imported")';
	echo '</script>';
	
	echo "<script>location.href='viewmarks.php'</script>";

}
else{
   	echo '<script language="javascript">';
	echo 'alert("csv files only")';
	echo '</script>';

}
}
else{

   	echo '<script language="javascript">';
	echo 'alert("You hav not selected any csv file.................!!!")';
	echo '</script>';
	}
?>

 