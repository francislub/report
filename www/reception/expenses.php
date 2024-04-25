<?php require_once "header.php"; ?>
<div class="container">
<h2 class="mb-4">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#Expensess">AddNew Expenses</button> 
</h2>
<h2 class="mb-4"> 
<div class="form-group">
	<input type="text" id="myInput" class="form-control" placeholder="Search...." onkeyup="TableFilter()">
</div>
</h2>

<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">
	  DATE
      </th>
	  <th class="th-sm">
	  VENDOR
      </th>
	  <th class="th-sm">
	  EXPENSES
      </th>
      <th class="th-sm">
	  AMOUNT
      </th>
	  <th class="th-sm">
	  REF NUMBER
      </th>
	  <th class="th-sm">
	  ACTION
      </th>
    </tr>
  </thead>
  <tbody>
	<?php
		$sql ="SELECT * from expenses ORDER BY id desc";
		$res = $conn->query($sql);
		while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
		<tr>
		  <td><?php echo $row['reg_date']; ?></td>
		  <td><?php echo $row['vendor']; ?></td>
		  <td><?php echo $row['expense_name']; ?></td>
		  <td><?php echo $row['amount']; ?></td>
		  <td><?php echo $row['refno']; ?></td>		  	  
		  <td>
			<button class="btn btn-info btn-sm" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#UpdateExpensess" onclick="getid(this.id)"><i class="fa fa-pencil"></i></button>
		<button class="btn btn-danger btn-sm" id="<?php echo $row['id']; ?>" onclick="NotAllowed()"><i class="fa fa-times"></i></button>
		  </td>
		</tr>
		<?php } ?>

  </tbody>
  
</table>
</div>

<div id="pageNavPosition" class="pager-nav"></div>
</div>

<div class="modal fade" id="Expensess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">ADD EXPENSES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST">
		<input type="hidden" name="recordedby" value="<?php echo $session_id; ?>" required />
		  <div class="row">
			<div class="col">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Vendor:</label>
					<input type="text" class="form-control" id="vendor" name="vendor" required>
				</div>
			</div>
			<div class="col">
			  <div class="form-group">
				<label for="recipient-name" class="col-form-label">Expense:</label>
				<input type="text" class="form-control" id="expense" name="expense" required>
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col">
			  <div class="form-group">
				<label for="message-text" class="col-form-label">Ref Number:</label>
				<input type="text" class="form-control" id="ref_no" name="ref_no" min="1">
			  </div>
			</div>
			<div class="col">
			  <div class="form-group">
				<label for="message-text" class="col-form-label">Amount:</label>
				<input type="number" class="form-control" id="amount" name="amount" min="1" required>
			  </div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" name="submit" value="Expense" class="btn btn-primary">Add Expense</button>
		</div>
        </form>
      </div>
  </div></div>
</div>

<div class="modal fade" id="UpdateExpensess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">EDIT EXPENSES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST">
        <input type="hidden" name="urecordedby" value="<?php echo $session_id; ?>" required />
		<input type="hidden" id="uid" name="uid" value="" />
		<input type="hidden" name="Urecordedby" value="<?php echo $session_id; ?>" />
		  <div class="row">
			<div class="col">
				<div class="form-group">
					<label for="recipient-name" class="col-form-label">Vendor:</label>
					<input type="text" class="form-control" id="Uvendor" name="Uvendor">
				</div>
			</div>
			<div class="col">
			  <div class="form-group">
				<label for="recipient-name" class="col-form-label">Expense:</label>
				<input type="text" class="form-control" id="Uexpense" name="Uexpense">
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col">
			  <div class="form-group">
				<label for="message-text" class="col-form-label">Ref Number:</label>
				<input type="text" class="form-control" id="Uref_no" name="Uref_no" >
			  </div>
			</div>
			<div class="col">
			  <div class="form-group">
				<label for="message-text" class="col-form-label">Amount:</label>
				<input type="number" class="form-control" id="Uamount" name="Uamount" min="1">
			  </div>
			</div>
		  </div>
		  <div class="modal-footer">
			<button type="submit" name="submit" value="UpdateExpense" class="btn btn-primary">Update Expense</button>
		</div>
        </form>
      </div>
  </div></div>
</div>

<?php require_once "../include/footer.php"; ?>