<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='dashboard-index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: dashboard-index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addcourse'])) {
	$courseid= $_POST['courseid'];
  	$name = $_POST['name'];
  	$seatlimit = $_POST['seatlimit'];
  	$degree = $_POST['degree'];


  	$query = "INSERT INTO course (courseid, name, seatlimit, degree) VALUES ('$courseid','$name', '$seatlimit', '$degree');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Course Inserted!</p>';
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Course Not Inserted, please input right informations!</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Add Course</h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="dashboard-index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Course</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Course Insert Alert</strong>
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
		    <label for="courseid">Courseid</label>
		    <input name="courseid" type="text" class="form-control" id="courseid" value="<?= isset($courseid)? $courseid: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="name">Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?= isset($name)? $name: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="seatlimit">Seat Limit</label>
			<input name="seatlimit" type="text" class="form-control" id="seatlimit" value="<?= isset($seatlimit)? $seatlimit: '' ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="degree">Degree</label>
		    <input name="degree" type="text" value="<?= isset($degree)? $degree: '' ; ?>" class="form-control" id="degree" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="addcourse" value="Add Course" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>