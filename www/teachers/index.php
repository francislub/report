<?php
	if (isset($_GET['dashboard'])) {
	include 'dashboard.php';
	}
	 
	if (isset($_GET['exams'])) {
	  include 'exams.php';
	}

	if (isset($_GET['subjects'])) {
	 include 'subjects.php';
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

	if (isset($_GET['class_merit'])) {
	include 'class_merit.php';
	}

	if (isset($_GET['subjects_report'])) {
	include 'subjects_report.php';
	}

?>
