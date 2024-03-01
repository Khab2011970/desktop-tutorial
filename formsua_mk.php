<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
</head>
<body>

<h2>Change Password</h2>

<form action="" method="post">
    <label for="old_password">Old Password:</label><br>
    <input type="password" id="old_password" name="old_password" required><br><br>
    
    <label for="new_password">New Password:</label><br>
    <input type="password" id="new_password" name="new_password" required><br><br>
    
    <label for="confirm_password">Confirm New Password:</label><br>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if(isset($_POST['submit'])){
    // Kết nối CSDL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "qlbanhang";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Lấy thông tin người dùng từ session hoặc từ CSDL
    session_start();
    $user_id = $_SESSION['id'];

    // Lấy thông tin mật khẩu cũ từ form
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra mật khẩu cũ
    $sql = "SELECT password FROM customers WHERE id = '$user_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if($row['password'] != md5($old_password)){
            echo "Old password is incorrect.";
        } else {
            // Kiểm tra mật khẩu mới và xác nhận mật khẩu mới
            if($new_password != $confirm_password){
                echo "New password and confirm password do not match.";
            } elseif($new_password == $old_password){
                echo "New password must be different from old password.";
            } else {
                // Băm mật khẩu mới và cập nhật vào CSDL
                $hashed_password = md5($new_password);
                $update_sql = "UPDATE customers SET password = '$hashed_password' WHERE id = '$user_id'";
                if ($conn->query($update_sql) === TRUE) {
                    echo "Password updated successfully.";
                } else {
                    echo "Error updating password: " . $conn->error;
                }
            }
        }
    } else {
        echo "User not found.";
    }

    // Đóng kết nối CSDL
    $conn->close();
}
?>

</body>
</html>
