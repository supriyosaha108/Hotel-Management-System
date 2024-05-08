<html>
<link rel="stylesheet" href="../CSS/style.css">
<head> <style> table,td,tr { border: 1px solid lightgrey; } </style> </head>
<body>

<div class="genform">
<form action="" method="POST">
<h2>Booking Details</h2>
<hr>
<h4>Room Type</h4>
<select name="roomtype" required>
    <option value="Single Bedroom (Non-AC)">Single Bedroom (Non-AC)</option>
    <option value="Double Bedroom (Non-AC)">Double Bedroom (Non-AC)</option>
    <option value="Single Bedroom (AC + WiFi)">Single Bedroom (AC + WiFi)</option>
    <option value="Double Bedroom (AC + WiFi)">Double Bedroom (AC + WiFi)</option>
    <option value="Luxury Bedroom (AC + Fridge + WiFi)">
        Luxury Bedroom (AC + Fridge + WiFi)
    </option>
</select> <br><br>
<table style="width: 100%;">
<tr>
<td><h4>Check In Date</h4><input type="date" name="checkin" required></td>
<td><h4>Check Out Date</h4><input type="date" name="checkout" required></td>
</tr>
</table>
<br>
<center><button class="grey" name="submitbutton">Check Availability</button></center>
</form></div>   

<?php
include("connection.php");
if(isset($_POST['submitbutton'])) 
{
    $roomtype = $_POST['roomtype'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $diff = (int)date_diff(date_create($checkin),date_create($checkout))->format("%a");
    $diffp = date_diff(date_create($checkin),date_create($checkout))->format("%R");
    $rate = mysqli_fetch_array(mysqli_query($con, "select rate from room where type='$roomtype' "))[0] or die("Room rate fetch failed");
    $amount = $diff * ((int)$rate);
    $today = date("Y-m-d");

    $q = "select no from room where type='$roomtype' 
    AND cond='Usable' 
    AND room.no NOT IN (select roomno from book where checkedin!='checkedout')";
    $qry = mysqli_query($con, $q);

    if (mysqli_num_rows($qry) == 0) {
        echo "<script>alert('No room is available of specified criteria')</script>";
        die();
    }
    elseif ($diff==0 or $diffp == '-') {
        echo "<script>alert('Please select valid date')</script>"; die();
    }
    elseif ($checkin < $today or $checkout < $today) {
        echo "<script>alert('Booking cannot be made at a previous date!')</script>"; die();
    }


    echo "
    <div class='genform' style='background-color: white'>
    <form action='' method='POST'>

    <input type='hidden' name='room_type_hidden' value='$roomtype'>
    <input type='hidden' name='check_in_date_hidden' value='$checkin'>
    <input type='hidden' name='check_out_date_hidden' value='$checkout'>
    <input type='hidden' name='cost_hidden' value='$amount'>

    <h2>Customer Details</h2><hr>
    <h4>Room Number</h4> 
    <select name='room_no' required>";
    while($row = mysqli_fetch_assoc($qry)) 
    { 
        echo "<option value='".$row['no']."'>".$row['no']."</option>";
    }
    echo "</select>
    <h4>Customer Name</h4>
    <input type='text' name='cust_name' spellcheck='false'>
    <h4>Phone Number</h4>
    <input type='number' name='ph_no'> 
    <h4>ID Proof</h4>    
    <table><tr><td>
        <br><select name='id_type'>
        <option value='Aadhar'>Aadhar</option>
        <option value='PAN'>PAN</option>
        <option value='Driving License'>Driving License</option>
        </select></td>
        <td><br><input type='number' name='id_num' placeholder='Document Number'></td></tr>
    </table>
    <center><h4 style='color:green'>Estimated Cost: Total amount to be paid is Rs.$amount ($diff night x $rate per night)</h4>
    <button class='green' name='confirmbutton'>Confirm Booking</button></center>
    </form></div>";
}


elseif (isset($_POST['confirmbutton'])) 
{
    $roomtype = $_POST['room_type_hidden']; $roomno = $_POST['room_no'];
    $checkindate = $_POST['check_in_date_hidden'];
    $checkoutdate = $_POST['check_out_date_hidden'];
    $cost = $_POST['cost_hidden']; 
    $name = $_POST['cust_name']; $phoneno = $_POST['ph_no'];   
    $idtype = $_POST['id_type']; $idnumber = $_POST['id_num'];
    $checkedin = 'false';
    $qry = mysqli_query($con, "insert into book values (NULL, '$roomtype', '$roomno', '$checkindate', '$checkoutdate', $cost, '$name', '$phoneno', '$idtype', '$idnumber', '$checkedin')") or die('Failed');
    echo "<script> alert('Booking Confirmed!') </script>";
}

?>   
</body>
</html>