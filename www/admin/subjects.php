<?php require_once "header.php"; ?>
<div class="container">
<h2 class="mb-4">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#NewSubject">ADD SUBJECT</button>
</h2>
<h2 class="mb-4">
<div class="form-group">
	<input type="text" id="myInput" class="form-control" placeholder="Search subject...." onkeyup="TableFilter()">
</div>
</h2>

<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-nowrap" cellspacing="0" width="100%">
<thead>
    <tr>
      <th class="th-sm">
	  SUBJECT
      </th>
      <th class="th-sm">
	  TEACHER
      </th>
      <th class="th-sm">
	  CLASS
      </th>
	  <th class="th-sm">
	  CATEGORY
      </th>
	  <th class="th-sm text-center">
	  ACTION
	  </th>
    </tr>
  </thead>
<tbody>
  <?php
	$sql ="SELECT * from subject";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
	<tr>
	  <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['teacherid']; ?></td>
      <td><?php echo $row['classid']; ?></td>
	  <td><?php echo $row['category']; ?></td>
      <td class="text-center">
		<button class="btn btn-info btn-sm btn_print_bill" id="<?php echo $row['subjectid']; ?>" data-toggle="modal" data-target="#UpdateSubject" onclick="edit_product(this.id)"><i class="fa fa-pencil"></i></button>
		<button class="btn btn-danger btn-sm btn_print_bill" id="<?php echo $row['subjectid']; ?>" onclick="NotAllowed()"><i class="fa fa-times"></i></button>
      </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>

<div id="pageNavPosition" class="pager-nav"></div>
</div>

<div class="modal fade" id="NewSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">NEW SUBJECT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="user" value="<?php echo $session_id; ?>" />
            <div class="row">
				<div class="col">
				<label for="recipient-name" class="col-form-label">Subject Name:</label>
				<input type="text" class="form-control" id="subjectname" name="subjectname">
				</div>
		
				<div class="col">
					<label for="recipient-name" class="col-form-label">Select Teacher:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="teacher" name="teacher" required>
					  <option selected value="">Select teacher</option>
					  <?php 
						$sql ="SELECT * from employees where position = 'Teacher' order by id ASC";
						$ret = $conn->query($sql);
						while($rows = $ret->fetchArray(SQLITE3_ASSOC)){
					?>
						<option value="<?php echo $rows["name"]; ?>"> <?php echo $rows["name"]; ?> </option>
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
					  <option selected value="">Select option</option>
					  <?php 
						$sql ="SELECT * from class order by classid ASC";
						$ret = $conn->query($sql);
						while($rows = $ret->fetchArray(SQLITE3_ASSOC)){
					?>
						<option value="<?php echo $rows["classname"]; ?>"> <?php echo $rows["classname"]; ?> </option>
					<?php } ?>
					</select>
				   </div>
				</div>
				<div class="col">
					<label for="recipient-name" class="col-form-label">Category:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="category" name="category" required>
					  <option selected value="">Select option</option>
					  <option value="Languages">Languages</option>
					  <option value="Science">Science</option>
					  <option value="Business">Business</option>
					  <option value="Humanities">Humanities</option>
					</select>
				   </div>
				</div>				
		  </div>
		<div class="modal-footer">
			<button type="submit" name="submit" value="addsubject" class="btn btn-primary">ADD SUBJECT</button>
		</div>
        </form>
      </div>
  </div></div>
</div>


<div class="modal fade" id="UpdateSubject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE SUBJECT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="user" value="<?php echo $session_id; ?>" />
            <div class="row">
				<div class="col">
				<label for="recipient-name" class="col-form-label">Subject Name:</label>
				<input type="text" class="form-control" id="Usubjectname" name="Usubjectname">
				</div>
		
				<div class="col">
					<label for="recipient-name" class="col-form-label">Select Teacher:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="Uteacher" name="Uteacher" required>
					  <option selected value="">Select teacher</option>
					  <option value="Active">Mr Eric</option>
					  <option value="Inactive">Madam Milkah</option>
					</select>
				   </div>
				</div>
			   
		  </div>
		  <div class="row">
			  	<div class="col">
					<label for="recipient-name" class="col-form-label">Select Class:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="Uclass" name="Uclass" required>
					  <option selected value="">Select option</option>
					  <option value="Active">Form One</option>
					  <option value="Inactive">Form Two</option>
					</select>
				   </div>
				</div>
				<div class="col">
					<label for="recipient-name" class="col-form-label">Category:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="Ucategory" name="Ucategory" required>
					  <option selected value="">Select option</option>
					  <option value="Languages">Languages</option>
					  <option value="Science">Science</option>
					  <option value="Business">Business</option>
					  <option value="Humanities">Humanities</option>
					</select>
				   </div>
				</div>				
		  </div>
		<div class="modal-footer">
			<button type="submit" name="submit" value="updateproduct" class="btn btn-primary">Update Product</button>
		</div>
        </form>
      </div>
  </div></div>
</div>
<?php require_once "../include/footer.php"; ?>