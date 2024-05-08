<html>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="CSS/home.css"><link rel="stylesheet" href="CSS/style.css">
    <body class="indexbody">
        <div class="topbar">
        <span class="material-symbols-outlined" id='icon'>room_service</span>
        <img src="Assets/Logo.PNG">
        </div>
        <div class="genform genformindex">
            <form action="" method="post" autocomplete='off'>
                <h2>Sign up</h2><hr>
                
                <?php 
                include("PHP/connection.php");
                if(isset($_POST['signupbutton'])) 
                {
                    $name = $_POST['man_name']; $ph = $_POST['phno']; $pass = $_POST['pass'];
                    $qry = mysqli_query($con, "insert into manager values('$ph', '$name', '$pass')") or die("Registration Failed");
                    echo "<script> alert('Registration Successful!'); window.location.href='index.php'; </script>";
                }   ?>

                <h5>Name</h5><input type="text" name="man_name" spellcheck='false'  placeholder="First and last name" required>
                <h5>Phone number</h5><input type="number" name="phno"  placeholder="Mobile number or username" required>
                <h5>Password</h5><input type="password" name="pass" placeholder="New password" required>
                <br><br>
                <center>
                    <button name="signupbutton" class='green'>Sign up</button>
                    <br><br><br>
                    <a href="index.php" class="grey">Existing users click here</a>
            </center>
            </form>
        </div>
    </body>
</html>