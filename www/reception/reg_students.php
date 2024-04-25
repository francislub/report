<?php 
require_once "header.php";
?>

<!--Items Display-->
<div class="container">

<h2 class="mb-4 text-secondary">
STUDENT REGISTRATION FORM
</h2>
<hr>
<form action="action.php" method="POST" enctype="multipart/form-data">
<input type="hidden" class="form-control" id="served_by" name="served_by" value="<?php echo $session_id; ?>" onkeydown="return false">
<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Full name:</label>
		<input type="text" class="form-control" id="studentname" name="studentname" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Adm NO:</label>
		<input type="text" class="form-control" id="admno" name="admno" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Date of Birth:</label>
		<input type="date" class="form-control" id="dob" name="dob" required>
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Admission Date:</label>
		<input type="date" class="form-control" id="doa" name="doa" required>
	</div>
	<div class="col-sm">
		<div class="form-group">
			<label for="recipient-name" class="col-sm-form-label">Select Class:</label>
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="class" name="class" required>
			  <option selected value="">Select Class</option>
			  <?php
				$sql ="SELECT * FROM class";
				$res = $conn->query($sql);
				while($row = $res->fetchArray(SQLITE3_ASSOC)){
				?>
				<option value="<?php echo $row['classname']; ?>"><?php echo $row['classname']; ?></option>
			  <?php } ?>
			</select>
		</div>
	</div>
	<div class="col-sm">
		<div class="form-group">
			<label for="recipient-name" class="col-sm-form-label">Select Dormitory:</label>
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="dorm" name="dorm" required>
			  <option selected value="">Select Dorm</option>
			  <option selected value="Mt Kenya">Mt Kenya</option>
			  <option selected value="Mt Elgon">Mt Elgon</option>
			  <option selected value="Mt Longonot">Mt Longonot</option>
			</select>
		</div>
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Religion Name:</label>
		<div class="form-group">
			<select class="form-select form-select-sm" aria-label=".form-select-md example" id="religion" name="religion" required>
			  <option selected value="">Select Religion</option>
			  <option selected value="Christian">Christian</option>
			  <option selected value="Muslim">Muslim</option>
			  <option selected value="Hindu">Hindu</option>
			</select>
		</div>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Guardian:</label>
		<input type="text" class="form-control" id="parent" name="parent" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Phone Number:</label>
		<input type="text" class="form-control" id="contact" name="contact" required>
	</div>	
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Email address:</label>
		<input type="email" class="form-control" id="email" name="email" required>
	</div>
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
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Ward:</label>
		<div class="form-group">
			<input type="text" class="form-control" id="ward" name="ward" required>
		</div>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Physical address:</label>
		<input type="text" class="form-control" id="areacode" name="areacode" required>
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
		<label for="recipient-name" class="col-sm-form-label">Former School Name:</label>
		<input type="text" class="form-control" id="fschool" name="fschool" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Former School Contact:</label>
		<input type="text" class="form-control" id="fschool_contact" name="fschool_contact" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">KCPE Marks:</label>
		<input type="number" class="form-control" id="kcpe" name="kcpe" required>
	</div>
</div>

<div class="row mb-2">
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Upload passport photo:</label>
		<input type="file" class="form-control" id="photo" name="photo" accept="image/jpeg" required>
	</div>
	<div class="col-sm">
		<label for="recipient-name" class="col-sm-form-label">Upload application form:</label>
		<input type="file" class="form-control" id="reg_form" name="reg_form" accept=".pdf" required>
	</div>
</div>

<div class="row">
	<div class="col-md">
		<h2 class="mb-4">
			<button type="submit" name="submit" value="register" class="btn btn-primary">Register</button>
		</h2>
	</div>
</div>

</form>

</div>

<?php require_once "../include/footer.php"; ?>