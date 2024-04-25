<?php require_once "header.php"; ?>
<div class="container">
<h2 class="mb-4">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#SMS">New Message</button> 
</h2>

<h2 class="mb-4">
<div class="form-group">
	<input type="text" id="myInput" class="form-control" placeholder="Search recepient...." onkeyup="TableFilter()">
</div>
</h2>
<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm w-10">
	  Date
      </th>
      <th class="th-sm w-90">
	  Message
      </th>
  
    </tr>
  </thead>
  <tbody>
	<?php
		$sql ="SELECT * from sms ORDER BY sms_id desc";
		$res = $conn->query($sql);
		while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
    <tr>
	  <td class="d-none"><?php echo $row['recipient']; ?></td>
      <td><?php echo $row['date_sent']; ?></td>
      <td><?php echo $row['message']; ?></td>	  
    </tr>
		<?php } ?>

  </tbody>
  
</table>
</div>
<div id="pageNavPosition" class="pager-nav"></div>
</div>

 <div class="modal fade" id="SMS" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">SEND BULKY SMS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST">
          <input type="hidden" name="recordedby" value="<?php echo $session_id; ?>" required />
		  <div class="form-group">
		  <label for="recipient-name" class="col-form-label">Select Recipient:</label>
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="to" name="to" required>
			  <option selected value="">Select Option</option>
			  <option value="all">All teachers</option>
			  <option value="active">All parents</option>
			</select>
		   </div>
		  <div class="form-group">
            <textarea class="form-control" id="message" name="message" Placeholder="Write Here:" required></textarea>
          </div>
		  <div class="modal-footer">
			<button type="submit" name="submit" value="sms" class="btn btn-primary">Send</button>
		</div>
        </form>
      </div>
  </div></div>
</div>

<?php require_once "../include/footer.php"; ?>