<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: http://localhost/Website/new.php");
    exit();
}

echo $_SESSION['email'];

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'website';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
$email= $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="topnav">
    <?php include('header.php'); ?>
</div>
<h1 align='center'>Enroll Form</h1>
<form align='center' method='POST' action=''>
    <label>Course:</label>
    <select name="course">
        <option value="webdesigning">Web Designing</option>
        <option value="webdevelopment">Web Development</option>
        <option value="digitalmarketing">Digital Marketing</option>
        <option value="reactjs">ReactJS</option>
        <option value="android">Android</option>
        <option value="python">Python</option>
        <option value="angular">Angular</option>
        <option value="php">PHP</option>
        <option value="cc++">C/C++</option>
        <option value="java">Java</option>
        <option value="nodejs">NodeJS</option>
        <option value="datascience">Data Science</option>
        <option value="github">GitHub</option>
        <option value="dataengineering">Data Engineering</option>
        <option value="amazonwebservices">Amazon Web Services</option>
    </select><br><br>
    <label>College:</label>
    <input type='text' name='college' required><br><br>
    <label>Phone:</label>
    <input type='text' name='phone' required><br><br>
    <input type='submit' name='submit'><br><br>
</form>
<form align='center' method='post' action=''>
    <input type='submit' name='logout' value='Logout'>
</form>
<?php
if(isset($_POST['submit']))
{
    $course=$_POST['course'];
    $college=$_POST['college'];
    $phone=$_POST['phone'];
    $email= $_SESSION['email'];
    $query="UPDATE `userdetails` SET `course`='$course',`college`='$college',`phone`='$phone' WHERE email='$email'";
    $execute=mysqli_query($conn,$query);
    if($_POST['submit']==True){
        echo('<nobr><h4>You have successfully enrolled for ');
        echo($course);
        echo('</h4></nobr>');
    }
    else{
        echo('You are not enrolled, try again!!');
    }
}
if(isset($_POST['logout'])){
    $email= $_SESSION['email'];
    $query="DELETE FROM `userdetails` WHERE email='$email'";
    $execute=mysqli_query($conn,$query);
    echo("<h4 align='center'>You have been logout from this session</h4>");
}
session_unset();
?>
</body>
</html>
