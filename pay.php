<!DOCTYPE html>

<html lang="en">

<head>
  <meta charset="utf-8"/>
  <title>Payment</title>
  <link rel="stylesheet" href="_css/style.css">
</head>
    
<header>
<img class ="Logo" src="_images/logo.png" width=100px height=100px;>
<h1>DB Bookshop</h1>

<nav id="nav1">
  <ul>
     <li><a href="index.php">Home</a></li>
	 <li><a href="#">About Us</a></li>
     <li><a href="#">Contact Us</a></li>
  </ul>
</nav>
</header>
    
<body>
    <h2>Payment</h2>
    <h3>Debit/Credit Card</h3>
    <img class ="mc" src="_images/mastercard.jpg" width=50px height=36px;>
    
    <form action='#' method='POST'>
	<label>Card Number</label> <input type='number' placeholder='0123456789101234' id='card' name='card' size=16/>
    <br>
    <br>
    <label>Expiry Date</label><select type='number' placeholder='Month' id='expM' name='expM'>
    <option value="1">01</option>
    <option value="2">02</option>
    <option value="3">03</option>
    <option value="4">04</option>
    <option value="5">05</option>
    <option value="6">06</option>
    <option value="7">07</option>
    <option value="8">08</option>
    <option value="9">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
</select>
<select type='number' id='expY' name='expY'>
    <option value="2020">20</option>
    <option value="2021">21</option>
    <option value="2022">22</option>
    <option value="2023">23</option>
    <option value="2024">24</option>
    <option value="2025">25</option>
</select>
    <br>
    <br>
    <label>CVV Code</label> <input type='number' placeholder='123' id='cvv' name='cvv' size=3 />
    <br>
    <br>
	<input type='submit' value='Continue' id='btn'/>
    <input type='hidden' id='h' name='h'/>
    </form>
    
<?php
  $con = mysqli_connect("localhost","root","","creditcard");
    if (!$con){
        die ("Failed");
        echo "Failed";
    }
    else{
        echo "Success";
    }
    
    $h = isset($_POST['h']) ? $_POST['h'] : '';
    if ($h == 1){
        header("Location: success.php");
        $v2 = md5 ($_POST['card']);
        $m = 2;
        $y = 2020;
        $date = new dateTime();
        $date->setDate($y, $m, 1);
        $date->modify('+1 month -1 day');
        $v3 = $date->format('yy-m-d');
        $v4 = ($_POST['cvv']);
        $sql = "INSERT INTO `card` (`ccnum`, `expdate`, `seccode`) VALUES ('$v2', '$v3', '$v4')";
    
if(!mysqli_query ($con,$sql)) {
        echo "Not inserted.";
}
else {
    echo "Inserted.";
}
    }
    if ($h == -1){
        header("Location: pay.php");
    }
?>
    
<script src = "_js/js.js"></script>
</body>