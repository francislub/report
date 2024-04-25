<?php
require "fpdf.php";

class mypdf extends fpdf{
function header(){
$this->setfont('Arial','B','26');
$this->cell(190,8,'KIRITI SECONDARY SCHOOL',0,0,'C');
$this->Ln();
    
$this->setfont('Arial','B','14');
$this->cell(54,8,'Nyeri Mukurwe-Ine Kiamatura',0,0,'L');
$this->Image('logo.PNG',80,20,55,30);
$this->setfont('Arial','B','12');
$this->cell(136,8,'P . O . BOX 124-001 Mukurwe-Ine',0,0,'R');
$this->Ln();


$this->cell(48,8,'Kimathi Road',0,0,'L');
$this->cell(142,8,'Tel: 0722916072 | 0718248272',0,0,'R');
$this->Ln();
    
$this->cell(50,8,'Near Gitare Shopping Center',0,0,'L');
$this->cell(144,8,'Email: info@kiritisecondary.com',0,0,'R');
$this->Ln();
    
$this->cell(200,8,'Website: www.kiritisecondary.ac.ke',0,0,'R');
$this->Ln();


}
function footer(){
$this->setY(-30);
$this->setfont('Arial','i',12);
$this->cell(70,8,'Class Teacher',0,0,'L');
$this->cell(190,8,'School Principal',0,0,'C');
$this -> SetLineWidth(1);
$this -> Line(0, 275, 279,275);
$this->Ln(); 
$this->cell(0,8,'For Quality Education to Take You Places.',0,0,'C');
}

function headertable(){
include "../include/functions.php";
$conn = db_conn();
$class = $_POST['askclass'];
$exam = $_POST['exam'];

$sql ="select student, admno from marks where examname like '%$exam%' and class like '%$class%' group by admno order by admno ASC";
$ret = $conn->query($sql);

while($row1 = $ret->fetchArray(SQLITE3_ASSOC) ) 
{
$this -> SetLineWidth(2);
$this -> Line(0, 55, 210, 55);
$this -> SetLineWidth(0.2);
$this->Ln(); 
$this->setfont('Times','B',18);

$this->cell(190,10,'STUDENT PROGRESS REPORT',0,0,'C');

$this->Ln();

$this->setfont('Times','B',14);
$admno = $row1["admno"];

$this->cell(35,10,'CLASS :',0,0,'L');
$this->setfont('Times','i',14);
$this->cell(70,10,$class,0,0,'L');
$this->setfont('Times','B',14);
$this->cell(30,10,'EXAM :',0,0,'L');
$this->setfont('Times','i',12);
$this->cell(76,10,$exam,0,0,'L');
$this->Ln();
    
$this->setfont('Times','B',14);
$this->cell(80,10,'STUDENT NAME :',0,0,'L');
$this->setfont('Times','i',14);
$this->cell(10,10,decryptthis($row1["student"], $key),0,0,'L');
$this->Ln();

$this->setfont('Times','B',14);
$this->cell(80,10,'ADMISSION NUMBER :',0,0,'L');
$this->setfont('Times','i',14);
$this->cell(80,10,decryptthis($row1["admno"], $key),0,0,'L');
$this->Ln();
    
$this->setfont('Times','B',14);
$this->cell(53,10,'ATTENDANCE :',0,0,'L');
$this->setfont('Times','',14);
$this->cell(50,10,'Very Good : .............',0,0,'L');
$this->cell(50,10,'Good : .............',0,0,'L');
$this->cell(50,10,'Poor : .............',0,0,'L');
$this->Ln();
$this->Ln();

$this->setfont('Times','B',12);
$this->cell(35,8,'SUBJECT',1,0,'C');
$this->cell(22,8,' OPENER ',1,0,'C');
$this->cell(15,8,' CAT ',1,0,'C');
$this->cell(30,8,'END - TERM',1,0,'C');
$this->cell(28,8,'AVERAGE',1,0,'C');
$this->cell(28,8,'GRADE',1,0,'C');
$this->cell(26,8,'TEACHER',1,0,'C');
$this->Ln();
    
$sqlm ="SELECT subject, opener, midterm, endterm, average, remarks  from marks where admno like '%$admno%' and examname like '%$exam%' group by subject order by subject DESC";
$retm = $conn->query($sqlm);
    

while($row = $retm->fetchArray(SQLITE3_ASSOC) ) 
{

$this->setfont('Times','',12);

$this->cell(35,8,decryptthis($row["subject"], $key),1,0,'C');
$this->cell(22,8,decryptthis($row["opener"], $key),1,0,'C');
$this->cell(15,8,decryptthis($row["midterm"], $key),1,0,'C');
$this->cell(30,8,decryptthis($row["endterm"], $key),1,0,'C');
$this->cell(28,8,decryptthis($row["average"], $key),1,0,'C');
$this->cell(28,8,decryptthis($row["remarks"], $key),1,0,'C');
$this->cell(26,8,' ',1,0,'C');
$this->Ln();
}
$this->Ln();
$total = 0;
$res = "select average from marks where admno = '$admno' ";
$result = $conn->query($res);
while($row = $result->fetchArray(SQLITE3_ASSOC) ) 
{
$total = $total+decryptthis($row["average"], $key);
}
$this->cell(55,12,'Total Marks',0,0,'L');
$this->cell(40,12,round($total,2),0,0,'L');

$this->cell(55,12,'Mean Grade',0,0,'L');

if($total/11 < 30){
$this->cell(40,12,'E',0,0,'L');
}
else if($total/11 < 40){
$this->cell(40,12,'D',0,0,'L');
}
else if($total/11 < 60){
$this->cell(40,12,'C',0,0,'L');
}
else if($total/11 < 80){
$this->cell(40,12,'B',0,0,'L');
}
else if($total/11 <= 100){
$this->cell(40,12,'A',0,0,'L');
}
else{
$this->cell(40,12,'Invalid',0,0,'L');
}

$this->Ln();
$this->setfont('Times','B',14);
$this->cell(35,10,'REMARKS :',0,0,'L');
$this->setfont('Arial','iu',14);
$this->cell(40,10,'Work hard to maintain your Grade',0,0,'L');

$this->Ln();


$this->setfont('Times','B',14);
//$this->cell(70,15,'Principal',0,0,'L');
//$this->cell(190,15,'Class Teacher',0,0,'C');
$this -> Line(10, 265, 50,265);
$this -> Line(150, 265, 200,265);
$this->AddPage();
$this -> Line(5, 55, 205, 55);
$this->Ln();
$this->setfont('Times','B',20);
}
}
}

$pdf = new mypdf();
$pdf->AliasNbpages();
$pdf->Addpage('P','A4',0);
$pdf->headertable();
$pdf->Output();
?>
