<?php
	 if (isset($_GET['dashboard'])) {
		include 'dashboard.php';
	 }
	 
	  if (isset($_GET['students'])) {
		  include 'students.php';
	  }
	  
	  if (isset($_GET['reg_students'])) {
		  include 'reg_students.php';
	  }
	  
	  if (isset($_GET['visitors'])) {
		 include 'visitors.php';
	  }

	  if (isset($_GET['expenses'])) {
		  include 'expenses.php';
	  }
	  
	  if (isset($_GET['sms'])) {
		include 'sms.php';
	  }

	  if (isset($_GET['mails'])) {
		include 'mails.php';
	  }
	  
	  if (isset($_GET['students_report'])) {
		include 'students_report.php';
	  }
	  
	  if (isset($_GET['visitors_report'])) {
		include 'visitors_report.php';
	  }
	  
	  
	  if (isset($_GET['Expenses_report'])) {
		include 'Expenses_report.php';
	  }

?>
