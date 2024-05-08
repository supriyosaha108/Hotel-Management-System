<?php if(isset($_COOKIE['HRMS101'])){ echo "<script>window.location.href='home.php'</script>"; } ?>
<html>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
<link rel="stylesheet" href="CSS/home.css"><link rel="stylesheet" href="CSS/style.css">
<body class="indexbody">
<div class="topbar">
<span class="material-symbols-outlined" id='icon'>room_service</span>
<img src="Assets/Logo.PNG">
</div>
<div class="genform genformindex">
<form action="" method="post">
<h2>Login</h2><hr>

<?php 
include("PHP/connection.php");
if(isset($_POST['loginbutton'])) 
{
$ph = $_POST['phno']; $pass = $_POST['pass'];
$qry = mysqli_query($con, "select * from manager where phno='$ph' and password='$pass'") or die("Login Failed");
if(mysqli_num_rows($qry)==0) { echo "<script> alert('Invalid Login Credentials!'); </script>"; }
else {
    $row = mysqli_fetch_assoc($qry);
    setcookie("HRMS101", $row['name'], time() + (86400 * 30), "/"); // 30 days
    echo "<script>window.location.href='home.php'</script>";
}
}   ?>

<h5>Phone number</h5><input type="number" name="phno" placeholder="Mobile number or username" required>
<h5>Password</h5><input type="password" name="pass" placeholder="Password" required>
<br><br>
<center><button name="loginbutton" class='blue'>Log in</button>
<br><br><br>
<a href="signup.php" class="grey">New users click here</a>
</center>
</form>
</div>
</body>
</html>