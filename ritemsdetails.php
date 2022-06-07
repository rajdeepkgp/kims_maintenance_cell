
<!-- Start HTML Code-->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Report of Items Details </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="img/kims.png" rel="shortcut icon" type="img/png">
    <style>
      th {text-align: center;}
    </style>
   </head>
<body>

<?php include_once('includes/header.php');?>

    
  <div class="container">
    <br><div class="title"><center>REPORT OF ITEMS DETAILS</center></div></br>
    <div class="content">
    <form action="" method="post">
        <div class="user-details">

       
        
        <div class="input-box">
            <br><span class="details">FROM DATE</span>
            <input type="date" name="from" required>
        </div>

         <div class="input-box">
            <br><span class="details">TO DATE</span>
            <input type ="date" name="to" required>
        </div>
        </div>



        <div class="button">
          <input type="submit" value="Submit" name="save">
        </div>

    <br><div class="title"><center>REPORT LIST</center></div></br>

       <br><br> <table id="" class="table table-striped">
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

    </thead>
    <tbody>
        <?php
      if (isset($_POST['save'])){
        include('db.php');
        $from=date('Y-m-d',strtotime($_POST['from']));
        $to=date('Y-m-d',strtotime($_POST['to']));
        //MySQLi Procedural
        //$oquery=mysqli_query($conn,"select * from `login` where login_date between '$from' and '$to'");
        //while($orow=mysqli_fetch_array($oquery)){
        /*  ?>
          <tr>
            <td><?php echo $orow['logid']?></td>
            <td><?php echo $orow['username']?></td>
            <td><?php echo $orow['login_date']?></td>
          </tr>
          <?php */
        //}
 
        //MySQLi Object-oriented
        $query=$conn->query("select * from `itemdetails` where cdate between '$from' and '$to'");
        while($res = $query->fetch_array()){
          ?>
          <tr>
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
          </tr>
          <?php 
        }
      }
    ?>
    </tbody>
</table>

        <td> <button class="btn btn-info"> <a href="excelritemsdetails.php" target="_blank" class="text-white"> DOWNLOAD IN EXCEL  </a>  </button> </td>


    </form>
  </div>
</div>



</body>
</html>

<!-- End HTML Code-->
