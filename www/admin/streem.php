<?php require_once "header.php"; ?>
<div class="container">
<h2 class="mb-4">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#NewStreem">ADD STREEMS</button>
</h2>
<h2 class="mb-4">
<div class="form-group">
	<input type="text" id="myInput" class="form-control" placeholder="Search streem...." onkeyup="TableFilter()">
</div>
</h2>

<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-nowrap" cellspacing="0" width="100%">
<thead>
    <tr>
      <th class="th-sm">
	  S.NO
      </th>
      <th class="th-sm">
	  STREEM
      </th>
	  <th class="th-sm text-center">
	  ACTION
	  </th>
    </tr>
  </thead>
<tbody>
  <?php
	$sql ="SELECT * from streem";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
	<tr>
	  <td><?php echo $row['sno']; ?></td>
      <td><?php echo $row['streem']; ?></td>
      <td class="text-center">
		<?php
		echo "<a href='delete/del_sreem.php?sno=" . $row["sno"] . "' onclick='return confirm(\"Are you sure you want to delete?\");'> <button class='btn btn-danger'><i class='fa fa-trash'></i> Delete</button></a>";
        ?>            
      </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>

<div id="pageNavPosition" class="pager-nav"></div>
</div>

<div class="modal fade" id="NewStreem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">NEW STREEM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="user" value="<?php echo $session_id; ?>" />
            <div class="row">
				<div class="col">
				<label for="recipient-name" class="col-form-label">Streem:</label>
				<input type="text" class="form-control" id="streem" name="streem" required>
				</div>
		  </div>

		<div class="modal-footer">
			<button type="submit" name="submit" value="addstreem" class="btn btn-primary">ADD STREEM</button>
		</div>
        </form>
      </div>
  </div></div>
</div>


<div class="modal fade" id="UpdateStreem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">UPDATE STREEM</h5>
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