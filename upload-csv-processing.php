<?php
// Kiểm tra nếu form được submit
if(isset($_POST["submit"])) {
    // Đường dẫn lưu file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Kiểm tra file có phải là file CSV không
    if($fileType != "csv") {
        echo "Chỉ chấp nhận file CSV.";
        $uploadOk = 0;
    }

    // Kiểm tra nếu upload thành công
    if ($uploadOk == 0) {
        echo "Upload không thành công.";
    } else {
        // Upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "File ". basename( $_FILES["fileToUpload"]["name"]). " đã được upload thành công.";
            // Đọc dữ liệu từ file CSV và insert vào CSDL
            require_once 'read-csv.php';
            readCSV($target_file);
        } else {
            echo "Đã xảy ra lỗi khi upload file.";
        }
    }
}
?>
