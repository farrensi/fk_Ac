<?php
require_once 'config.php';

// Get the id of the jasa to be edited
$id = $_GET['id'];

// Check if the id is set and is a valid integer
if (isset($id) && is_numeric($id)) {
    // Retrieve the jasa data from the database
    $sql = "SELECT * FROM jasa WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Display the edit form
  ?>
    <h2>Edit Jasa</h2>
    <form action="edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <div class="form-group">
            <label for="nama_jasa">Nama Jasa</label>
            <input type="text" class="form-control" id="nama_jasa" name="nama_jasa" value="<?php echo $row['nama_jasa'];?>">
        </div>
        <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" class="form-control" id="harga" name="harga" value="<?php echo $row['harga'];?>">
        </div>
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" id="foto" name="foto">
            <img src="img/<?php echo $row['foto'];?>" alt="<?php echo $row['nama_jasa'];?>" class="img-fluid">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <?php
} else {
    echo "Invalid ID";
}

// Update the jasa data if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama_jasa = $_POST['nama_jasa'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto'];

    // Check if a new foto is uploaded
    if ($foto['size'] > 0) {
        // Delete the old foto
        unlink("img/". $row['foto']);

        // Upload the new foto
        $foto_name = $foto['name'];
        $foto_tmp = $foto['tmp_name'];
        move_uploaded_file($foto_tmp, "img/". $foto_name);
    } else {
        $foto_name = $row['foto'];
    }

    // Update the jasa data in the database
    $sql = "UPDATE jasa SET nama_jasa = '$nama_jasa', harga = $harga, foto = '$foto_name' WHERE id = $id";
    $result = $conn->query($sql);

    // Check if the update was successful
    if ($result) {
        echo "Jasa updated successfully!";
        header("Location: admin.php"); // Redirect back to the admin dashboard
        exit;
    } else {
        echo "Error updating jasa: ". $conn->error;
    }
}

$conn->close();
?>