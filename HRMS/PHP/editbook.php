<html>
    <link rel="stylesheet" href="../CSS/style.css">
    <head><style>
    input[type=date], input[type=text], input[type=number], select { margin: -5px; }
    </style></head>
    <body>
        <div class="genform">
            <h2>Booking Details</h2>
            <hr><br>
            <?php
            include("connection.php");
            $qry = mysqli_query( $con, "select * from book where bookid=".$_GET['bookid'] ) ;
            $row = mysqli_fetch_assoc($qry);
            
            if(isset($_POST['updatedetails'])) {

                $update_qry = "UPDATE book SET
                roomtype='".$_POST['roomtype']."', 
                roomno='".$_POST['roomno']."', 
                checkindate='".$_POST['checkindate']."', 
                checkoutdate='".$_POST['checkoutdate']."', 
                cost=".$_POST['cost'].", 
                name='".$_POST['name']."', 
                phoneno='".$_POST['phoneno']."', 
                idtype='".$_POST['idtype']."', 
                idnumber='".$_POST['idnumber']."', 
                checkedin='".$_POST['checkedin']."'
                WHERE bookid=".$_POST['bookid'];


                $update_qry_run = mysqli_query($con, $update_qry);
                echo mysqli_error($con);
                echo "<script>alert('Details Updated!'); window.location.href = '../booking.php'</script>";

            }
            ?>
            <form action="" method="post">
            <table>
                <tr>
                    <th>Parameters</th> <th>Details</th>
                </tr>
                <tr>
                    <td>Booking ID</td>
                    <td><input type="number" name="bookid" readonly 
                    style="background-color:whitesmoke" value="<?php echo $row['bookid'] ?>" ></td>
                </tr>
                <tr>
                    <td>Room Type</td>
                    <td>
                    <select name="roomtype" id="roomtype" required>
                    <option value="<?php echo $row['roomtype'] ?>" hidden><?php echo $row['roomtype'] ?></option>
                    <option value="Single Bedroom (Non-AC)">Single Bedroom (Non-AC)</option>
                    <option value="Double Bedroom (Non-AC)">Double Bedroom (Non-AC)</option>
                    <option value="Single Bedroom (AC + WiFi)">Single Bedroom (AC + WiFi)</option>
                    <option value="Double Bedroom (AC + WiFi)">Double Bedroom (AC + WiFi)</option>
                    <option value="Luxury Bedroom (AC + Fridge + WiFi)">Luxury Bedroom (AC + Fridge + WiFi)</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Room Number</td>
                    <td>
                    <select name="roomno">
                        <option value="<?php echo $row['roomno'] ?>" hidden><?php echo $row['roomno'] ?></option>
                    <?php 
                    $qry_room = mysqli_query( $con, "select no from room") ;
                    while($row_room = mysqli_fetch_assoc($qry_room)) { $temp = $row_room['no']; echo "<option value='$temp'>$temp</option>"; }
                    ?>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Check-in Date</td>
                    <td><input type="date" name="checkindate" value="<?php echo $row['checkindate'] ?>"></td>
                </tr>
                <tr>
                    <td>Check-out Date</td>
                    <td><input type="date" name="checkoutdate" value="<?php echo $row['checkoutdate'] ?>"></td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td><input type="number" name="cost" value="<?php echo $row['cost'] ?>"></td>
                </tr>
                <tr>
                    <td>Customer Name</td>
                    <td><input type="text" name="name" spellcheck='false' value="<?php echo $row['name'] ?>"></td>
                </tr>
                <tr>
                    <td>Customer Phone Number</td>
                    <td><input type="number" name="phoneno" value="<?php echo $row['phoneno'] ?>"></td>
                </tr>
                <tr>
                    <td>ID Type</td>
                    <td>
                    <select name='idtype'>
                    <option value="<?php echo $row['idtype'] ?>" hidden><?php echo $row['idtype'] ?></option>
                    <option value='Aadhar'>Aadhar</option>
                    <option value='PAN'>PAN</option>
                    <option value='Driving License'>Driving License</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>ID Number</td>
                    <td> <input type="text" name="idnumber" value="<?php echo $row['idnumber'] ?>"></td>
                </tr>
                <tr>
                    <td>Checked In</td>
                    <td> 
                        <select name="checkedin">
                            <option value="<?php echo $row['checkedin'] ?>" hidden><?php echo $row['checkedin'] ?></option>
                            <option value="true">true</option>
                            <option value="false">false</option>
                        </select>
                    </td>
                </tr>
            </table>           
            <br>
            <center><button class='blue' name='updatedetails'>Update Details</button></center>
            <br>
            </form>
            <br><br>
        </div>
    </body>
</html>













