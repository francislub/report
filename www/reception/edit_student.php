<?php 
require_once "header.php";
$admno = $_GET['admno'];
?>

<!--Items Display-->
<div class="container">

<h2 class="mb-4 text-secondary">
UPDATE MEMBER REGISTRATION DETAILS
</h2>
<hr>
<form action="action.php" method="POST" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="served_by" name="served_by" value="<?php echo $session_id; ?>" onkeydown="return false">
<?php
	$sql ="SELECT * FROM student where admno = '$admno'";
	$res = $conn->query($sql);
	while($row = $res->fetchArray(SQLITE3_ASSOC)){
	?>
	
<div class="row mb-2">
    
	<div class="col-sm">
		<img src="/passport/<?php echo $row['photo']; ?>" class="rounded" width="128px" height="128px" />
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Upload passport photo:</label>
		<input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Upload application form:</label>
		<input type="file" class="form-control" id="reg_form" name="reg_form" accept=".pdf">
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Full name:</label>
		<input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['name']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">ID number:</label>
		<input type="text" class="form-control" id="idno" name="idno" value="<?php echo $row['admno']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">KRA pin:</label>
		<input type="text" class="form-control" id="krapin" name="krapin" value="<?php echo $row['kra_pin']; ?>">
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Phone line1:</label>
		<input type="text" class="form-control" id="phone1" name="phone1" value="<?php echo $row['phone_line1']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Phone line2:</label>
		<input type="text" class="form-control" id="phone2" name="phone2" value="<?php echo $row['phone_line2']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Email:</label>
		<input type="email" class="form-control" id="mail" name="mail" value="<?php echo $row['email']; ?>">
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Username:</label>
		<input type="text" class="form-control" id="username" name="username" value="<?php echo $row['username']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Occupation:</label>
		<input type="text" class="form-control" id="job" name="job" value="<?php echo $row['occupation']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Date of birth:</label>
		<input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
	</div>	
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">County:</label>
		<div class="form-group">
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="jimbo" name="jimbo" onchange="select_county()" required>
			  <option selected value="">Select county</option>
			  <?php 
				$smt = $conn->query('SELECT * FROM regions GROUP BY county_id order by county_name');
				$smt->execute();
				while($rows = $smt->fetch()){
				?>
				<option value="<?php echo $rows['county_name']; ?>"><?php echo $rows['county_name']; ?></option>
			  <?php } ?>
			</select>
		</div>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Constituency:</label>
		<div class="form-group">
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="bunge" name="bunge" onchange="select_ward()" required>
			</select>
		</div>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Ward:</label>
		<div class="form-group">
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="ward" name="ward" required>

			</select>
		</div>
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Physical address:</label>
		<input type="text" class="form-control" id="areacode" name="areacode" value="<?php echo $row['physical_address']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Gender:</label>
		<div class="form-group">
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="gender" name="gender" required>
			  <option selected value="">Select gender</option>
			  <option value="Male">Male</option>
			  <option value="Female">Female</option>
			  <option value="Others">Others</option>
			</select>
		</div>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Position:</label>
		<div class="form-group">
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="position" name="position" required>
			  <option selected value="">Select position</option>
			  <option value="Member">Member</option>
			  <option value="Officer">Oficcer</option>
			  <option value="Admin">Administrator</option>
			</select>
		</div>
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Next of kin-1:</label>
		<input type="text" class="form-control" id="kin1" name="kin1" value="<?php echo $row['next_of_kin1']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Next of kin-1 phone number:</label>
		<input type="text" class="form-control" id="kin1phone" name="kin1phone" value="<?php echo $row['kin1_phone']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Relationship to kin-1:</label>
		<input type="text" class="form-control" id="kin1rship" name="kin1rship" value="<?php echo $row['kin1_rship']; ?>">
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Next of kin2:</label>
		<input type="text" class="form-control" id="kin2" name="kin2" value="<?php echo $row['next_of_kin2']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Next of kin-2 phone number:</label>
		<input type="text" class="form-control" id="kin2phone" name="kin2phone" value="<?php echo $row['kin2_phone']; ?>">
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Relationship to kin-2:</label>
		<input type="text" class="form-control" id="kin2rship" name="kin2rship" value="<?php echo $row['kin2_rship']; ?>">
	</div>
</div>

<div class="row">
	<div class="col-md">
		<h2 class="mb-4">
			<button type="submit" name="submit" value="edit_student" class="btn btn-primary">Update</button>
		</h2>
	</div>
</div>
<?php } ?>
</form>

</div>

<?php require_once "../include/footer.php"; ?>