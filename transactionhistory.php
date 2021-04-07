<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>transaction history</title>
    <style>
th{
    background-color: #996633;
    width: 1200px;
    height: 60px;
    text-align: center;
    font-size: 20px;
}
td{
    text-align: center;
    width:200px;
    height:50px;
    font-size: 20px;
}
    </style>
    <!-- web-fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <!-- off-canvas -->
    <link href="css/mobile-menu.css" rel="stylesheet">
    <!-- font-awesome -->
    <link href="fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Style CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body style="background-color : rgb(234, 243,250 )">
<div id="main-wrapper">
<div id="preloader">
    <div id="status">
        <div class="status-mes"></div>
    </div>
</div>
<div class="uc-mobile-menu-pusher">
<div class="content-wrapper">
<nav class="navbar m-menu navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php"><img src="img/logos.png" alt=""></a>
        </div>
            <ul class="nav navbar-nav navbar-right main-nav">
                <li><a href="home.php">HOME</a></li>
                <li><a href="customers.php">CUSTOMERS</a></li>
                <li><a href="transfermoney.php">TRANSFER MONEY</a></li>
                <li class="active"><a href="transactionhistory.php">TRANSACTION HISTORY</a></li>
            </ul>
    </div>
</nav>
<section class="single-page-title">
    <div class="container text-center">
        <h2>TRANSACTION HISTORY</h2>
    </div>
</section>
<section class="contact-form ptb-100">
<section class="section-title">
        <div class="container text-center">
            <h2>Transaction History</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>
    <div class="container">
       <br>
       <div class="table-responsive-sm" style="background-color: #E0E0E0">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead style="color : black;">
            <tr>
                <th class="text-center">S.No.</th>
                <th class="text-center">Sender</th>
                <th class="text-center">Receiver</th>
                <th class="text-center">Amount</th>
            </tr>
        </thead>
        <tbody>
        <?php
            include 'data.php';
            $sql ="select * from transfers ";
            $query =mysqli_query($conn, $sql);
            while($rows = mysqli_fetch_assoc($query)){  
        ?>
            <tr style="color : black;">
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['amount']; ?> </td>      
        <?php
          } 
        ?>
        </tbody>
    </table>
    </div>
 </div> 
</section>
<footer class="footer">
    <!-- Footer Widget Section -->
    <div class="footer-widget-section">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-4 footer-block">
                    <div class="footer-widget widget_text">
                        <div class="footer-logo">
                            <a href="#"><img src="img/logos.png" alt=""></a>
                        </div>
                        <p>TSF Bank</p>
                        <p>Made By:Ayush Kumar Singh</p>
                        <p><a href="#">#GRIPAPR2021</a> Web Development & Designing Internship</p>
                    </div>
                </div>
                <div class="col-sm-4 footer-block">
                    <div class="footer-widget widget_text">
                        <h3>About Us</h3>

                        <p>This is a website for transferring money online safely</p>
                    </div>
                </div>
                <div class="col-sm-4 footer-block last">
                    <div class="footer-widget widget_text">
                        <h3>Contact Us Today</h3>
                        <address>
                            Call Us 666 777 888 OR 111 222 333<br>
                            Send an Email on <a href="mailto:#">contact@tsfbank.com</a><br>
                            Visit Us 123 Fake Street- Blla 12358<br>
                            Singapore<br>
                        </address>
                        <ul class="list-inline social-links">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Script -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/mobile-menu.js"></script>
<script src="js/flexSlider/jquery.flexslider-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="js/scripts.js"></script>
</body>
</html>