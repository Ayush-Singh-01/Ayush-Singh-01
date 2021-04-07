<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
    <style>
        th{
            background-color: #996633;
            height:60px;
            text-align: center;
            font-size: 20px;
        }
        td{
            font-size: 20px;
            text-align: center;
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
<body>
<div id="main-wrapper">

<!-- Page Preloader -->
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
                <li class="active"><a href="transfermoney.php">TRANSFER MONEY</a></li>
                <li><a href="transactionhistory.php">TRANSACTION HISTORY</a></li>
            </ul>
        </div>
    </div>
</nav>
<section class="single-page-title">
    <div class="container text-center">
        <h2>Transfer money</h2>
    </div>
</section>
<section class="about-text ptb-100">
    <section class="section-title">
        <div class="container text-center">
            <h2>Transfer Money</h2>
            <span class="bordered-icon"><i class="fa fa-circle-thin"></i></span>
        </div>
    </section>
    <?php
    include 'data.php';
    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn,$sql);
?> 
<div class="container">
        <div class="row">
            <div class="col-md-6">
        <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:black;width:1200px;height:500px">
                        <thead style="color : black;">
                            <tr>
                            <th scope="col" class="text-center py-2" >Id</th>
                            <th scope="col" class="text-center py-2">Name</th>
                            <th scope="col" class="text-center py-2">E-Mail</th>
                            <th scope="col" class="text-center py-2">Balance</th>
                            <th scope="col" class="text-center py-2">Operation</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : black;">
                        
                        <td class="py-2"><?php echo $rows['id'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['curr_balance']?></td>
                        <td><a href="http://localhost/banking%20system/selecteduserdetails.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn btn-success" style="" >Transact</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>          
</section>  
<footer class="footer">
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
</div>
<!-- Script -->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/mobile-menu.js"></script>
<script src="js/flexSlider/jquery.flexslider-min.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>