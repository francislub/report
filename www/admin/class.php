<?php require_once "header.php"; ?>
<div class="container">
<h2 class="mb-4">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#NewClass">ADD CLASS</button>
</h2>
<h2 class="mb-4">
<div class="form-group">
	<input type="text" id="myInput" class="form-control" placeholder="Search product...." onkeyup="TableFilter()">
</div>
</h2>

<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-nowrap" cellspacing="0" width="100%">
<thead>
    <tr>
      <th class="th-sm">
	  CLASS NAME
      </th>
      <th class="th-sm">
	  ROOM NO
      </th>
      <th class="th-sm">
	  CLASS TEACHER
      </th>
	  <th class="th-sm">
	  <!-- FEES -->
	  STREEMS
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
	$sql ="SELECT * from class";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
	<tr>
	  <td><?php echo $row['classname']; ?></td>
      <td><?php echo $row['room_no']; ?></td>
      <td><?php echo $row['classteacher']; ?></td>
	  <td><?php echo $row['fees']; ?></td>
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

<div class="modal fade" id="NewClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">NEW CLASS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="user" value="<?php echo $session_id; ?>" />
            <div class="row">
				<div class="col">
				<label for="recipient-name" class="col-form-label">Class Name:</label>
				<input type="text" class="form-control" id="classname" name="classname" required>
				</div>
		
				<div class="col">
					<label for="recipient-name" class="col-form-label">Class Teacher:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="classteacher" name="classteacher" required>
					  <option selected value="">Select Teacher</option>
					  <?php
						$sql ="SELECT * from employees where position = 'Teacher'";
						$res = $conn->query($sql);
						while($row = $res->fetchArray(SQLITE3_ASSOC)){
					  ?>
						<option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
					  <?php } ?>
					</select>
				   </div>
				</div>
			   
		  </div>
		  <div class="row">
			  	<div class="col">
					<label for="recipient-name" class="col-form-label">Room Number:</label>
					<input type="text" class="form-control" id="room" name="room">
				</div>
				<div class="col">
					<label for="recipient-name" class="col-form-label">Date Added:</label>
					<input type="date" class="form-control" id="date_added" name="date_added">
				</div>				
		  </div>
		  <div class="row">
				<div class="col">
					<label for="recipient-name" class="col-form-label">Streems:</label>
					<input type="number" class="form-control" id="fees" name="fees">
					<?php
						$args = array(
							'type' => 'streem',
							'status' => 'publish',
						);
						$streem = get_posts($args);
						foreach($streem as $key => $streem){ ?>
							<div>
							<label for="<?php echo $key ?>">
								<input type="checkbox" name="streem[]" sno="<?php echo $key ?>" value="<?= $streem->sno ?>">
								<?php echo $streem->streem ?>
							</label>
							</div>
						<?php
						} ?>
			   </div>
				<div class="col">
				  <label for="recipient-name" class="col-form-label">Status:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="status" name="status" required>
					  <option selected value="">Select option</option>
					  <option value="Active">Active</option>
					  <option value="Inactive">Inactive</option>
					</select>
				   </div>
			   </div>
		  </div>

		<div class="modal-footer">
			<button type="submit" name="submit" value="addclass" class="btn btn-primary">ADD CLASS</button>
		</div>
        </form>
      </div>
  </div></div>
</div>


<div class="modal fade" id="UpdateClass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE CLASS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="user" value="<?php echo $session_id; ?>" />
            <div class="row">
				<div class="col">
				<label for="recipient-name" class="col-form-label">Class Name:</label>
				<input type="text" class="form-control" id="Uclassname" name="Uclassname" required>
				</div>
		
				<div class="col">
					<label for="recipient-name" class="col-form-label">Class Teacher:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="Uclassteacher" name="Uclassteacher" required>
					  <option selected value="">Select Teacher</option>
					  <option value="yes">Mr Eric</option>
					  <option value="no">Madam Milkah</option>
					</select>
				   </div>
				</div>
			   
		  </div>
		  <div class="row">
			  	<div class="col">
					<label for="recipient-name" class="col-form-label">Room Number:</label>
					<input type="text" class="form-control" id="Uroom" name="Uroom">
				</div>
				<div class="col">
					<label for="recipient-name" class="col-form-label">Date Added:</label>
					<input type="date" class="form-control" id="Udate_added" name="Udate_added">
				</div>				
		  </div>
		  <div class="row">
				<div class="col">
					<label for="recipient-name" class="col-form-label">Fees:</label>
					<input type="number" class="form-control" id="Ufees" name="Ufees">
			   </div>
				<div class="col">
				  <label for="recipient-name" class="col-form-label">Status:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="Ustatus" name="Ustatus" required>
					  <option selected value="">Select option</option>
					  <option value="Active">Active</option>
					  <option value="Inactive">Inactive</option>
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