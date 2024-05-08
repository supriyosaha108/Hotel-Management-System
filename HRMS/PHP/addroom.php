<html>
  <link rel="stylesheet" href="../CSS/style.css">

  <?php
  include("connection.php");
  if(isset($_POST['roomsubmit'])) {
    $room_number = $_POST['roomnumber'];
    $room_type = $_POST['roomtype'];
    $floor_number = $_POST['floornumber'];
    $room_condition = $_POST['roomcond'];
    $rate = $_POST['rate'];
    $qry = mysqli_query($con, "INSERT INTO ROOM VALUES ('$room_number', '$room_type', $floor_number, '$room_condition', $rate)") or die('Failed');
    echo "<script> alert('Room Added'); window.location.href = '../room.php' </script> ";
  }
  ?>

  <body>
      <div class="genform">
      <form action="" method="post" Autocomplete ="off">
        <h2>Room Details</h2>
        <hr>
        <h4>Room Number</h4>
        <input type="text" name="roomnumber" required>
        <h4>Room Type</h4>
        <select name="roomtype" id="roomtype" required>
          <option value="Single Bedroom (Non-AC)">Single Bedroom (Non-AC)</option>
          <option value="Double Bedroom (Non-AC)">Double Bedroom (Non-AC)</option>
          <option value="Single Bedroom (AC + WiFi)">Single Bedroom (AC + WiFi)</option>
          <option value="Double Bedroom (AC + WiFi)">Double Bedroom (AC + WiFi)</option>
          <option value="Luxury Bedroom (AC + Fridge + WiFi)">Luxury Bedroom (AC + Fridge + WiFi)</option>
        </select>
        <h4>Floor</h4>
        <input type="number" name="floornumber" required>
        <h4>Condition</h4>
        <select name="roomcond" id="roomcond" required>
          <option value="Usable">Usable</option>
          <option value="Under Maintaience">Under Maintaience</option>
        </select>
        <h4>Rate Per Night</h4>
        <input type="number" name="rate" required>
        <center><br><button name="roomsubmit" class='green'>Add Room</button></center>
      </form>
      </div>
  </body>
</html>