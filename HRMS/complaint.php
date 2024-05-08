<html>
  <link rel="stylesheet" href="CSS/style.css">
  <body>
    <br> <a href="php/addcomplaint.php">Report Grievance</a> <br><br>
    <table>
      <tr>
        <th>S.No</th> <th>Room No.</th> <th>Greivance</th> <th>Creation date</th> <th>Action</th>
      </tr>
        <?php
          include('PHP/connection.php');
          if(isset($_GET['cvalue'])) // Check if anything was removed
          {
            $complaint_no = $_GET['cvalue'];
            $qry = mysqli_query($con, "delete from complaints where no='$complaint_no'") or die('FAILED');
          }
          $qry = mysqli_query($con, 'select * from complaints') or die(mysqli_error($con));
          while ( $row = mysqli_fetch_assoc($qry)) 
          {
            $cnumber = $row['no'];
            echo "<tr> 
            <td> $cnumber </td>
            <td>".$row['roomno']."</td>
            <td>".$row['complaint']."</td>
            <td>".$row['cdate']."</td>
            <td><a href='complaint.php?cvalue=$cnumber' class='green'>Mark as Resolved</a></td>           
            </tr>";
          } 
          ?>   
    </table>
</html>