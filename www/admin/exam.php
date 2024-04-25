<?php require_once "header.php"; ?>
<div class="container">
<h2 class="mb-4">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AddExam">ADD EXAM</button>
</h2>
<h2 class="mb-4">
<div class="form-group">
	<input type="text" id="myInput" class="form-control" placeholder="Search exam...." onkeyup="TableFilter()">
</div>
</h2>

<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-nowrap" cellspacing="0" width="100%">
<thead>
    <tr>
      <th class="th-sm">
	  EXAM NAME
      </th>
      <th class="th-sm">
	  YEAR
      </th>
      <th class="th-sm">
	  DATE ADDED
      </th>
      <th class="th-sm">
	  STATUS
	  </th>
	  <th class="th-sm text-center">
	  ACTION
	  </th>
    </tr>
  </thead>
<tbody>
  <?php
	$sql ="SELECT * from exam";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
	<tr>
	  <td><?php echo $row['examname']; ?></td>
      <td><?php echo $row['year']; ?></td>
	  <td><?php echo $row['date_added']; ?></td>
	  <td><?php echo $row['status']; ?></td>
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

<div class="modal fade" id="AddExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">NEW EXAM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="user" value="<?php echo $session_id; ?>" />
            <div class="row">
				<div class="col">
				<label for="recipient-name" class="col-form-label">Exam Name:</label>
				<input type="text" class="form-control" id="examname" name="examname">
				</div>
		
				<div class="col">
					<label for="recipient-name" class="col-form-label">Year:</label>
					<input type="number" class="form-control" id="year" name="year" min="2022">
				</div>
			   
		  </div>
		  <div class="row">
			  	<div class="col">
					<label for="recipient-name" class="col-form-label">Date Added:</label>
					<input type="date" class="form-control" id="DateAdded" name="DateAdded">
				</div>
				<div class="col">
				  <label for="recipient-name" class="col-form-label">Status:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="status" name="status" required>
					  <option selected value="">Select Option</option>
					  <option value="Active">Active</option>
					  <option value="Inactive">Inactive</option>
					</select>
				   </div>
				</div>				
		  </div>
		<div class="modal-footer">
			<button type="submit" name="submit" value="addexam" class="btn btn-primary">ADD EXAM</button>
		</div>
        </form>
      </div>
  </div></div>
</div>


<div class="modal fade" id="UpdateItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE PRODUCT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="user" value="<?php echo $session_id; ?>" />
            <div class="row">
				<div class="col">
				<label for="recipient-name" class="col-form-label">Exam Name:</label>
				<input type="text" class="form-control" id="Uexamname" name="Uexamname">
				</div>
		
				<div class="col">
					<label for="recipient-name" class="col-form-label">Year:</label>
					<input type="number" class="form-control" id="Uyear" name="Uyear">
				</div>
			   
		  </div>
		  <div class="row">
			  	<div class="col">
					<label for="recipient-name" class="col-form-label">Date Added:</label>
					<input type="date" class="form-control" id="UDateAdded" name="UDateAdded">
				</div>
				<div class="col">
				  <label for="recipient-name" class="col-form-label">Status:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="Ustatus" name="Ustatus" required>
					  <option selected value="">Select Option</option>
					  <option value="Active">Active</option>
					  <option value="Inactive">Inactive</option>
					</select>
				   </div>
				</div>				
		  </div>
		<div class="modal-footer">
			<button type="submit" name="submit" value="UpdateExam" class="btn btn-primary">UPDATE EXAM</button>
		</div>
        </form>
      </div>
  </div></div>
</div>
<?php require_once "../include/footer.php"; ?>