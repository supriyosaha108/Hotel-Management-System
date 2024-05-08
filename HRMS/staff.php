<html>
  <link rel="stylesheet" href="CSS/style.css">
  <body>
    <br> <a href="php/addstaff.php" class='green'>Add Staff</a> <br><br>
    <table>
      <tr>
        <th>ID</th> <th>Name</th> <th>Designation</th> <th>Joining date</th> <th>status</th> <th>Action</th>
      </tr>
        <?php
          include('PHP/connection.php');
          if(isset($_GET['eid'])) // Check if anything was removed
          {
            $employee_no = $_GET['eid'];
            $qry = mysqli_query($con, "delete from staff where id='$employee_no'") or die('FAILED');
          }
          $qry = mysqli_query($con, 'select * from staff') or die(mysqli_error($con));
          while ( $row = mysqli_fetch_assoc($qry)) 
          {
            $eid = $row['id'];
            echo "<tr> 
            <td> $eid </td>
            <td>".$row['name']."</td>
            <td>".$row['designation']."</td>
            <td>".$row['joining date']."</td>
            <td>".$row['status']."</td>
            <td>
            <a href='PHP/viewstaff.php?eid=$eid' class='green'>Details</a>
            <a href='staff.php?eid=$eid'>Remove</a>
            </td>           
            </tr>";
          } 
          ?>   
    </table>
</html>