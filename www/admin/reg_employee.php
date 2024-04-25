<?php 
require_once "header.php";
?>

<!--Items Display-->
<div class="container">

<h2 class="mb-4 text-secondary">
Employee Registration Form
</h2>
<hr>
<form action="action.php" method="POST" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="served_by" name="served_by" value="<?php echo $session_id; ?>" onkeydown="return false">
<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Full name:</label>
		<input type="text" class="form-control" id="fname" name="fname" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">ID number:</label>
		<input type="number" class="form-control" id="idno" name="idno" required>
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
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Phone Number:</label>
		<input type="text" class="form-control" id="phone" name="phone" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Email:</label>
		<input type="email" class="form-control" id="mail" name="mail" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Date of birth:</label>
		<input type="date" class="form-control" id="dob" name="dob" required>
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Username:</label>
		<input type="text" class="form-control" id="username" name="username" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Occupation:</label>
		<input type="text" class="form-control" id="job" name="job" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Account No:</label>
		<input type="number" class="form-control" id="ac_no" name="ac_no" required>
	</div>	
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">KRA Pin:</label>
		<input type="text" class="form-control" id="kra" name="kra" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">NHIF No:</label>
		<input type="text" class="form-control" id="nhif" name="nhif" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">NSSF No:</label>
		<input type="number" class="form-control" id="nssf" name="nssf" required>
	</div>	
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">County:</label>
		<div class="form-group">
			<input type="text" class="form-control" id="jimbo" name="county" required>
		</div>

	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Constituency:</label>
		<div class="form-group">
			<input type="text" class="form-control" id="bunge" name="bunge" required>
		</div>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Ward:</label>
		<div class="form-group">
			<input type="text" class="form-control" id="ward" name="ward" required>
		</div>
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Physical address:</label>
		<input type="text" class="form-control" id="areacode" name="areacode" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Next of kin:</label>
		<input type="text" class="form-control" id="kin" name="kin" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Next of kin phone number:</label>
		<input type="text" class="form-control" id="kinphone" name="kinphone" required>
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Relationship to Next of Kin:</label>
		<input type="text" class="form-control" id="kinrship" name="kinrship" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Upload passport photo:</label>
		<input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Position:</label>
		<div class="form-group">
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="position" name="position" required>
			  <option selected value="">Select position</option>
			  <option value="Receptionist">Receptionist</option>
			  <option value="Teacher">Teacher</option>
			  <option value="Administrator">Administrator</option>
			</select>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md">
		<h2 class="mb-4">
			<button type="submit" name="submit" value="addemp" class="btn btn-primary">Register</button>
		</h2>
	</div>
</div>

</form>

</div>

<?php require_once "../include/footer.php"; ?>