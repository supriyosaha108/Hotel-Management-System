<html>
  <link rel="stylesheet" href="../CSS/style.css">

  <?php
  include("connection.php");
  if(isset($_POST['complaintsubmit'])) {
    $room_number = $_POST['roomnumber'];
    $problem = $_POST['complaint'];
    $complaint_date = $_POST['cdate'];
    $qry = mysqli_query($con, "INSERT INTO COMPLAINTS VALUES (NULL, '$room_number', '$problem', '$complaint_date')") or die('Failed');
    echo "<script> alert('Grievance reported!'); window.location.href = '../complaint.php' </script> ";
  }
  $qry_room_list = mysqli_query($con, "select no from room");
  ?>

  <body>
      <div class="genform">
      <form action="" method="post" Autocomplete ="off">
        <h2>Room Details</h2>
        <hr>
        <h4>Room Number</h4>
        <select name="roomnumber" required>
         <?php
         while($row=mysqli_fetch_assoc($qry_room_list)) { echo "<option value=".$row['no'].">".$row['no']."</option>"; }
         ?>
         </select>
        <h4>Greivance Description</h4>
        <input type="text" name="complaint" required>
        <h4>Reporting Date</h4>
        <input type="date" name="cdate" value="<?php echo date("Y-m-d"); ?>" readonly>
        <center><br><button name="complaintsubmit">Submit Grievance</button></center>
      </form>
      </div>
  </body>
</html>