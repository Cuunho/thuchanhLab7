<?php

$servername = "database-server-lab7.cjgo6o8w8r8l.ap-southeast-1.rds.amazonaws.com";
$username = "admin";
$password = "123456789";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM User WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Bạn đã đăng nhập thành công";
        } else {
            echo "Bạn đã đăng nhập không thành công"; 
            }
        }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Đăng nhập</title>
    </head>
    <body>
        <h2>Đăng nhập</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label>Tên đăng nhập:</label>
            <input type="text" name="username"><br><br>
            <label>Mật khẩu:</label>
            <input type="password" name="password"><br><br>
            <input type="submit" value="Đăng nhập">
        </form>
    </body>
</html>