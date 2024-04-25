<?php 
require_once "header.php";
?>

<!--Items Display-->
<div class="container">
<h2 class="mb-4">
<a href="index.php?reg_students" class="btn btn-primary" role="button">NEW STUDENT</a>
</h2>
<h3 class="mb-4">
	<input type="text" id="myInput" class="form-control" placeholder="Search name...." onkeyup="TableFilter()">
</h3>

<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-center text-nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">
	  STUDENT NAME
      </th>
      <th class="th-sm">
	  ADM-NO
      </th>
	  <th class="th-sm">
	  GENDER
      </th>
	  <th class="th-sm">
	  CLASS
      </th>
	  <th class="th-sm">
	  DORMITORY
      </th>
	  <th class="th-sm">
	  PARENT
      </th>
	  <th class="th-sm">
	  PHONE
	  </th>
      <th class="th-sm">
	  EMAIL
      </th class="th-sm">
	  <th class="th-sm">
	  ACTIONS
	  </th>
    </tr>
  </thead>
  <tbody>
  <?php
	$sql ="SELECT * from student ORDER BY admno desc";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
	<tr class="tr-sm">
		<td class="td-sm">
			<?php echo $row['name']; ?>
		</td>
		<td class="td-sm">
			<?php echo $row['admno']; ?>
		</td>
		<td class="td-sm"> 
			<?php echo $row['gender']; ?>
		</td>
		<td class="td-sm"> 
			<?php echo $row['class']; ?>
		</td>
		<td class="td-sm"> 
			<?php echo $row['dorm']; ?>
		</td>
		<td class="td-sm"> 
			<?php echo $row['parent']; ?>
		</td>
		<td class="td-sm">
			<?php echo $row['contact']; ?>
		</td>
		<td class="td-sm">
			<?php echo $row['email']; ?>
		</td>
		<td class="td-sm d-none">
			<a href="../regforms/<?php echo $row['reg_form']; ?>" class="text-primary" target="_blank">download</a>
		</td>
		<td class="text-center">
			<button class="btn btn-success btn-sm" id="<?php echo $row['admno']; ?>" data-toggle="modal" data-target="#profile" onclick="getid(this.id)" disabled><i class="fa fa-eye"></i></button>
			<a href="#Update_User" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Update_User"><i class="fa fa-pencil"></i></a>
			<button class="btn btn-danger btn-sm" id="<?php echo $row['admno']; ?>" onclick="NotAllowed()" disabled><i class="fa fa-times"></i></button>
		</td>
	</tr>
	<?php } ?>
  </tbody>
</table>
</div>

<div id="pageNavPosition" class="pager-nav"></div>
</div>
</div>

<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">MEMBER PROFILE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">

    		<div class="row mb-2">
            	<div class="col-sm">
            		<img src="/images/img_avatar2.png" class="rounded" width="178px" height="178px"/><br>
            		<label for="recipient-name" class="col-sm-form-label">NAME: </label>Eric Mokaya<br>
            		<label for="recipient-name" class="col-sm-form-label">IDNO: </label>12345678
            	</div>
            	<div class="col-sm text-info">
            		<label for="recipient-name" class="col-sm-form-label">Phone Line1:</label>
            		<label for="recipient-name" class="col-sm-form-label">+254700711233</label><br>
            		<label for="recipient-name" class="col-sm-form-label">Phone Line2:</label>
            		<label for="recipient-name" class="col-sm-form-label">+254700711233</label><br>
            		<label for="recipient-name" class="col-sm-form-label">KRA:</label>
            		<label for="recipient-name" class="col-sm-form-label">AD02399484949</label><br>
            		<label for="recipient-name" class="col-sm-form-label">Email:</label>
            		<label for="recipient-name" class="col-sm-form-label">xxx@gmailcom</label><br>
            		<label for="recipient-name" class="col-sm-form-label">Gender:</label>
            		<label for="recipient-name" class="col-sm-form-label">Female</label><br>
            		<label for="recipient-name" class="col-sm-form-label">Dob:</label>
            		<label for="recipient-name" class="col-sm-form-label">02/05/2017</label>
            	</div>
            </div>
            <hr>
            <div class="row mb-2">
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">County:</label>
            		<label for="recipient-name" class="col-sm-form-label">Nairobi</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Constituency:</label>
            		<label for="recipient-name" class="col-sm-form-label">Langata</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Ward</label>
            		<label for="recipient-name" class="col-sm-form-label">Kibera</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Area-code</label>
            		<label for="recipient-name" class="col-sm-form-label">Makao</label>
            	</div>
            </div>
            <hr>
            <div class="row mb-2">
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Next of Kin1:</label>
            		<label for="recipient-name" class="col-sm-form-label">Xyy Xyy Xss</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Next Kin1 Phone</label>
            		<label for="recipient-name" class="col-sm-form-label">+254712356485</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Kin2 Rship</label>
            		<label for="recipient-name" class="col-sm-form-label">Son</label>
            	</div>
            </div>
            <hr>
            <div class="row mb-2">
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Next of Kin 2</label>
            		<label for="recipient-name" class="col-sm-form-label">Makao</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Next of Kin2 Phone:</label>
            		<label for="recipient-name" class="col-sm-form-label">+254712356485</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Kin2 Rship</label>
            		<label for="recipient-name" class="col-sm-form-label">Son</label>
            	</div>
            </div>
            <hr>
            <div class="row mb-2">
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Occupation</label>
            		<label for="recipient-name" class="col-sm-form-label">Information Technology</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Position</label>
            		<label for="recipient-name" class="col-sm-form-label">Member</label>
            	</div>
            	<div class="col-sm">
            		<label for="recipient-name" class="col-sm-form-label">Status</label>
            		<label for="recipient-name" class="col-sm-form-label">Active</label>
            	</div>
            </div>
            <hr>
      </div>
	</div>
  </div>
</div>

<div class="modal fade" id="Update_User" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">EDIT STUDENT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST">			
			<div class="row">
			<div class="col">
			  <div class="form-group">
				<label for="message-text" class="col-form-label">Username:</label>
				<input type="text" class="form-control" id="userid" name="userid" value="<?php echo $session_id?>" onkeydown="return false">
			  </div>
			</div>
			<div class="col">
			  <div class="form-group">
			  <label for="recipient-name" class="col-form-label">Status:</label>
				<select class="form-select form-select-sm" aria-label=".form-select-md example" id="ustatus" name="ustatus" required>
				  <option selected value="">Select</option>
				  <option value="Active">Active</option>
				  <option value="Inactive">Inactive</option>
				</select>
			   </div>
			</div>
			</div>
			  <div class="modal-footer">
				<button type="submit" name="submit" value="edit_user" class="btn btn-primary">Update Account</button>
			</div>
        </form>
      </div>
	</div>
  </div>
</div>

<?php require_once "../include/footer.php"; ?>