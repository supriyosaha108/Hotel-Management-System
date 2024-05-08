<?php if(isset($_COOKIE['HRMS101'])==false){ echo "<script>window.location.href='index.php'</script>"; } ?>
<html>
  <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="CSS/home.css">
  </head>

  <body>
    <div class="topbar">
      <span class="material-symbols-outlined" id='icon'>room_service</span>
      <img src="Assets/Logo.PNG">
      <span class="material-symbols-outlined" id="logout" onclick="window.location.href='PHP/logout.php';">logout</span>
    </div>
    <div class="sidebar">
      <div class="managername">
        <center>
          <img src="https://cdn-icons-png.flaticon.com/512/4205/4205906.png"><br>
          <h4><?php echo $_COOKIE['HRMS101']; ?></h4>
        </center>
      </div>
      <div class="menu">
        <center>
          <span class="material-symbols-outlined">space_dashboard</span>
          <button onclick="setnavigate('dashboard.php')">Dashboard</button><br>
          <span class="material-symbols-outlined">bed</span>
          <button onclick="setnavigate('room.php')">Manage Rooms</button><br>
          <span class="material-symbols-outlined">checkbook</span>
          <button onclick="setnavigate('booking.php')">Manage Bookings</button><br>
          <span class="material-symbols-outlined">groups</span>
          <button onclick="setnavigate('staff.php')">Manage Staffs</button><br>
          <span class="material-symbols-outlined">sentiment_dissatisfied</span>
          <button onclick="setnavigate('complaint.php')">View Complaints</button><br>
        </center>
      </div>
    </div>
    <div class="mainbar">
      <iframe src="" frameborder="0" id="mainframe"></iframe>
    </div>

    <script>
      setnavigate('dashboard.php');
      function setnavigate(x) { document.getElementById('mainframe').src = x; }
    </script>
    
  </body>
</html>