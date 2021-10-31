<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='dashboard-index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: dashboard-index.php?page='.$corepage[0]);
     }
    }
?>
<h1 class="text-primary"><i class="fas fa-users"></i>  All Student Enrollment!<small class="text-warning"></small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="dashboard-index.php">Dashboard </a></li>
     <li class="breadcrumb-item active" aria-current="page">ALL Students Enrollment</li>
    <!-- <li class="breadcrumb-item active" aria-current="page">All Courses</li>-->
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">StudentId</th>
      <th scope="col">CourseId</th>
      <th scope="col">StudentFirstName</th>
      <th scope="col">StudentLastName</th>
      <th scope="col">CourseName</th>
      <th scope="col">CourseDegree</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      $query=mysqli_query($db_con,'select e.studentId as studentid,e.courseId as courseid,s.name as studentname, s.lastname, c.name, c.degree from enrollment e,student s, course c where s.id = e.studentId and e.courseId = c.courseid;');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td>'.$result['studentid'].'</td>
          <td>'.$result['courseid'].'</td>
          <td>'.$result['studentname'].'</td>
          <td>'.$result['lastname'].'</td>
          <td>'.$result['name'].'</td>
          <td>'.$result['degree'].'</td>
          ';?>
      </tr>  
     <?php $i++;} ?>
    
  </tbody>
</table>
<script type="text/javascript">
  function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
</script>