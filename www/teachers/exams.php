<?php require_once "header.php"; ?>
<div class="container">
<h2 class="mb-4">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddMarks">ADD MARKS</button>
</h2>
<h2 class="mb-4">
<div class="form-group">
	<input type="text" id="myInput" class="form-control" placeholder="Search ...." onkeyup="TableFilter()">
</div>
</h2>

<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-nowrap" cellspacing="0" width="100%">
<thead>
    <tr>
      <th class="th-sm">
	  STUDENT NAME
      </th>
      <th class="th-sm text-center">
	  ADM-NO:
      </th>
      <th class="th-sm text-center">
	  CLASS
      </th>
      <th class="th-sm text-center">
	  SUBJECT
	  </th>
	   <th class="th-sm text-center">
	  CAT
      </th>
      <th class="th-sm text-center">
	  END-TERM
      </th>
      <th class="th-sm text-center">
	  AVERAGE
	  </th>
	  <th class="th-sm text-center">
	  GRADES
	  </th>
	  <th class="th-sm text-center">
	  ACTION
	  </th>
    </tr>
  </thead>
<tbody>
  <?php
	$sql ="SELECT * from marks";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
	<tr>
	  <td><?php echo decryptthis($row['student'], $key); ?></td>
      <td class="text-center"><?php echo $row['admno']; ?></td>
	  <td class="text-center"><?php echo $row['class']; ?></td>
	  <td class="text-center"><?php echo decryptthis($row['subject'], $key); ?></td>
	  <td class="text-center"><?php echo decryptthis($row['midterm'], $key); ?></td>
      <td class="text-center"><?php echo decryptthis($row['endterm'], $key); ?></td>
	  <td class="text-center"><?php echo decryptthis($row['average'], $key); ?></td>
	  <td class="text-center"><?php echo decryptthis($row['remarks'], $key); ?></td>
      <td class="text-center">
		<button class="btn btn-info btn-sm btn_print_bill" id="<?php echo $row['classid']; ?>" data-toggle="modal" data-target="#UpdateItem" onclick="edit_product(this.id)"><i class="fa fa-pencil"></i></button>
		<button class="btn btn-danger btn-sm btn_print_bill" id="<?php echo $row['classid']; ?>" onclick="NotAllowed()"><i class="fa fa-times"></i></button>
      </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>

<div id="pageNavPosition" class="pager-nav"></div>
</div>

<div class="modal fade" id="AddMarks" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">SEARCH MARK SHEET</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="marks.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="uuser" value="<?php echo $session_id; ?>" />
		  <div class="row">
			  	<div class="col">
					<label for="recipient-name" class="col-form-label">Select Academic Year:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="year" name="year" required>
					  <option selected value="">Select year</option>
					<?php 
						$res ="SELECT year from exam where status = 'Active' order by year ASC";
						$ret1 = $conn->query($res);
						while($row = $ret1->fetchArray(SQLITE3_ASSOC) ) 
						{
					?>
						<option value="<?php echo $row["year"]; ?>"> <?php echo $row["year"]; ?> </option>
					<?php } ?>
					</select>
				   </div>
				</div>
				
				<div class="col">
				  <label for="recipient-name" class="col-form-label">Select Exam:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="exam" name="exam" required>
					  <option selected value="">Select exam</option>
					<?php 
						$res ="SELECT * from exam where status = 'Active' ORDER BY examid DESC";
						$ret1 = $conn->query($res);
						while($row = $ret1->fetchArray(SQLITE3_ASSOC) ) 
						{
					?>
						<option value="<?php echo $row["examname"]; ?>"> <?php echo $row["examname"]; ?> </option>
					<?php } ?>
					</select>
				   </div>
			   </div>  
		  </div>
		  
		  <div class="row">
			  	<div class="col">
					<label for="recipient-name" class="col-form-label">Select Class:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="class" name="class" required>
					  <option selected value="">Select class</option>
					<?php 
						$sql ="SELECT * from class ORDER BY classid DESC";
						$res = $conn->query($sql);
						while($row = $res->fetchArray(SQLITE3_ASSOC)){
							$id = $row["classname"];
					?>
						<option value="<?php echo $row["classname"]; ?>"> <?php echo $row["classname"]; ?> </option>
					<?php } ?>
					</select>
				   </div>
				</div>
				
				<div class="col">
				<label for="recipient-name" class="col-form-label">Select Subject:</label>
			  <div class="form-group">
				<select class="form-select form-select-sm" aria-label=".form-select-md example" id="subject" name="subject" required>
				  <option selected value="">Select subject</option>
					<?php 
						$sql ="SELECT * from subject order by subjectid DESC";
						$ret = $conn->query($sql);
						while($rows = $ret->fetchArray(SQLITE3_ASSOC)){
					?>
						<option value="<?php echo $rows["name"]; ?>"> <?php echo $rows["name"]; ?> </option>
					<?php } ?>
				</select>
			   </div>
			   </div>
		  </div>

		<div class="modal-footer">
			<button type="submit" name="submit" value="search" class="btn btn-primary">SEARCH</button>
		</div>
        </form>
      </div>
  </div></div>
</div>
<?php require_once "../include/footer.php"; ?>