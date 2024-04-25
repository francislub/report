<?php require_once "header.php"; ?>
<div class="container">
			<div class="panel panel-default">
			  <div class="panel-heading">
				<h4 class="mb-4 text-secondary">ADMINSTRATOR DASHBOARD</h4>
			  </div>
			  <div class="panel-body">
				<div class="row h-75 mb-6">
				<div class="col-md-4 h-100 p-8">
                  <div class="well dash-box bg-warning rounded h-100">
                      <h2 class="text-light"><span> <i class='fas fa-user-graduate text-primary' style='font-size:32px;'></i> </span>
						<?php
							$stmt = $conn->query("SELECT coalesce(COUNT(name),0) as 'tstudents' FROM student");
							while($row = $stmt->fetchArray(SQLITE3_ASSOC)){
						?>
					</h2>
                    <h6 class="text-light"> Total Satudents <?php echo $row['tstudents']; }?></h6>
                  </div>
                </div>
				
				<div class="col-md-4 h-100 p-8">
                  <div class="well dash-box bg-primary rounded">
                    <h2 class="text-light"><span><i class='fas fa-folder-open text-light' style='font-size:32px;'></i></span>
						<?php
								$smt = $conn->query("SELECT coalesce(COUNT(name),0) as 'tsubject' FROM subject");
								while($res = $smt->fetchArray(SQLITE3_ASSOC)){
							?>
					</h2>
                    <h6 class="text-light"> Total Subjects <?php echo $res['tsubject']; }?></h6>
                  </div>
                </div>
				
				<div class="col-md-4 h-100 p-8">
                  <div class="well dash-box bg-warning rounded">
                    
                    <h2 class="text-light"><span><i class='fas fa-laptop-house text-primary' style='font-size:32px;'></i></span>
						<?php
							$stm = $conn->query("SELECT coalesce(COUNT(examname),0) as 'Texam' FROM exam");
							while($rows = $stm->fetchArray(SQLITE3_ASSOC)){
						?>
					</h2>
                    <h6 class="text-light"> Total Classes <?php echo $rows['Texam'];; }?></h6>
                  </div>
                </div>
			  </div>
			  
			<div class="row">
				<div class="table-responsive">
					<h4 class="mb-4 text-secondary text-center">UPCOMING EVENTS</h4>
					<hr>
					<div class="response"></div>
					<div id='calendar'></div>
				</div>
			<div id="pageNavPosition" class="pager-nav"></div>
		
  </div>
  </div>
</div>

</div>
<?php require_once "../include/footer.php"; ?>