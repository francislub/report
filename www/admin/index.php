<?php
	 if (isset($_GET['dashboard'])) {
		include 'dashboard.php';
	 }
	 
	  if (isset($_GET['emp'])) {
		  include 'employees.php';
	  }
	  
	  if (isset($_GET['reg_employee'])) {
		  include 'reg_employee.php';
	  }

	  if (isset($_GET['streem'])) {
		include 'streem.php';
	  }
	  
	  if (isset($_GET['class'])) {
		 include 'class.php';
	  }

	  if (isset($_GET['subject'])) {
		  include 'subjects.php';
	  }
	  if (isset($_GET['grading'])) {
		include 'grading.php';
	  }
	  if (isset($_GET['remarks'])) {
		include 'subjects.php';
	  }
	  
	  if (isset($_GET['exam'])) {
		include 'exam.php';
	  }
	  
	  if (isset($_GET['emp_report'])) {
		include 'emp_report.php';
	  }
	  
	  if (isset($_GET['class_report'])) {
		include 'class_report.php';
	  }
	  
	  if (isset($_GET['subjects_report'])) {
		include 'subjects_report.php';
	  }
	  
	  if (isset($_GET['exam_report'])) {
		include 'exam_report.php';
	  }

?>
