<?php
$getfile = file_get_contents('people.json');
$jsonfile = json_decode($getfile);
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta name="author" content="ilmu-detil.blogspot.com">
 <title>Tutorial CRUD  JSON DATA</title>
 <link rel="stylesheet" href="assets/css/bootstrap.min.css">
 <link rel="stylesheet" href="assets/css/ilmudetil.css">
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
 <div class="container">
  <div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
   </button>
   <a class="navbar-brand" href="index.html">
   Pusat Ilmu Secara Detil</a>
  </div>
  <div class="navbar-collapse collapse">
   <ul class="nav navbar-nav navbar-left">
    <li class="clr1 active"><a href="index.html">Home</a></li>
    <li class="clr2"><a href="">Bootstrap</a></li>
    <li class="clr3"><a href="">AngularJS</a></li>
   </ul>
  </div>
 </div>
</nav>
</br></br></br></br>
<div class="container">
 <div class="jumbotron">
  <h3>Tutorial Bootstrap PHP CRUD From JSON File</h3>      
  <p>Create, Read, Update and Delete Data from JSON</p>      
 </div>
</div>
<div class="container">
 <div class="btn-toolbar">
  <a class="btn btn-primary" href="insert.php"><i class="icon-plus"></i> Insert Data</a>
  <div class="btn-group"> </div>
 </div>
</div>
<br>
<br>
<div class="container">
 <div class ="row">
  <div class="col-md-9">
   <table class="table table-striped table-bordered table-hover">
    <tr>
     <th>No.</th>
     <th>First Name</th>
     <th>Last Name</th>
     <th>Age</th>
     <th>Gender</th>
     <th>Action</th>
    </tr>  
    <?php $no=0;foreach ($jsonfile->records as $index => $obj): $no++;  ?>
    <tr>
     <td><?php echo $no; ?></td>
     <td><?php echo $obj->fname; ?></td>
     <td><?php echo $obj->lname; ?></td>
     <td><?php echo $obj->age; ?></td>
     <td><?php echo $obj->gender; ?></td>
     <td>
      <a class="btn btn-xs btn-primary" href="update.php?id=<?php echo $index; ?>">Edit</a>
      <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $index; ?>">Delete</a>
     </td>
    </tr>
    <?php endforeach; ?>
   </table>
  </div> 
 </div>
</div>
</body>
</html>