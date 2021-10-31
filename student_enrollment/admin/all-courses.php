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
<h1 class="text-primary"><i class="fas fa-users"></i>  All Courses List!<small class="text-warning"></small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="dashboard-index.php">Dashboard </a></li>
    <!-- <li class="breadcrumb-item active" aria-current="page">All Courses</li>-->
  </ol>
</nav>

<table class="table  table-striped table-hover table-bordered" id="data">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">courseid</th>
      <th scope="col">name</th>
      <th scope="col">seatlimit</th>
      <th scope="col">degree</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
      $query=mysqli_query($db_con,'SELECT * FROM course');
      $i=1;
      while ($result = mysqli_fetch_array($query)) { ?>
      <tr>
        <?php 
        echo '<td>'.$i.'</td>
          <td>'.$result['courseid'].'</td>
          <td>'.$result['name'].'</td>
          <td>'.$result['seatlimit'].'</td>
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