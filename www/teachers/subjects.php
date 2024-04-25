<?php require_once "header.php"; ?>
<div class="container">
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
	  CLASS
      </th>
	  <th class="th-sm">
	  TEACHER
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
	   <td><?php echo $row['classid']; ?></td>
	  <td><?php echo $row['teacherid']; ?></td>
	  <td><?php echo $row['category']; ?></td>
      <td class="text-center">
		<button class="btn btn-info btn-sm btn_print_bill disabled" id="<?php echo $row['subjectid']; ?>" data-toggle="modal" data-target="#UpdateItem" onclick="edit_product(this.id)"><i class="fa fa-pencil"></i></button>
		<button class="btn btn-danger btn-sm btn_print_bill disabled" id="<?php echo $row['subjectid']; ?>" onclick="NotAllowed()"><i class="fa fa-times"></i></button>
      </td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>

<div id="pageNavPosition" class="pager-nav"></div>
</div>

<?php require_once "../include/footer.php"; ?>