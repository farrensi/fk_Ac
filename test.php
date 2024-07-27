<?php
include 'config.php';

if (isset($_POST['tambah'])) {
  $foto = $_FILES['foto']['name'];
  $target = "img/" . basename($foto);

  $sql = "INSERT INTO carousel (foto) VALUES ('$foto')";
  if ($conn->query($sql) === TRUE) {
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
      echo "Foto berhasil ditambahkan ke carousel";
    } else {
      echo "Gagal mengunggah foto";
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<form action="" method="post" enctype="multipart/form-data">
  <input type="file" name="foto" required>
  <button type="submit" name="tambah" class="btn btn-primary">Tambah Foto</button>
</form>