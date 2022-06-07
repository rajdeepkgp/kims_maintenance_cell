<?php

 include 'db.php';

 if(isset($_POST['save'])){

  	$id = $_GET['id'];
  	$cdate = $_POST['cdate'];
  	$item = $_POST['item'];
  	$quantity = $_POST['quantity'];
    $fitted = $_POST['fitted'];
    $usitem = $_POST['usitem'];
    $newunuseitem = $_POST['newunuseitem'];
    $pusername = $_POST['pusername'];
    $designation = $_POST['designation'];
 $q = " update itemdetails set id=$id, cdate='$cdate', item='$item', quantity='$quantity', fitted='$fitted', usitem='$usitem', newunuseitem='$newunuseitem', pusername='$pusername', designation='$designation' where id=$id";

  if($conn->query($q))
  { 
    $_SESSION['status']="Data updated Successfull";
            $_SESSION['status_code']="success";
  }
    else{
      $_SESSION['status']="Error";
            $_SESSION['status_code']="error";
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      th {text-align: center;}
    </style>
</head>
<body>

<?php include_once('includes/header.php');?>

<?php
include_once("db.php");
$id = $_GET['id'];

            $sql="SELECT * FROM itemdetails where id=$id";
            $query_run=mysqli_query($conn, $sql);
            $i=0;
            while($row = mysqli_fetch_array($query_run))
 {
?>

  <div class="container">
    <br><div class="title"><center>GRIEVANCE CELL</center></div></br>
    <div class="content">
    <form action="" method="post">
        <div class="user-details">


 <!-- Start Multiple row add/remove-->

          <table id="items" class="table table-striped table-hover">
          <tr>
            <th>DATE</th>
            <th>ISSUED ITEM</th>
            <th>QUANTITY</th>
            <th>ITEM FITTED</th>
            <th>U/S ITEMS</th>
            <th>NEW UNUSED ITEMS</th>
          </tr>
        </table>
          <div class="row">
                <div class="col-lg-12">
                    <div id="inputFormRow">
                        <div class="input-group mb-3">
                          
                            <input type="date" name="cdate" value="<?php echo $row['cdate']; ?>" class="form-control m-input" placeholder="" autocomplete="off">
                            <input type="text" name="item" value="<?php echo $row['item']; ?>" class="form-control m-input" placeholder="Enter Issued Item" autocomplete="off">
                            <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" class="form-control m-input" placeholder="Enter Quantity" autocomplete="off">
                            <input type="text" name="fitted" value="<?php echo $row['fitted']; ?>" class="form-control m-input" placeholder="Enter Item Fitted" autocomplete="off">
                            <input type="text" name="usitem" value="<?php echo $row['usitem']; ?>" class="form-control m-input" placeholder="Enter U/S Items(Returned to Store)" autocomplete="off">
                            <input type="text" name="newunuseitem" value="<?php echo $row['newunuseitem']; ?>" class="form-control m-input" placeholder="Enter New Unused Items(Returned to Store)" autocomplete="off">


                            <div class="input-group-append">
                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btn btn-info"><i class="fas fa-plus-circle"></i>Add Row</button>
                </div>
            </div>

        
        <div class="input-box">
            <br><span class="details">PARTICULARS OF USER NAME</span>
            <input type="text" placeholder="" name="pusername" value="<?php echo $row['pusername']; ?>" required>
        </div>

         <div class="input-box">
            <br><span class="details">DESIGNATION</span>
            <input type ="text" name="designation" value="<?php echo $row['designation']; ?>" required>
        </div>
        </div>



 <?php

      }
    
 ?>

        <div class="button">
          <input type="submit" value="Submit" name="save">
        </div>

        <div class="button">
          <a href="manageform2.php" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back </a>
        </div>

    </form>
  </div>
</div>


<!-- Start javaScript for message popup-->

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <?php
  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
    ?>
    <script>
    swal({
  title: "<?php echo $_SESSION['status']; ?>",
  //text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Ok Done!",
        });
    </script>
  <?php
  unset($_SESSION['status']);

  }
  ?>
   <!-- End javaScript for message popup-->

</body>
</html>