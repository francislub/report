<?php 
require_once "header.php";
?>

<!--Items Display-->
<div class="container">
<h2 class="mb-4">
<button class="btn btn-warning text-light" data-toggle="modal" data-target="#AddVisitor">NEW VISITOR</button>
</h2>
<h3 class="mb-4">
	<input type="text" id="myInput" class="form-control" placeholder="Search name...." onkeyup="TableFilter()">
</h3>

<div class="table-responsive">
<table id="pager" class="table table-striped table-bordered table-sm text-center text-nowrap" cellspacing="0" width="100%">
  <thead>
    <tr>
	  <th class="th-sm">
	  DATE
      </th><th class="th-sm">
	  VISITOR NAME
      </th>
      <th class="th-sm">
	  CONTACT
      </th>
	  <th class="th-sm">
	  OFFICE
      </th>
	  <th class="th-sm">
	  TIME-IN
      </th>
	  <th class="th-sm">
	  TIME-OUT
	  </th>
	  <th class="th-sm">
	  ACTIONS
	  </th>
    </tr>
  </thead>
  <tbody>
  <?php
	$sql ="SELECT * from visitors ORDER BY id desc";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
	<tr class="tr-sm">
		<td class="td-sm">
			<?php echo $row['visit_date']; ?>
		</td>
		<td class="td-sm">
			<?php echo $row['visitor_name']; ?>
		</td>
		<td class="td-sm"> 
			<?php echo $row['phone']; ?>
		</td>
		<td class="td-sm"> 
			<?php echo $row['office']; ?>
		</td>
		<td class="td-sm"> 
			<?php echo $row['time_in']; ?>
		</td>
		<td class="td-sm">
			<?php echo $row['time_out']; ?>
		</td>
		<td class="text-center">
			<button class="btn btn-success btn-sm" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#view_visitor" onclick="getid(this.id)"><i class="fa fa-eye"></i></button>
			<button class="btn btn-info btn-sm" id="<?php echo $row['id']; ?>" data-toggle="modal" data-target="#edit_visitor" onclick="getid(this.id)"><i class="fa fa-pencil"></i></button>
			<button class="btn btn-danger btn-sm" id="<?php echo $row['id']; ?>" onclick="NotAllowed()"><i class="fa fa-times"></i></button>
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

<div class="modal fade" id="AddVisitor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">ADD VISITOR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="action.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="uuser" value="<?php echo $session_id; ?>" />
		  <div class="row">
			  	<div class="col">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Visitor Name:</label>
						<input type="text" class="form-control" id="visitor_name" name="visitor_name" required>
					</div>
				</div>
				
				<div class="col">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Contact:</label>
						<input type="text" class="form-control" id="contact" name="contact" required>
					</div>
			   </div>  
		  </div>
		  
		  <div class="row">
			  	<div class="col">
					<label for="recipient-name" class="col-form-label">Office:</label>
				  <div class="form-group">
					<select class="form-select form-select-sm" aria-label=".form-select-md example" id="office" name="office" required>
					  <option selected value="Reception">Reception</option>
					  <option selected value="Principal">Principal</option>
					  <option selected value="Deputy">Deputy</option>
					  <option selected value="Senior">Senior</option>
					  <option selected value="Others">Others</option>
					  <option selected value="">Select office</option>
					</select>
				   </div>
				</div>
				
				<div class="col">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Date:</label>
						<input type="date" class="form-control" id="visit_date" name="visit_date" required>
					</div>
			   </div>
		  </div>
		  
		  
		  <div class="row">
			  	<div class="col">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Time-In:</label>
						<input type="text" class="form-control" id="time_in" name="time_in" required>
					</div>
				</div>
				
				<div class="col">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Time-Out:</label>
						<input type="text" class="form-control" id="time_out" name="time_out" required>
					</div>
			   </div>  
		  </div>

		<div class="modal-footer">
			<button type="submit" name="submit" value="visitor" class="btn btn-primary">SAVE</button>
		</div>
        </form>
      </div>
  </div></div>
</div>

<?php require_once "../include/footer.php"; ?>