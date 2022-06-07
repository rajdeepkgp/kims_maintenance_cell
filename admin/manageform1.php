<!DOCTYPE html>
<html>
<head>
 <title> Manage Data</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
  <link href="img/kims.png" rel="shortcut icon" type="img/png">

<?php include_once('includes/header.php');?>

<!--<div class="container">
<br><div class="title"><center>TABLE OF ORDER DETAILS</center></div></br>
</div>-->
<table id="tblUser" class="table table-striped">
    <thead>
 <th> Id </th>
 <th> WORK ORDER NO </th>
 <th> DATE </th>
 <th> UNIT(SECTION) </th>
 <th> REPORT BY </th>
 <th> ACTION BY </th>
 <th> TECHNICIAN ALLOTTED </th>
 <th> COMPLETION DATE & TIME </th>
 <th> LOCATION </th>
 <th> NATURE OF COMPLAINT </th>
 <th> REMARKS </th>
 <th> IN-CHARGE </th>
 <th> DELETE </th>
 <th> MODIFY </th>
 <th> PDF </th>
    </thead>
    <tbody>
        <?php

 include 'db.php'; 
 $q = "select * from grievancecell ";

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['id'];  ?> </td>
 <td> <?php echo $res['orderno'];  ?> </td>
 <td> <?php echo $res['odatetime'];  ?> </td>
 <td> <?php echo $res['unit'];  ?> </td>
 <td> <?php echo $res['reportby'];  ?> </td>
 <td> <?php echo $res['actionby'];  ?> </td>
 <td> <?php echo $res['tecallotted'];  ?> </td>
 <td> <?php echo $res['cdatetime'];  ?> </td>
 <td> <?php echo $res['locationn'];  ?> </td>
 <td> <?php echo $res['ncomplaint'];  ?> </td>
 <td> <?php echo $res['remarks'];  ?> </td>
 <td> <?php echo $res['incharge'];  ?> </td>

 <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn btn-info" name="edit_btn"> <a href="update.php?id=<?php echo $res['id']; ?>" class="text-white" > Modify </a> </button> </td>
 <td> <button class="btn-success btn"> <a href="pdf.php?id=<?php echo $res['id']; ?>" class="text-white" target="_blank"> PDF </a>  </button> </td>


 </tr>

 <?php 
 }
  ?>
    </tbody>
</table>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable();
} );
</script>



</body>
</html>