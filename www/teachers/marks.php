<?php 
require_once "header.php"; 
$year = $_POST['year'];
$exam = $_POST['exam'];
$class = $_POST['class'];
$subject = $_POST['subject'];
?>
<div class="container">
<form action="action.php" method="POST" enctype="multipart/form-data">
	<h2 class="mb-4">
	<button class="btn btn-primary" type="submit" name="submit" value="submit_marks">SUBMIT MARKS</button>
	</h2>
	<input type="hidden" name="uuser" value="<?php echo $session_id; ?>" />
	<input type="hidden" name="year" value="<?php echo $year; ?>" />
	<input type="hidden" name="exam" value="<?php echo $exam; ?>" />
	<input type="hidden" name="class" value="<?php echo $class; ?>" />
	<input type="hidden" name="subject" value="<?php echo $subject; ?>" />
		
<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-nowrap">
  <thead>
    <tr>
      <th class="th-sm">
	  STUDENT NAME
      </th>
	  <th class="th-sm">
	  ADMNO:
      </th>
	  <th class="th-sm">
	  OPENNER
      </th>
      <th class="th-sm">
	  MID-TERM
      </th>
	  <th class="th-sm">
	  END-TERM
      </th>
    </tr>
  </thead>
  <tbody>
	<?php
		$sql ="SELECT * from student where `year` like '$year' and `class` like '$class'";
		$res = $conn->query($sql);
		while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
		<tr>
		  <td>
			<div class="col-sm">
			<input type="hidden" class="form-control" name="jina[]"  value="<?php echo $row['name']; ?>" />
			<?php echo $row['name']; ?>
			</div>
		  <td>
			<div class="col-sm">
			<input type="hidden" class="form-control" name="regno[]"  value="<?php echo $row['admno']; ?>" />
			<?php echo $row['admno']; ?>
			<div class="col-sm">
		  <td>
			<div class="col-sm">
			<input type="number" class="form-control" name="opener[]" max="15">
			</div>
		  <td>
			<div class="col-sm">
			<input type="number" class="form-control" name="midterm[]" max="15">
			<div>
		  <td>
			<div class="col-sm">
			<input type="number" class="form-control" name="endterm[]" max="70">
			</div>
		  </td>		  	  
		</tr>
		<?php } ?>
</form>
  </tbody>
  
</table>
</div>

<div id="pageNavPosition" class="pager-nav"></div>
</div>

<?php require_once "../include/footer.php"; ?>