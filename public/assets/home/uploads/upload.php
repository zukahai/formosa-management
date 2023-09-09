<?php
if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $tempFile = $_FILES['file']['tmp_name'];
    $targetFile = 'upload/' . $_FILES['file']['name'];

    if (move_uploaded_file($tempFile, $targetFile)) {
        // File uploaded successfully
        http_response_code(200);
    } else {
        // Failed to move the uploaded file
        http_response_code(500);
    }
} else {
    // Error occurred during upload
    http_response_code(400);
}
?>