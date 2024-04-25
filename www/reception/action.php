<?php
include "../include/functions.php";
$conn = db_conn();
$action = $_POST['submit'];

switch($action) {
	case 'register':
		$name = $_POST['studentname'];
		$admno = $_POST['admno'];
		$dob = $_POST['dob'];
		$doa = $_POST['doa'];
		$class = $_POST['class'];
		$dorm = $_POST['dorm'];
		$religion = $_POST['religion'];
		$year = date("Y");
		$parent = $_POST['parent'];
		$contact = $_POST['contact'];
		$email = $_POST['email'];
		$county = $_POST['county'];
		$bunge = $_POST['bunge'];
		$ward = $_POST['ward'];
		$areacode = $_POST['areacode'];
		$gender = $_POST['gender'];
		$kcpe = $_POST['kcpe'];
		$fschool = $_POST['fschool'];
		$fscontact = $_POST['fschool_contact'];
		$photo = $_FILES['photo']['tmp_name'];
		$regform = $_FILES['reg_form']['tmp_name'];

		$sql = "INSERT INTO student (name, admno, dob, class, doa, dorm, religion, year, parent, contact, email, county, constituency, ward, areacode, reg_form, gender, kcpe_kcse, former_school, school_contact, photo)
			  VALUES ('$name', '$admno', '$dob', '$class', '$doa', '$dorm', '$religion', '$year', '$parent', '$contact', '$email', '$county', '$bunge', '$ward', '$areacode', '$reg_form', '$gender', '$kcpe', '$fschool', '$fscontact', '$admno')";

		   $ret = $conn->exec($sql);
		   if(!$ret) {
			  echo $conn->lastErrorMsg();
		   } else {
			$conn = null;
			echo "
			<script>alert('Student added successfully!')</script>
			<script>window.location = 'index.php?students'</script>
			";   
		   }
	break;
	
	case 'visitor':
		$name = $_POST['visitor_name'];
		$contact = $_POST['contact'];
		$office = $_POST['office'];
		$date = $_POST['visit_date'];
		$time_in = $_POST['time_in'];
		$time_out = $_POST['time_out'];


		$sql = "INSERT INTO visitors (visitor_name, office, phone, visit_date, time_in, time_out)
			  VALUES ('$name', '$office', '$contact', '$date', '$time_in', '$time_out')";

		$ret = $conn->exec($sql);
		if(!$ret){
		  echo $conn->lastErrorMsg();
		} 
		else{
		$conn = null;
		echo "
		<script>alert('visitor added successfully!')</script>
		<script>window.location = 'index.php?visitors'</script>
		";
		}
		
	break;
	
	case 'Expense':
		$vendor = $_POST['vendor'];
		$expense = $_POST['expense'];
		$ref = $_POST['ref_no'];
		$amount = $_POST['amount'];

		$sql = "INSERT INTO expenses (vendor, expense_name, refno, amount)
			  VALUES ('$vendor', '$expense','$ref', '$amount')";
			  
	   $ret = $conn->exec($sql);
	   if(!$ret){
		  echo $conn->lastErrorMsg();
	   } 
		else{
		$conn = null;
		echo "
		<script>alert('Expense added successfully!')</script>
		<script>window.location = 'index.php?expenses'</script>
		";
		}
	break;
	
	case 'sms':
		$DateAdded = $_POST['DateAdded'];
		$examname = $_POST['examname'];
		$status = $_POST['status'];
		$year = $_POST['year'];

		$sql = "INSERT INTO exam (examname, year, date_added, status)
			  VALUES ('$examname', '$year','$date_added', '$status')";
		
		$ret = $conn->exec($sql);
	   if(!$ret){
		  echo $conn->lastErrorMsg();
	    }
		else{
		$conn = null;
		echo "
		<script>alert('Exam created successfully!')</script>
		<script>window.location = 'inex.php?sms'</script>
		";
		}
	break;
	
	case 'mails':
		$DateAdded = $_POST['DateAdded'];
		$examname = $_POST['examname'];
		$status = $_POST['status'];
		$year = $_POST['year'];

		$sql = "INSERT INTO exam (examname, year, date_added, status)
			  VALUES ('$examname', '$year','$date_added', '$status')";
		
		$ret = $conn->exec($sql);
	   if(!$ret){
		  echo $conn->lastErrorMsg();
	    }
		else{
		$conn = null;
		echo "
		<script>alert('Exam created successfully!')</script>
		<script>window.location = 'inex.php?mails'</script>
		";
		}
	break;
	
	case 'Change':
		$email = $_POST['email'];
		$new_password = md5($_POST['new_password']);
		$sql = $conn->query("UPDATE tutors SET password = '$new_password' WHERE email = '$email' ");
		$conn = null;
		echo "
		<script>alert('Your password has been changed successfully!')</script>
		<script>window.location = '../teachers/index.php'</script>
		";
	break;

}//switch

?>