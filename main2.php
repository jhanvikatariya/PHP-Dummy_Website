
<?php
include('header.php');
?>
    <div>
        <center><h2>Techno IT Hub</h2></center>
        <h4 align='center'>We provide online and offline internships and courses in our company</h4>
        <hr>
        <h4 align='center'>To work with us, register here.....<h4>
    </div><br>
    <center><form method='POST' action=''>
        Name : 
        <input type='text' name='name'><br><br>
        Email : 
        <input type='email' name='email'><br><br>
        Password : 
        <input type='password' name='passcode'><br><br>
        Confirm Password : 
        <input type='password' name='c_passcode'><br><br>
        Phone : 
        <input type='text' name='phone'><br><br><br>
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
        echo 'Connection Successful';

        $name=$_POST['name'];
        $email=$_POST['email'];
        $passcode=$_POST['passcode'];
        $c_passcode=$_POST['c_passcode'];
        $phone=$_POST['phone'];
        if ($passcode!=$c_passcode){
         echo "Enter same password in both the fields";
            die();
        }

        $query="INSERT INTO `userdetails`(`name`, `email`, `passcode`, `c_passcode`, `phone`) VALUES ('$name','$email','$passcode','$c_passcode','$phone')";
        $execute=mysqli_query($conn,$query);

    }
    ?>
</body>
</html>