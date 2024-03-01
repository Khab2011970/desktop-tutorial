<?php 
session_start(); // Bắt đầu session

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "qlbanhang"; 

// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { 
  die("Connection failed: " . $conn->connect_error); 
} 

$sql = "select id, fullname, email from customers where email = '".$_POST["email"]."' and password = '".md5($_POST["pass"])."'"; 

$result = $conn->query($sql); 

if ($result->num_rows > 0) { 
  
  $row = $result->fetch_assoc(); 
  
  // Lưu thông tin vào session
  $_SESSION['user'] = $row['email'];
  $_SESSION['fullname'] = $row['fullname'];
  $_SESSION['id'] = $row['id'];

  header('Location: homepage.php'); 
  
} else { 
  echo "Error: " . $sql . "<br>" . $conn->error; 
  // Trở về trang đăng nhập sau 3 giây 
  header('Refresh: 3;url=login.php'); 
}

$conn->close(); 
?>
