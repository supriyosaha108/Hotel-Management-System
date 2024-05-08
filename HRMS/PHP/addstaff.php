<html>
<link rel="stylesheet" href="../CSS/style.css">
<head><style>input[type=date], input[type=text], input[type=number], select { margin: -5px; }</style></head>
<body>
  <?php
    if(isset($_POST['addemployee'])) 
    {
        include("connection.php");
        $id = $_POST['Id']; $name = $_POST['name'];  $designation = $_POST['designation'];
        $joining_date = $_POST['joining_date']; $salary = $_POST['salary']; $phno = $_POST['phno']; $address = $_POST['address'];
        $id_type = $_POST['Id_type']; $id_number = $_POST['Id_number'];  $status = $_POST['status'];
        $qry = mysqli_query($con, "insert into staff values('$id','$name','$designation','$joining_date','$salary','$phno','$address','$id_type','$id_number','$status')") or die("Failed");
        echo "<script> alert('Staff added!'); window.location.href = '../staff.php' </script> ";
    }
  ?>
  <div class="genform">
    <form action="" method="POST" autocomplete="off">
    <h2>Staff Details</h2><hr>
    <br><table>
    <tr><th>Parameter</th><th>Details</th></tr>
    <tr><td>Staff Id</td><td><input type="text" name="Id" required></td></tr>
    <tr><td>Name</td><td><input type="text" name="name" spellcheck="false" required></td></tr>
    <tr><td>Designation</td><td><input type="text" name="designation" required></td></tr>
    <tr><td>Joining Date</td><td><input type="date" name="joining_date" required></td></tr>
    <tr><td>Salary</td><td><input type="number" name="salary" required></td></tr>
    <tr><td>Phone Number</td><td><input type="number" name="phno" required></td></tr>
    <tr><td>Address</td><td><input type="text" name="address" required></td></tr>
    <tr><td>Id Proof</td><td>
      <select name="Id_type" required>
        <option value="Aadhar">Aadhar</option>
        <option value="PAN">PAN</option>
        <option value="Driving License">Driving License</option>
        <option value="Voter Id">Voter ID</option>
      </select>
    </td></tr>
    <tr><td>Id Number</td><td><input type="text" name="Id_number" required></td></tr>
    <tr><td>Status</td><td><input type="text" name="status" required></td></tr>
    </table><br>
    <center><button name="addemployee" class='green'>Add Staff</button></center><br><br>
    </form>
  </div>  
</body>
</html>