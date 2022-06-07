<?php

include 'db.php';

$id = $_GET['id'];

$q = " DELETE FROM `itemdetails` WHERE id = $id ";

if($conn->query($q))
  { 
    $_SESSION['status']="Data Deleted Successfull";
            $_SESSION['status_code']="success";
  }
    else{
      $_SESSION['status']="Error";
            $_SESSION['status_code']="error";
    }

?>

<html>
<body>
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