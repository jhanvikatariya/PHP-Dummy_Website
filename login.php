<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<?php
include('header.php');
?>
    <h3 align='center'>Login</h3>
    <form method='post' action='' align='center'>
        Email : 
        <input type='email' name='email'><br><br>
        Password :
        <input type='password' name='passcode'><br><br><br>
        <input type='submit' name='submit'>
    </form>
    <?php
    if(isset($_POST['submit']))
    {
        $servername='localhost';
        $username='root';
        $password='';
        $conn=new mysqli($servername,$username,$password,'website');
        if($conn->connect_error){
            die('connection failed'.$conn->connect_error);
        }
        $email=$_POST['email'];
        $passcode=$_POST['passcode'];

        $query= "SELECT * from `userdetails` where `email`='$email' AND `passcode`='$passcode' ";
        $execute=mysqli_query($conn,$query);
        $fetch=mysqli_fetch_array($execute);
        if ($passcode == $fetch['passcode'] and $email==$fetch['email']) {
            session_start();
            $_SESSION['email']=$email;
            header("Location: http://localhost/Website/enroll.php");
        } else{
            echo "<h2 align='center'><center>Enter valid email and password...</center></h2>";
           }
    }

    ?>
</body>
</html>