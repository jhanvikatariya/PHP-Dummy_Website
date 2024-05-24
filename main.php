<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
     
<?php   
    include ('header.php');
?>
<div>
        <center><h2>Techno IT Hub</h2></center>
        <h4 align='center'>We provide online and offline internships and courses in our company</h4>
        <hr>
        <h4 align='center'>To work with us, register here.....<h4>
    </div><br>
    <center><form method='POST' action=''>
        Name : 
        <input type='text' name='name' value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"><br><br>
        Email : 
        <input type='email' name='email' value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"><br><br>
        Password : 
        <input type='password' name='passcode'><br><br>
        Confirm Password : 
        <input type='password' name='c_passcode'><br><br>
        Phone : 
        <input type='text' name='phone' value="<?php echo isset($_POST['phone']) ? htmlspecialchars($_POST['phone']) : ''; ?>"><br><br><br>
        <input type='submit' name='submit'>
    </form></center>

    <?php
    if (isset($_POST['submit']))
    {
        $servername='localhost';
        $username='root';
        $password='';
        $conn=new mysqli($servername,$username,$password,'website');
        if($conn->connect_error){
            die('connection failed'.$conn->connect_error);
        }

        $name=$_POST['name'];
        $email=$_POST['email'];
        $passcode=$_POST['passcode'];
        $c_passcode=$_POST['c_passcode'];
        $phone=$_POST['phone'];
        if ($passcode!=$c_passcode){
         echo " <span style='color:red'><br><br>Enter same password in both the fields</span>";
         $display_values = true;
         if ($passcode!=$c_passcode){
            echo("<span style='color:red'><br><br>If you do not enter the same password in both the fields for second time you will have to resubmit the registration form....</span>");
                die();
        }
    }
        $query="INSERT INTO `userdetails`(`name`, `email`, `passcode`, `c_passcode`, `phone`) VALUES ('$name','$email','$passcode','$c_passcode','$phone')";
        $execute=mysqli_query($conn,$query);
        header("Location: http://localhost/Website/login.php") ;
    }
    ?>
</body>
</html>