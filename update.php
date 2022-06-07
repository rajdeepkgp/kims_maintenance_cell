<?php

 include 'db.php';

 if(isset($_POST['save'])){

	$id = $_GET['id'];
	$orderno = $_POST['orderno'];
	$odatetime = $_POST['odatetime'];
	$unit = $_POST['unit'];
    $reportby = $_POST['reportby'];
    $actionby = $_POST['actionby'];
    $tecallotted = $_POST['tecallotted'];
    $cdatetime = $_POST['cdatetime'];
    $locationn = $_POST['locationn'];
    $ncomplaint =$_POST['ncomplaint'];
    $remarks = $_POST['remarks'];
    $incharge = $_POST['incharge'];
 $q = " update grievancecell set id=$id, orderno='$orderno', odatetime='$odatetime', unit='$unit', reportby='$reportby', actionby='$actionby', tecallotted='$tecallotted', cdatetime='$cdatetime', locationn='$locationn', ncomplaint='$ncomplaint', remarks='$remarks', incharge='$incharge' where id=$id";

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

            $sql="SELECT * FROM grievancecell where id=$id";
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

          <div class="input-box">
            <span class="details">WORK ORDER NO</span>
            <input type="text" placeholder="" name="orderno" value="<?php echo $row['orderno']; ?>" required>
          </div>

          <div class="input-box">
            <span class="details">DATE & TIME</span>
            <input type="datetime-local" placeholder="" name="odatetime" required>
          </div>

          <div class="input-box">
            <span class="details">UNIT(SECTION)</span>
            <input type="text" placeholder="" name="unit" value="<?php echo $row['unit']; ?>" required>
          </div>

          <div class="input-box">
            <span class="details">REPORT BY</span>
            <input type="text" placeholder="" name="reportby" value="<?php echo $row['reportby']; ?>" required>
          </div>

          <div class="input-box">
            <span class="details">ACTION BY</span>
            <input type="text" placeholder="" name="actionby" value="<?php echo $row['actionby']; ?>" required>
          </div>

          <div class="input-box">
            <span class="details">TECHNICIAN ALLOTTED</span>
            <input type="text" placeholder="" name="tecallotted" value="<?php echo $row['tecallotted']; ?>" required>
          </div>

          <div class="input-box">
            <span class="details">COMPLETION DATE & TIME</span>
            <input type ="datetime-local" name="cdatetime" value="<?php echo $row['cdatetime']; ?>" required>
          </div>

          <div class="input-box">
            <span class="details">LOCATION</span>
            <input type ="text" name="locationn" value="<?php echo $row['locationn']; ?>" required>
          </div>

          </div>

 <!-- Start Multiple row add/remove-->

          <table id="items" class="table table-striped table-hover">
          <tr>
            <th>NATURE OF COMPLAINT</th>
          </tr>
        </table>
        
            <div class="row">
                <div class="col-lg-12">
                    <div id="inputFormRow">
                        <div class="input-group mb-3">
                          
                            <input type="text" name="ncomplaint" class="form-control m-input" placeholder="Enter Nature Of Complaint" autocomplete="off" value="<?php echo $row['ncomplaint']; ?>">

                        </div>
                    </div>
                </div>
            </div>

     <!-- End Multiple row add/remove-->


       <br> <div class="user-details">

          <div class="input-box">
            <span class="details">REMARKS</span>
            <input type ="text" name="remarks" value="<?php echo $row['remarks']; ?>" required>
          </div></br>

          <div class="input-box">
            <span class="details">IN-CHARGE (GRIEVANCE CELL)</span>
            <input type ="text" name="incharge" value="<?php echo $row['incharge']; ?>" required>
          </div>
        
</div>


 <?php

      }
    
 ?>

        <div class="button">
          <input type="submit" value="Submit" name="save">
        </div>

        <div class="button">
          <a href="manageform1.php" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back </a>
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