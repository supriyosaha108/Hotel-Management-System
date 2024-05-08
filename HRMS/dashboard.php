<html>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@500;600&display=swap">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<head> <style>
body { margin: 0;  background-color: whitesmoke; font-family: 'Rajdhani'; }
table { width: 100%; height: calc(100% - 50px); margin-top: 25px; max-height: 630px; }
table, tr { border-spacing: 10px; }
.material-symbols-outlined { font-size: 48px; margin-right: 10px; }
.holder { background-color: white; height: 100%;  margin: 5px 10px 5px 10px; box-shadow:1px 1px 2px lightgray; border-radius: 6px; }
#cards { display: flex; justify-content: center; align-items: center; }
#cards:hover { background-color: rgba(0,0,0,0.6); color: white; }
#bddy { text-align: left; padding: 20px; box-sizing: border-box; height: 100%; }  
</style> </head>

<?php
include("PHP/connection.php");
$room = mysqli_fetch_array(mysqli_query($con, "select count(no) from room"))[0];
$book = mysqli_fetch_array(mysqli_query($con, "select count(bookid) from book"))[0];
$staff = mysqli_fetch_array(mysqli_query($con, "select count(id) from staff"))[0];
$complaints = mysqli_fetch_array(mysqli_query($con, "select count(no) from complaints"))[0];
$total_income = 0; $income_qry = mysqli_query($con, "select * from book where checkedin!='false'");
while ($row=mysqli_fetch_array($income_qry)) { $total_income = $total_income + $row['cost']; }
$today_income = 0; $today_income_qry = mysqli_query($con, "select * from book where checkindate=date(NOW()) and checkedin!='false'");
while ($row_today=mysqli_fetch_array($today_income_qry)) { $today_income = $today_income + $row_today['cost']; }
$checkin_today = mysqli_fetch_array(mysqli_query($con, "select count(bookid) from book where checkindate=date(NOW()) and checkedin='true'"))[0];
$checkout_today = mysqli_fetch_array(mysqli_query($con, "select count(bookid) from book where checkoutdate=date(NOW()) and checkedin='checkedout'"))[0];
$unsuccessfull_checkin_today = mysqli_fetch_array(mysqli_query($con, "select count(bookid) from book where checkindate=date(NOW()) and checkedin='false'"))[0];
$unsuccessfull_checkout_today = mysqli_fetch_array(mysqli_query($con, "select count(bookid) from book where checkoutdate=date(NOW()) and checkedin!='checkedout'"))[0];
$total_checked_in = mysqli_fetch_array(mysqli_query($con, "select count(bookid) from book where checkedin='true'"))[0];
$expired_bookings = mysqli_fetch_array(mysqli_query($con, "select count(bookid) from book where checkindate<date(NOW()) and checkedin='false'"))[0];
?>

<body><center><table><tr>
<td rowspan="4" style="height: 100%; width: 70vw;">
<div class="holder" id="bddy">
<h2 style="font-family:'Arial'">Statistics</h2><hr>
<h4>Total Earnings: Rs.<?php echo $total_income ?></h4>
<h4 style="color:blue">Income Today: Rs.<?php echo $today_income ?></h4>
<h4 style="color:green">Succesfull Check-in's today: <?php echo $checkin_today ?></h4>
<h4 style="color:red">Bookings made for today but did not checked-in : <?php echo $unsuccessfull_checkin_today ?></h4>
<h4>Total Currently Checked-in customers: <?php echo $total_checked_in ?></h4>
<h4 style="color:green">Succesfull Check-out's today: <?php echo $checkout_today ?></h4>
<h4 style="color:red">Check-out date today but did not checked-out: <?php echo $unsuccessfull_checkout_today ?></h4>
<h4>Total Expired Bookings: <?php echo $expired_bookings ?></h4>
</div></td>
<td><div class="holder" id="cards">
<span class="material-symbols-outlined">Bed</span><h2> <?php echo $room ?> Rooms</h2>
</div></td></tr>
<tr><td><div class="holder" id="cards">
<span class="material-symbols-outlined">checkbook</span><h2> <?php echo $book ?> Booking</h2>
</div></td></tr>
<tr><td><div class="holder" id="cards">
<span class="material-symbols-outlined" >groups</span><h2> <?php echo $staff ?> Staffs</h2>
</div></td></tr>
<tr><td><div class="holder" id="cards">
<span class="material-symbols-outlined" >sentiment_dissatisfied</span><h2> <?php echo $complaints ?> DSAT</h2>
</div></td></tr></table></center></body>

</html>