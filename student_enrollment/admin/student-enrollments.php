<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='dashboard-index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: dashboard-index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['studentenrollment'])) {
  	$studentid = $_POST['studentid'];
  	$courseid = $_POST['courseid'];


  	$query = "INSERT INTO enrollment (studentid, courseid) VALUES ('$studentid','$courseid');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Inserted!</p>';
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Student Not Inserted, please input right informations!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i> Enroll Student</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="dashboard-index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Students Enrollment</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Student Insert Alert</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="studentid">StudentId</label>
		    <input name="studentid" type="text" class="form-control" id="studentid" value="<?= isset($studentid)? $studentid: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="courseid">CourseId</label>
			<input name="courseid" type="text" class="form-control" id="courseid" value="<?= isset($courseid)? $courseid: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="studentenrollment" value="Add Student enrollment" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>