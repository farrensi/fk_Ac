<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Memeriksa apakah file telah diunggah dan tidak ada kesalahan
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        // Menentukan direktori target untuk menyimpan file yang diunggah
        $target_dir = "img/";
        
        // Mendapatkan nama asli dari file yang diunggah
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        
        // Menentukan jenis file
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Memeriksa apakah file benar-benar gambar
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            // Memindahkan file dari lokasi sementara ke lokasi permanen
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                // Menyimpan nama file ke database
                $sql = "INSERT INTO carousel (photo) VALUES ('" . basename($_FILES["photo"]["name"]) . "')";
                if ($conn->query($sql) === TRUE) {
                    echo "Photo added successfully!";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "No file was uploaded or there was an error uploading the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Photo</title>
</head>
<body>
    <h1>Add Photo</h1>
    <form action="add_photo.php" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="photo" id="photo" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <div class="container">
    <h1 class="text-center mt-5">Hapus Foto Carousel</h1>
    <form action="delete_photo.php" method="post">
      <div class="form-group">
        <label for="photo">Pilih Foto untuk Dihapus:</label>
        <select name="photo" id="photo" class="form-control" required>
          <?php
          require_once 'config.php';
          $sql = "SELECT * FROM carousel";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['id'] . '">' . $row['photo'] . '</option>';
              }
          }
          $conn->close();
          ?>
        </select>
      </div>
      <button type="submit" class="btn btn-danger">Hapus Foto</button>
    </form>
  </div>
</body>
</html>
