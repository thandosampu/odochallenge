<?php
$servername = '192.168.95.100:4083';
$username = 'root';
$password = 'root';
$dbname = 'local';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];

    $query = "SELECT * FROM `users` WHERE name='$name' and surname='$surname' and email='$email'";

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$count = mysqli_num_rows($result);
//print_r($count);

if ($count == 0){
$sql = "INSERT INTO users (name, surname, email)
VALUES ('$name', '$surname', '$email')";
$result = $conn->query($sql);

$sql = "SELECT id FROM users WHERE name='$name'";
$result = $conn->query($sql);
$conn->close();
}




}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>

</head>
<body>
    <div class="topbox"></div>
    
    <div class="container">
        <h1>INTERN CAPACITATOR</h1>
        <div class="left-div left-text">
        
        </div>
        <div class="right-div right-text">
            <h2>HIRE SOMEONE</h2>
            <div><?php 
         if (isset($_POST['name'])){
         while ($row=mysqli_fetch_assoc($result)){
            echo $row['id'];
}
}
?>
            </div>
            <p>Did you know that in South Africa the unemployment rate is 26.6%? want to curb that, then <strong>register</strong> to hire someone.</p>
            <form action="index.php" method="POST">
                <input type="text" required name="name" placeholder="First Name">
                <input type="text" required name="surname" placeholder="Last Name">
                <input type="email" required name="email" placeholder="Email">
                <input type="submit" name="submit" value="Sign up"><br>
                <a href="http://www.businessdictionary.com/definition/terms-and-conditions.html" target="_blank">Terms and conditions</a>
            </form>
        </div>
    </div>
</body>
</html>