<?php
include 'config.php';
include 'Database.php';
?>


<?php
$db = new Database();

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($db->link, $_POST['name']);
    $email = mysqli_real_escape_string($db->link, $_POST['email']);
    $phn = mysqli_real_escape_string($db->link, $_POST['phn']);
    $dob = mysqli_real_escape_string($db->link, $_POST['dob']);
    $userid = mysqli_real_escape_string($db->link, $_POST['userid']);
    $password = mysqli_real_escape_string($db->link, $_POST['password']);
    if ($name == '' || $email == '' || $phn == '' || $dob == '' || $userid == '' || $password == '') {
        $error = "Field must not be Empty !!";
    } else {
        $query = "SELECT * FROM user WHERE userid = " . $userid;
        $user_exist = $db->select($query);
        if (mysql_num_rows($user_exist)) {
            $error = "User already exist";
        } else {
            $query = "INSERT INTO user(name,email,phn,dob,userid,password) 
   Values('$name','$email','$phn','$dob', '$userid', '$password')";
            $create = $db->insert($query);
            if ($create) {
                $_SESSION['user_id'] = $userid;
                header('Location: index.php');
                exit();
            }
        }
    }
}
?>

<?php
if (isset($error)) {
    echo "<span style='color:red'>" . $error . "</span>";
}
?>



<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">

        <title>User-sign_up</title>

        <link rel="stylesheet" type="text/css" href="style.css" media="all" />
        <link rel="icon" href="images/reg.png" />
    </head>
    <body>

        <div class="header">


            <div class="menu"> 
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="sign_up.php">Sign Up</a></li>
                    <li><a href="sign_in.php">Log In</a></li>
                </ul>

            </div>


        </div>

    <center><h1>Personal Wallet</h1></center>


    <div class="ler">
        <fieldset>
            <legend><b>Sign Up</b></legend>

            <h4>Already registered? </h4> <a href="sign_in.html">Log In</a><br>

            <form class="regi" action="sign_up.php" method="post">


                <label for="name" >Name:</label>
                <input type="text" name="name" placeholder="Name" autofocus required /> 
                <br><br>

                <label for="email">Email:</label> 
                <input type="email" name="email" placeholder="example@gmail.com" required />

                <br><br>

                <label for="phn" >Phone No:</label>
                <input type="text" name="phn" placeholder="Phone No" required /> 
                <br /><br />

                <label for="dob" >Date of Birth:</label>
                <input type="text" name="dob" placeholder="Date-Month-Year"  required /> 
                <br /><br />

                <label for="userid" >User ID:</label>
                <input type="text" name="userid" placeholder="User ID" required /> 
                <br><br>

                <label for="pass">Password:</label> 
                <input type="password" name="password" placeholder="Password" required />

                <br /><br />

                <label for="repass">Retype Password:</label>
                <input id="repass" type="password" placeholder="Retype Password" required />

                <br /><br />

                <input id ="checkbox" type="checkbox"/> I agree to the terms and condition

                <br /><br />

                <input type="submit" name="submit" value="Sign Up"/> 
            </form>

        </fieldset>
    </div>

    <div class="bottombar">

        <div class="bar1">
            <h2>About Us</h2>
            <p>
                <a href="http://www.facebook.com">Facebook</a><br>
                <a href="https://plus.google.com/discover?hl=en">Google+</a><br>
                <a href="https://twitter.com/?lang=en">Twitter</a>
            </p>
        </div >

        <div class="bar2">
            <h2>More</h2>
            <p>
                <a href="">Privacy Policy</a><br>
                <a href="">Terms & Conditions</a><br>

            </p>

        </div>

        <div class="bar3">
            <h2>My Account</h2>
            <p> 
                <a href="">Order History</a><br>
            </p>
        </div>


    </div>
    <br>
    <div class="copyright">
        <hr>
        <p> Personal Wallet &copy;2018 All Rights Reserved. <br />
            Developed by Jannat Binta Alam</p>

    </div>

</body>
</html>