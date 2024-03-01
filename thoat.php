<?php
// Bắt đầu session
session_start();

// Xóa tất cả các biến session
$_SESSION = array();

// Nếu sử dụng cookie để lưu session ID, bạn cũng cần xóa cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Xóa các cookie khác liên quan đến đăng nhập nếu có
setcookie('fullname', '', time() - 3600, '/');
setcookie('id', '', time() - 3600, '/');

// Hủy session
session_destroy();

// Chuyển hướng người dùng về trang chủ hoặc trang đăng nhập
header('Location: homepage.php'); // Thay đổi index.php thành URL của trang chủ hoặc trang đăng nhập của bạn
exit;
?>
