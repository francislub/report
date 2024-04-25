<div class="modal fade" id="Change_Password" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-light">
        <h5 class="modal-title" id="exampleModalLabel">CHANGE PASSWORD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	  <div class="modal-body">
        <form action="../include/action.php" method="POST">
		  <input type="hidden" name="userid" value="<?php echo $session_id; ?>" >
			<div class="form-group">
				<label for="exampleFormControlInput1">Old Password:</label>
				<input type="password" class="form-control" id="old_password" name="old_password" placeholder="Enter Old password:" required>
			 </div>
			 <div class="form-group">
				<label for="exampleFormControlInput1">New Password:</label>
				<input type="password" class="form-control" id="new_password" name="new_password" minlength="8" placeholder="Enter new password:" required>
			 </div>
		  <div class="modal-footer">
			<button type="submit" name="submit" class="btn btn-primary" value="Change" >Change</button>
		</div>
        </form>
      </div>
	</div>
  </div>
</div>

<div class="modal" id="AlertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title text-light">ERROR ALERT</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>You are not allowed to perform this operation.</p>
      </div>
      <div class="modal-footer">
		<p class="text-left"><i>We lend to success <i><p>
      </div>
    </div>
  </div>
</div>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b1b7de68859f57bdc7bfc3d/1cfhniv8o';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<script src="../include/js/main.js"></script>
<script src="../include/js/popper.js"></script>
<script src="../include/js/bootstrap.min.js"></script>

<script src="../include/fullcalendar/lib/moment.min.js"></script>
<script src="../include/fullcalendar/fullcalendar.min.js"></script>
	
  </body>
</html>