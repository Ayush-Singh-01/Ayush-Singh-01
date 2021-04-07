<?php
include 'data.php';

if (isset($_POST['submit'])) {
    $form = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $selectQueryFrom = "SELECT * from customers where id=$form";
    $query = mysqli_query($conn, $selectQueryFrom);
    $result1 = mysqli_fetch_array($query);

    $selectQueryTo = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn, $selectQueryTo);
    $result2 = mysqli_fetch_array($query);

    // Checking if the amount is negative
    if (($amount) < 0) {
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
        echo '</script>';
    }

    // constraint to check insufficient balance.
    else if ($amount > $result1['curr_balance']) {

        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }

    // constraint to check zero values
    else if ($amount == 0) {

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    } else {
        $newbalance = $result1['curr_balance'] - $amount;
        $updateSenderQuery = "UPDATE customers set curr_balance=$newbalance where id=$form";
        mysqli_query($conn, $updateSenderQuery);

        $newbalance = $result2['curr_balance'] + $amount; 
        $updateReceiverQuery = "UPDATE customers set curr_balance=$newbalance where id=$to";
        mysqli_query($conn, $updateReceiverQuery);

        // Insert in transaction history table
        $sender = $result1['name'];
        $receiver = $result2['name'];
        $insertQuery = "INSERT INTO `transfers`(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
        $query = mysqli_query($conn, $insertQuery);

        if ($query) {

            echo '<script>';
            echo 'alert("Payment successfull");window.location="transactionhistory.php";';

            echo '</script>';
        } else {

            echo '<script>';
            echo 'alert("Something went wrong")';
            echo '</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Transfer Money</title>
    <style type="text/css">
   

.intro{
	background: #EAF0F1;
}

button{
	border:none;
	border-radius: 8px;
	padding: 10px;
	background: #50BFBF; 
	color:white;
	letter-spacing: 1.5px;
	font-size: 15px;
	transition: 0.5s;
}
button:hover,h1:hover{
	transform: scale(1.1);
}
button:hover{
	background-color:#4C4B4B;
}


@media only screen and (orientation:portrait){
	.intro{
		display:flex;
		flex-direction: column-reverse;
	}
	h1{
		font-size: 30px;
	}
	.act{
		padding-bottom: 100px;
	}
}
.user-info,.receiver-info h1{
     color: black;
     padding-top: 2%;
     border-width: thin;
     text-align: center;
}
.info{
    display: inline-table;
    padding-inline: 75px;
    padding-top: 1%;
    background-color: #996633;
    letter-spacing: 2px;
    border-inline-color: black;
    font-size: 20px;
    height: 120px;
width: 200px;
text-align: center;
}
.selectInput-section .select-sender{
    background-color: #996633;
    box-sizing: 150px;
    text-align: center;
    letter-spacing: 2px;
    max-inline-size: 25%;
    inline-size: unset;
    padding-inline: 50px;
    margin-inline-start: 37%;
width: 200px;
}
.amountInput-section{
    margin-inline-start: 44%;
    padding-top: 2px;
    
}
.submit{
    margin-inline-start: 47%;
    padding-top: 25px;
    border-color: #50bfbf ;
    font-weight: 500;
    font-size: 25px;
   width: 90px;
}
.submit .submit-btn{
    padding:6px 12px;
    
	border: 0px;
	border-radius: 6px;
	padding: 10px;
	background: #50BFBF; 
	color:black;
	letter-spacing: 1.5px;
	font-size: 20px;
	transition: 0.5s;
}
#ak{
    margin-right: 2000px;
    margin-left: -80px;
    
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
                <li ><a href="transfermoney.php">TRANSFER MONEY</a></li>
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
 <form action="" method="POST">
        <div class="sender-info">
            <?php
            include 'data.php';
            $senderId = $_GET['id'];
            $selectSenderQuery = "SELECT * FROM  customers where id=$senderId";
            $result = mysqli_query($conn, $selectSenderQuery);
            $rows = mysqli_fetch_assoc($result);
            ?>
            <div class="user-info">
                <h1 class="heading-user" style="font-family: 'Amatic SC',cursive;">Sender Information</h1>
                <div class="info">
                    <div>
                        <p><b>NAME</b></p>
                    </div>
                    <div>
                        <p><?php echo $rows['name'] ?></p>
                    </div>
                </div>
                <div class="info">
                    <div>
                        <p><b>EMAIL</b></p>
                    </div>
                    <div>
                        <p><?php echo $rows['email'] ?></p>
                    </div>
                </div>
                <div class="info">
                    <div>
                        <p><b>AMOUNT</b></p>
                    </div>
                    <div>
                        <p><?php echo $rows['curr_balance'] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="receiver-info">
            <?php
            $selectRemainingUser = "SELECT * FROM customers where id!=$senderId";
            $result = mysqli_query($conn, $selectRemainingUser);
            ?>
            <div class="receiver">
                <h1 class="trans-heading" style="font-family: 'Amatic SC',cursive;">Transfer To</h1>
                <div class="selectInput-section">
                    <select name="to" class="select-sender" required style="background: #e6ffff;width:2000px;height:30px;text-align:center">
                        <option value="" disabled selected style="color: black;text-align:center;height:20px">---        Choose    ---</option>
                        <?php
                        while ($rows = mysqli_fetch_array($result)) {
                        ?>
                            <option value="<?php echo $rows['id'] ?>" style="font-size: 20px;color:black">
                                <?php echo $rows['name']; ?>
                            </option>
                        <?php
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="amount">
                <h1 class="trans-heading" style="font-family: 'Amatic SC',cursive;">Amount</h1>
                <div class="amountInput-section">
                    <input type="number" name="amount" id="ak" required style="font-size: 25px;width:300px;">
                </div>
            </div>
            <div class="submit">
                <input class="submit-btn" type="submit" value="Transfer" name="submit" style="font-family: 'Amatic SC',cursive;">
            </div>
        </div>
    </form>         
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
                <!-- /.col-sm-4 -->

                <div class="col-sm-4 footer-block">
                    <div class="footer-widget widget_text">
                        <h3>About Us</h3>
                        <p>This is a website for transferring money online safely</p>
                    </div>
                </div>
                <!-- /.col-sm-4 -->
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