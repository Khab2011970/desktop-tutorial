<!DOCTYPE html>
<html>
<head>
    <title>Upload CSV</title>
</head>
<body>
    <h2>Upload File CSV</h2>
    <form action="upload-csv-processing.php" method="post" enctype="multipart/form-data">
        Chọn file CSV để upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br><br>
        <input type="submit" value="Upload File" name="submit">
    </form>
</body>
</html>
