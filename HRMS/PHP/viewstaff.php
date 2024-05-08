  <html>
  <link rel="stylesheet" href="../CSS/style.css">
  <body>
    <?php
    include("connection.php");
    $eid = $_GET['eid'];
    $qry = mysqli_query($con, "select * from staff where id='$eid' ") or die("FAILED");
    $row = mysqli_fetch_assoc($qry);
    ?>
    <div class="genform">
        <h2>Staff Details</h2><hr>
        <h4>Staff Id</h2><input type="text" value="<?php echo $row['id'] ?>">
        <h4>Staff Name</h4><input type="text" value="<?php echo $row['name'] ?>">
        <h4>Designation</h4><input type="text" value="<?php echo $row['designation'] ?>">
        <h4>Joining Date</h4><input type="date" value="<?php echo $row['joining date'] ?>">
        <h4>Salary</h4><input type="number" value="<?php echo $row['salary'] ?>">
        <h4>Phone Number</h4><input type="text" value="<?php echo $row['phno'] ?>">
        <h4>Address</h4><input type="text" value="<?php echo $row['address'] ?>">
        <h4>Id Proof Type</h4><input type="text" value="<?php echo $row['id type'] ?>">
        <h4>Id Proof Number</h4><input type="text" value="<?php echo $row['id number'] ?>">
        <h4>Status</h4><input type="text" value="<?php echo $row['status'] ?>">
        <br><br><br>
    </div>
    
  </body>
  </html>