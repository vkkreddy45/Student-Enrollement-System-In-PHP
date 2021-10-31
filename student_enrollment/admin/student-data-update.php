<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='dashboard-index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: dashboard-index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);

  if (isset($_POST['updatestudent'])) {
  	$name = $_POST['name'];
  	$lastname = $_POST['lastname'];
  	$age = $_POST['age'];
  	$degree = $_POST['degree'];

	$query = "UPDATE student SET lastname='$lastname', age='$age', degree='$degree' where id='$id'";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';	
  		header('Location: dashboard-index.php?page=all-student&edit=success');
  	}else{
  		header('Location: dashboard-index.php?page=all-student&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Edit Student Informations!<small class="text-warning"> Edit Student!</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Dashboard </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">All Student </a></li>
     <li class="breadcrumb-item active" aria-current="page">Add Student</li>
  </ol>
</nav>

<?php
		if (isset($id)) {
			$query = "SELECT id, name, lastname, age, degree FROM student WHERE id='$id'";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
	<div class="form-group">
		    <label for="name">Name</label>
		    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row['name'] ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="lastname">Last Name</label>
			<input name="lastname" type="text" class="form-control" id="lastname" value="<?php echo $row['lastname'] ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="age">Age</label>
		    <input name="age" type="text" class="form-control" id="age" value="<?php echo $row['age'] ; ?>" required="">
	  	</div>
		<div class="form-group">
		    <label for="degree">Degree</label>
		    <input name="degree" type="text" class="form-control" id="degree" value="<?php echo $row['degree'] ; ?>" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Update Student" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>