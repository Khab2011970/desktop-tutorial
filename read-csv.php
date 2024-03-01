<?php
function readCSV($csvFile) {
    $file_handle = fopen($csvFile, 'r');
    // Bỏ qua dòng đầu tiên (header)
    fgetcsv($file_handle);
    while (!feof($file_handle)) {
        $line = fgetcsv($file_handle);
        // Thực hiện insert vào CSDL
        // $line[0], $line[1],... là các giá trị tương ứng với cột trong file CSV
        // Insert dữ liệu vào bảng customers
        // Ví dụ: INSERT INTO customers (column1, column2, ...) VALUES ('$line[0]', '$line[1]', ...);
    }
    fclose($file_handle);
}
?>

