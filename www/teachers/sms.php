<?php require_once "header.php"; ?>
<div class="container">
<h4 class="mb-4"> SMS LIST </h4>
<h2 class="mb-4">
<div class="form-group">
	<input type="date" id="myInput" class="form-control" placeholder="Search date...." onkeyup="TableFilter()">
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

<?php require_once "../include/footer.php"; ?>