<?php require_once "header.php"; ?>
<div class="container">
<h2 class="mb-4">
<button class="btn btn-primary" type="button" data-toggle="modal" data-target="#SMS">New Email</button> 
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
	  <th class="th-sm w-20">
	  Recepient
      </th>
      <th class="th-sm w-70">
	  Message
      </th>
    </tr>
  </thead>
  <tbody>
	<?php
		$sql ="SELECT * from mails ORDER BY mail_id desc";
		$res = $conn->query($sql);
		while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
    <tr>
	  <td style="display:none"><?php echo $row['mail_id']; ?></td>
      <td><?php echo $row['date_sent']; ?></td>
	  <td><?php echo $row['subject']; ?></td>
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
        <h5 class="modal-title" id="exampleModalLabel">SEND BULKY EMAILS</h5>
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
			  <option value="employees">All employees</option>
			  <option value="parents">Active parents</option>
			</select>
		   </div>
		   <div class="form-group">
		    <label for="recipient-name" class="col-sm-form-label">Subject:</label>
		    <input type="text" class="form-control" id="subject" name="subject" required>
		  </div>
		  <div class="form-group">
            <textarea class="form-control" id="message" name="message" Placeholder="Write Here:" required></textarea>
          </div>
		  <div class="modal-footer">
			<button type="submit" name="submit" value="mail" class="btn btn-primary">Send</button>
		</div>
        </form>
      </div>
  </div></div>
</div>

<?php require_once "../include/footer.php"; ?>