<!DOCTYPE html>
<html>
<head>
    <title>Form Upload File</title>
</head>
<body>
    <h1>Upload File</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload File" name="submit">
    </form>

    <?php
    if (isset($_POST["submit"])) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo "T?p d� du?c t?i l�n th�nh c�ng.";
        } else {
            echo "C� l?i x?y ra khi t?i t?p l�n.";
        }
    }
    ?>
</body>
</html>
