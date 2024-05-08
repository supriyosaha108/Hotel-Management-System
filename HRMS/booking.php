<html>
  <link rel="stylesheet" href="CSS/style.css">
  
  <body>
    <br> <a href="php/bookroom.php" class='blue'>Book a Room</a>
         <a href="booking.php?completedStay=1" class='grey'>Show Checked-Out Bookings</a>
    <br><br>
    <table>
      <tr>
       <th>ID</th> <th>Room</th> <th>Check-In</th> <th>Check-Out</th> <th>Name</th> <th>Phone</th> <th>Price</th> <th>Action</th>
      </tr>

        <?php
          include('PHP/connection.php');

          if(isset($_GET['remove'])) // Check if check-out
          {
            $bookid = $_GET['bookid'];
            $qry = mysqli_query($con, "delete from book where bookid='$bookid'") or die('FAILED');
          }
          elseif(isset($_GET['checkin'])) // Check if check-in
          {
            $bookid = $_GET['bookid'];
            $qry = mysqli_query($con, "update book set checkedin='true' where bookid='$bookid'") or die('FAILED');
          }
          elseif(isset($_GET['checkout'])) // Check if check-in
          {
            $bookid = $_GET['bookid'];
            $qry = mysqli_query($con, "update book set checkedin='checkedout' where bookid='$bookid'") or die('FAILED');
          }

          if (isset($_GET['completedStay'])) {
            $qry = mysqli_query($con, "select * from book where checkedin='checkedout' ") or die(mysqli_error($con));
          }
          else {
            $qry = mysqli_query($con, "select * from book where checkedin!='checkedout' ") or die(mysqli_error($con));
          }
          
          while ( $row = mysqli_fetch_assoc($qry)) 
          {
            $bookid = $row['bookid'];
            echo "
            <tr> 
            <td>".$row['bookid']."</td>
            <td>".$row['roomno']."</td>
            <td>".$row['checkindate']."</td>
            <td>".$row['checkoutdate']."</td>
            <td>".$row['name']."</td>
            <td>".$row['phoneno']."</td>
            <td>Rs.".$row['cost']."</td>
            <td>";
            if($row['checkedin']=='false') { echo "<a href='booking.php?bookid=$bookid&checkin=true' class='green'>Check-In</a> "; }
            elseif($row['checkedin']=='true') {echo "<a href='booking.php?bookid=$bookid&checkout=true'>Check-Out</a> ";}           
            echo "<a href='php/editbook.php?bookid=$bookid' class='grey'>Update</a>
            <a href='booking.php?bookid=$bookid&remove=true'>Remove</a>
            </td>
            </tr>";
          } 
          ?>   
           
    </table>
</html>