<html>
  <link rel="stylesheet" href="../CSS/style.css">

  <?php
  include("connection.php");
  if(isset($_POST['roomsubmit'])) {
    $room_number = $_POST['roomnumber'];
    $room_type = $_POST['roomtype'];
    $floor_number = $_POST['floornumber'];
    $room_condition = $_POST['roomcond'];
    $rate =  $_POST['rate'];
    $qry = mysqli_query($con, "UPDATE ROOM SET type='$room_type', floor=$floor_number, cond='$room_condition', rate=$rate WHERE no='$room_number'") or die('Failed');
    echo "<script> alert('Room Updated'); window.location.href = '../room.php' </script> ";
  }
  ?>
  
  <body>
    <?php 
      include("connection.php");
      $qry = mysqli_query($con, "select * from room where no='".$_GET['roomvalue']."' ") or die("Failed");
      $row = mysqli_fetch_assoc($qry); 
    ?>
      <div class="genform">
      <form action="" method="post" Autocomplete ="off">
        <h2>Room Details</h2>
        <hr>
        <h4>Room Number</h4>
        <input type="text" name="roomnumber" style="background-color:whitesmoke" value="<?php echo $_GET['roomvalue'] ?>" readonly>
        <h4>Room Type</h4>
        <select name="roomtype" id="roomtype" required>
          <option value="<?php echo $row['type'] ?>" hidden><?php echo $row['type'] ?></option>
          <option value="Single Bedroom (Non-AC)">Single Bedroom (Non-AC)</option>
          <option value="Double Bedroom (Non-AC)">Double Bedroom (Non-AC)</option>
          <option value="Single Bedroom (AC + WiFi)">Single Bedroom (AC + WiFi)</option>
          <option value="Double Bedroom (AC + WiFi)">Double Bedroom (AC + WiFi)</option>
          <option value="Luxury Bedroom (AC + Fridge + WiFi)">Luxury Bedroom (AC + Fridge + WiFi)</option>
        </select>
        <h4>Floor</h4>
        <input type="number" name="floornumber" value="<?php echo $row['floor'] ?>" required>
        <h4>Condition</h4>
        <select name="roomcond" id="roomcond" value="<?php echo $row['cond'] ?>" required>
          <option value="<?php echo $row['cond'] ?>" hidden><?php echo $row['cond'] ?></option>
          <option value="Usable">Usable</option>
          <option value="Under Maintaience">Under Maintaience</option>
        </select>
        <h4>Rate Per Night</h4>
        <input type="number" name="rate" value="<?php echo $row['rate'] ?>" required>
        <center><br><button name="roomsubmit" class='grey'>Update Room</button></center>
      </form>
      </div>
  </body>
</html>