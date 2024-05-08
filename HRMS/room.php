<html>
  <link rel="stylesheet" href="CSS/style.css">
  <body>
    <br> <a href="php/addroom.php" class="green">Add a Room</a> <br><br>
    <table>
      <tr>
        <th>Room No.</th> <th>Room Type</th> <th>Floor</th> <th>Condition</th> <th>Rate</th> <th>Action</th>
      </tr>

        <?php
          include('PHP/connection.php');
          if(isset($_GET['roomvalue'])) // Check if anything was removed
          {
            $roomvalue = $_GET['roomvalue'];
            $qry = mysqli_query($con, "delete from room where no='$roomvalue'") or die('FAILED');
          }
          $qry = mysqli_query($con, 'select * from room') or die(mysqli_error($con));
          while ( $row = mysqli_fetch_assoc($qry)) 
          {
            $roomnumber = $row['no'];
            echo "
            <tr> 
            <td> $roomnumber </td>
            <td>".$row['type']."</td>
            <td>".$row['floor']."</td>
            <td>".$row['cond']."</td>
            <td>".$row['rate']."</td>
            <td>
            <a href='php/editroom.php?roomvalue=$roomnumber' class='grey'>Update</a>
            <a href='room.php?roomvalue=$roomnumber'>Remove</a> 
            </td>
            </tr>";
          } 
          ?>   
           
    </table>
</html>