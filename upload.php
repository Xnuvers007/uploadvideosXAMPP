<?php
// Set maximum file size untuk 200MB
$maxFileSize = 200 * 1024 * 1024;

// Set waktu expired video menjadi 7 hari
$expiration = time() + (7 * 24 * 60 * 60);

// Cek apakah user sudah melakukan submit form
if (isset($_POST['submit'])) {
  // Cek apakah ada file yang diupload
  if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
    // Cek apakah ukuran file tidak melebihi maximum file size
    if ($_FILES['video']['size'] <= $maxFileSize) {
      // Membuat nama file unik dengan menggabungkan waktu saat ini dan nama file
      $fileName = time() . '_' . $_FILES['video']['name'];

      // Menentukan path untuk menyimpan video
      $uploadPath = 'C:\xampp\tmp/' . $fileName;

      // Pindahkan file video yang diupload ke folder uploads
      move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath);

      // Tambahkan data video ke database
      $conn = mysqli_connect("localhost", "root", "", "stream");
      $query = "INSERT INTO videos (name, path, expiration) VALUES ('$fileName', '$uploadPath', '$expiration')";
      mysqli_query($conn, $query);
      mysqli_close($conn);

      echo "Video berhasil diunggah dan akan dihapus dalam 7 hari.";
    } else {
      echo "Ukuran file video melebihi maximum file size.";
    }
  } else {
    echo "Tidak ada file yang diupload.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload dan Stream Video</title>
</head>
<body>
  <h1>Upload dan Stream Video</h1>
  <form method="post" enctype="multipart/form-data">
    <label for="video">Pilih video (maksimum 200MB):</label>
    <input type="file" name="video" id="video">
    <br>
    <br>
    <input type="submit" name="submit" value="Unggah">
  </form>
</body>
</html>
