<!-- Start Database Connect-->

<?php

	include_once('db.php');

  if(isset($_POST['save'])){
    $orderno = $_POST["orderno"];
    $visitorData = count($_POST["cdate"]);
    $item = count($_POST['item']);
    $quantity = count($_POST['quantity']);
    $fitted = count($_POST['fitted']);
    $usitem = count($_POST['usitem']);
    $newunuseitem = count($_POST['newunuseitem']);
    $pusername = $_POST['pusername'];
    $designation = $_POST['designation'];


	
	if ($visitorData > 0) {
	    for ($i=0; $i < $visitorData; $i++) { 
		if (trim($_POST['cdate'] != '') && trim($_POST['item'] != '') && trim($_POST['quantity'] != '') && trim($_POST['fitted'] != '') && trim($_POST['usitem'] != '') && trim($_POST['newunuseitem'] != '')) {

      $cdate   = $_POST["cdate"][$i];
      $item   = $_POST["item"][$i];
      $quantity   = $_POST["quantity"][$i];
      $fitted   = $_POST["fitted"][$i];
      $usitem   = $_POST["usitem"][$i];
      $newunuseitem   = $_POST["newunuseitem"][$i];

			$query  = "INSERT INTO itemdetails (orderno,cdate,item,quantity,fitted,usitem,newunuseitem,pusername,designation) VALUES ('$orderno','$cdate','$item','$quantity','$fitted','$usitem','$newunuseitem','$pusername','$designation')";
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
    <title> Item Details Form </title>
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
    <br><div class="title"><center>DETAILS OF ITEMS</center></div></br>
    <div class="content">
    <form action="" method="post">
        <div class="user-details">

        <div class="input-box">
            <span class="details">SELECT ORDER NUMBER</span>
                <select class="form-control" id="orderno" name="orderno" required/> 
                    <option value="" selected>Select</option>
                    <?php
                    include_once("db.php");
                     $sql="SELECT * FROM grievancecell";
                     $query_run=mysqli_query($conn, $sql);
                     $i=0;
                     while($row = mysqli_fetch_array($query_run)) {
                      ?>
                    <option value="<?php echo $row['orderno']; ?>"><?php echo $row["orderno"]; ?></option>
                     <?php
                     }
                    ?>
                </select>
        </div>

        <br><table id="items" class="table table-striped table-hover">
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
                          
                            <input type="date" name="cdate[]" class="form-control m-input" placeholder="" autocomplete="off">
                            <input type="text" name="item[]" class="form-control m-input" placeholder="Enter Issued Item" autocomplete="off">
                            <input type="text" name="quantity[]" class="form-control m-input" placeholder="Enter Quantity" autocomplete="off">
                            <input type="text" name="fitted[]" class="form-control m-input" placeholder="Enter Item Fitted" autocomplete="off">
                            <input type="text" name="usitem[]" class="form-control m-input" placeholder="Returned to Store" autocomplete="off">
                            <input type="text" name="newunuseitem[]" class="form-control m-input" placeholder="Returned to Store" autocomplete="off">


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
            <input type="text" placeholder="" name="pusername" required>
        </div>

         <div class="input-box">
            <br><span class="details">DESIGNATION</span>
            <input type ="text" name="designation" required>
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
            html += '<input type="date" name="cdate[]" class="form-control m-input" placeholder="" autocomplete="off">';
            html += '<input type="text" name="item[]" class="form-control m-input" placeholder="Enter Issued Item" autocomplete="off">';
            html += '<input type="text" name="quantity[]" class="form-control m-input" placeholder="Enter Quantity"autocomplete="off">';
            html += '<input type="text" name="fitted[]" class="form-control m-input" placeholder="Enter Item Fitted"autocomplete="off">';
            html += '<input type="text" name="usitem[]" class="form-control m-input" placeholder="Enter U/S Items(Returned to Store"autocomplete="off">';
            html += '<input type="text" name="newusitem[]" class="form-control m-input" placeholder="Enter New U/S Items(Returned to Store"autocomplete="off">';
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
