<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Home Page </title>
    <link rel="stylesheet" href="stylenav.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="img/kims.png" rel="shortcut icon" type="img/png">



    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="css/style.css">




   </head>
<body>



<section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-15">
                    <h2 class="heading-section" style="color:#FFFFFF">CALENDAR</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="elegant-calencar d-md-flex">
                        <div class="wrap-header d-flex align-items-center">
                      <p id="reset">reset</p>
                    <div id="header" class="p-0">
                    <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
                    <div class="head-info">
                        <div class="head-day"></div>
                        <div class="head-month"></div>
                    </div>
                    <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
                    </div>
                  </div>
                  <div class="calendar-wrap">
                    <table id="calendar">
                    <thead>
                        <tr>
                            <th>Sun</th>
                            <th>Mon</th>
                            <th>Tue</th>
                            <th>Wed</th>
                            <th>Thu</th>
                            <th>Fri</th>
                            <th>Sat</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    </tbody>
                    </table>
                  </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>



  <nav>
    <div class="navbar">
      <i class='bx bx-menu'></i>
      <div class="logo"><a href="#">KIMS</a></div>
      <div class="nav-links">
        <div class="sidebar-logo">
          <i class='bx bx-x' ></i>
        </div>
        <ul class="links">
          <li><a href="#dashboard.php">HOME</a></li>
          <li>
            <a href="#">GRIEVANCE CELL</a>
            <i class='bx bxs-chevron-down htmlcss-arrow arrow  '></i>
            <ul class="htmlCss-sub-menu sub-menu">
              <li><a href="form1.php">Grievance cell Form</a></li>
              <li><a href="manageform1.php">Manage Data</a></li>
              <li class="more">

              </li>
            </ul>
          </li>
          <li>
            <a href="#">DETAILS OF ITEMS</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="form2.php">Add Details of Items</a></li>
              <li><a href="manageform2.php">Manage Items</a></li>
            </ul>
          </li>

          <li>
            <a href="#">REPORT</a>
            <i class='bx bxs-chevron-down js-arrow arrow '></i>
            <ul class="js-sub-menu sub-menu">
              <li><a href="rordersdetails.php">Report of Order Details</a></li>
              <li><a href="ritemsdetails.php">Report of Items Details</a></li>
              <!-- <li><a href="ractiveclose.php">Active & Close Report Status</a></li> -->
            </ul>
          </li>

          <li><a href="#">ABOUT US</a></li>
          <li><a href="#">CONTACT US</a></li>
        </ul>
      </div>
      <div class="search-box">
        <i class='bx bx-search'></i>
        <div class="input-box">
          <input type="text" placeholder="Search...">
        </div>
      </div>

      <div class="search-box">
        <ul class="links">
        <li><a href="logout.php">LOGOUT</a></li>
      </ul>
      </div>

    </div>
  </nav>

<div class="nav-links">
      <div class="images">
        <img src="img/bg1.png" style="width:100%">
        
      </div>
      <div class="images">
        <img src="img/bg2.png" style="width:100%">
        
      </div>
</div>


<script>
      var indexValue = 0;
      function slideShow(){
        setTimeout(slideShow, 4000);
        var x;
        const img = document.querySelectorAll("img");
        for(x = 0; x < img.length; x++){
          img[x].style.display = "none";
        }
        indexValue++;
        if(indexValue > img.length){indexValue = 1}
        img[indexValue -1].style.display = "block";
      }
      slideShow();
    </script>




  <!--<script src="script.js"></script>-->
<script type="text/javascript">
  // search-box open close js code
let navbar = document.querySelector(".navbar");
let searchBox = document.querySelector(".search-box .bx-search");
// let searchBoxCancel = document.querySelector(".search-box .bx-x");

searchBox.addEventListener("click", ()=>{
  navbar.classList.toggle("showInput");
  if(navbar.classList.contains("showInput")){
    searchBox.classList.replace("bx-search" ,"bx-x");
  }else {
    searchBox.classList.replace("bx-x" ,"bx-search");
  }
});

// sidebar open close js code
let navLinks = document.querySelector(".nav-links");
let menuOpenBtn = document.querySelector(".navbar .bx-menu");
let menuCloseBtn = document.querySelector(".nav-links .bx-x");
menuOpenBtn.onclick = function() {
navLinks.style.left = "0";
}
menuCloseBtn.onclick = function() {
navLinks.style.left = "-100%";
}


// sidebar submenu open close js code
let htmlcssArrow = document.querySelector(".htmlcss-arrow");
htmlcssArrow.onclick = function() {
 navLinks.classList.toggle("show1");
}
let moreArrow = document.querySelector(".more-arrow");
moreArrow.onclick = function() {
 navLinks.classList.toggle("show2");
}
let jsArrow = document.querySelector(".js-arrow");
jsArrow.onclick = function() {
 navLinks.classList.toggle("show3");
}
</script>


</body>
</html>
