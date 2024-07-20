<?php
require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_jasa = $_POST["nama_jasa"];
    $harga = $_POST["harga"];
    $foto = $_FILES["foto"]; // Get the uploaded file

    // Check if the file was uploaded successfully
    if ($foto["error"] == 0) {
        // Get the file extension
        $file_ext = strtolower(pathinfo($foto["name"], PATHINFO_EXTENSION));

        // Check if the file extension is allowed
        $allowed_ext = array("jpg", "jpeg", "png", "gif");
        if (in_array($file_ext, $allowed_ext)) {
            // Generate a unique file name
            $file_name = uniqid() . "." . $file_ext;

            // Move the uploaded file to the img directory
            $target_dir = "img/";
            $target_file = $target_dir . $file_name;
            move_uploaded_file($foto["tmp_name"], $target_file);

            // Insert the data into the database
            $sql = "INSERT INTO jasa (nama_jasa, harga, foto) VALUES ('$nama_jasa', '$harga', '$file_name')";
            $result = $conn->query($sql);

            if ($result) {
                header("Location: admin.php");
                exit;
            } else {
                echo "Error creating new jasa: " . $conn->error;
            }
        } else {
            echo "Error: File extension not allowed";
        }
    } else {
        echo "Error uploading file";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Jasa</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Create New Jasa</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="nama_jasa">Nama Jasa:</label><br>
            <input type="text" id="nama_jasa" name="nama_jasa"><br>
            <label for="harga">Harga:</label><br>
            <input type="number" id="harga" name="harga"><br>
            <label for="foto">Foto:</label><br>
            <input type="file" id="foto" name="foto"><br>
            <input type="submit" value="Create">
        </form>
    </div>
</body>
</html>