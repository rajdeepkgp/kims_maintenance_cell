<!-- Start Database Connect-->

<?php

	include_once('db.php');

  if(isset($_POST['save'])){
    $orderno = $_POST['orderno'];
    $odatetime = $_POST['odatetime'];
    $unit = $_POST['unit'];
    $reportby = $_POST['reportby'];
    $actionby = $_POST['actionby'];
    $tecallotted = $_POST['tecallotted'];
    $cdatetime = $_POST['cdatetime'];
    $locationn = $_POST['locationn'];
    $visitorData =count($_POST['ncomplaint']);
    $remarks = $_POST['remarks'];
    $incharge = $_POST['incharge'];

	
	if ($visitorData > 0) {
	    for ($i=0; $i < $visitorData; $i++) { 
		if (trim($_POST['ncomplaint'] != '')) {
			$ncomplaint   = $_POST["ncomplaint"][$i];
			$query  = "INSERT INTO grievancecell (orderno,odatetime,unit,reportby,actionby,tecallotted,cdatetime,locationn,ncomplaint,remarks,incharge) VALUES ('$orderno','$odatetime','$unit','$reportby','$actionby','$tecallotted','$cdatetime','$locationn','$ncomplaint','$remarks','$incharge')";
			$result = mysqli_query($conn, $query);
		}
	    }
      $_SESSION['status']="Data Save Successfull";
            $_SESSION['status_code']="success";
    }
    else{
      $_SESSION['status']="Error";
            $_SESSION['status_code']="error";
    }

}

?>
<!-- End Database Connect-->


<!-- Start HTML Code-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Grievance Cell Registration Form </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="img/kims.png" rel="shortcut icon" type="img/png">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
      th {text-align: center;}
    </style>
   </head>
<body>
  
  <?php include_once('includes/header.php');?>

  <div class="container">
    <br><div class="title"><center>GRIEVANCE CELL</center></div></br>
    <div class="content">
    <form action="" method="post">
        <div class="user-details">

          <div class="input-box">
            <span class="details">WORK ORDER NO</span>
            <input type="text" placeholder="" name="orderno" required>
          </div>

          <div class="input-box">
            <span class="details">DATE</span>
            <input type="date" placeholder="" name="odatetime" required>
          </div>

          <div class="input-box">
            <span class="details">UNIT(SECTION)</span>
            <input type="text" placeholder="" name="unit" required>
          </div>

          <div class="input-box">
            <span class="details">REPORT BY</span>
            <input type="text" placeholder="" name="reportby" required>
          </div>

          <div class="input-box">
            <span class="details">ACTION BY</span>
            <input type="text" placeholder="" name="actionby" required>
          </div>

          <div class="input-box">
            <span class="details">TECHNICIAN ALLOTTED</span>
            <input type="text" placeholder="" name="tecallotted" required>
          </div>

          <div class="input-box">
            <span class="details">COMPLETION DATE & TIME</span>
            <input type ="datetime-local" name="cdatetime" required>
          </div>

          <div class="input-box">
            <span class="details">LOCATION</span>
            <input type ="text" name="locationn" required>
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
                          
                            <input type="text" name="ncomplaint[]" class="form-control m-input" placeholder="Enter Nature Of Complaint" autocomplete="off">

                            <div class="input-group-append">
                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                            </div>
                        </div>
                    </div>

                    <div id="newRow"></div>
                    <button id="addRow" type="button" class="btn btn-info"><i class="fas fa-plus-circle"></i>Add Row</button>
                </div>
            </div>

     <!-- End Multiple row add/remove-->


       <br> <div class="user-details">

          <div class="input-box">
            <span class="details">REMARKS</span>
            <input type ="text" name="remarks" required>
          </div></br>

          <div class="input-box">
            <span class="details">IN-CHARGE (GRIEVANCE CELL)</span>
            <input type ="text" name="incharge" required>
          </div>
        
</div>



        <div class="button">
          <input type="submit" value="Submit" name="save">
        </div>

        <div class="button">
          <a href="dashboard.php" class="btn btn-primary btn-warning"><span class="glyphicon glyphicon-chevron-left"></span> Back </a>
        </div>

    </form>
  </div>
</div>

 <!-- Start javaScript for Multiple row add/remove-->

<script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="ncomplaint[]" class="form-control m-input" placeholder="Enter Nature Of Complaint" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
</script>

 <!-- End javaScript for Multiple row add/remove-->

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

<!-- End HTML Code-->
