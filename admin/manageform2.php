<!DOCTYPE html>
<html>
<head>
 <title> Manage Items </title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
  <link href="img/kims.png" rel="shortcut icon" type="img/png">

<?php include_once('includes/header.php');?>

<!--<br><div class="title"><center>TABLE OF ITEMS DETAILS</center></div></br>-->

<table id="tblUser" class="table table-striped">
    <thead>
 <th> Id </th>
 <th> ORDER NO. </th>
 <th> DATE </th>
 <th> ISSUED ITEM </th>
 <th> QUANTITY </th>
 <th> ITEM FITTED </th>
 <th> U/S ITEMS </th>
 <th> NEW UNUSED ITEMS </th>
 <th> PARTICULARS OF USER NAME </th>
 <th> DESIGNATION </th>
 <th> DELETE </th>
 <th> MODIFY </th>
 <th> PDF </th>
    </thead>
    <tbody>
        <?php

 include 'db.php'; 
 $q = "select * from itemdetails ";

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['id'];  ?> </td>
 <td> <?php echo $res['orderno'];  ?> </td>
 <td> <?php echo $res['cdate'];  ?> </td>
 <td> <?php echo $res['item'];  ?> </td>
 <td> <?php echo $res['quantity'];  ?> </td>
 <td> <?php echo $res['fitted'];  ?> </td>
 <td> <?php echo $res['usitem'];  ?> </td>
 <td> <?php echo $res['newunuseitem'];  ?> </td>
 <td> <?php echo $res['pusername'];  ?> </td>
 <td> <?php echo $res['designation'];  ?> </td>

 <td> <button class="btn-danger btn"> <a href="delete2.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn btn-info" name="edit_btn"> <a href="update2.php?id=<?php echo $res['id']; ?>" class="text-white"> Modify </a> </button> </td>
 <td> <button class="btn-success btn"> <a href="pdf2.php?id=<?php echo $res['id']; ?>" target="_blank" class="text-white"> PDF </a>  </button> </td>


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