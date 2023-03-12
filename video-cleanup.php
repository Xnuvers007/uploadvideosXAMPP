<?php
// Connect ke database
$conn = mysqli_connect("localhost", "root", "", "stream");

// Ambil semua data video dari database
$query = "SELECT * FROM videos";
$result = mysqli_query($conn, $query);

// Loop melalui semua data video
while ($row = mysqli_fetch_assoc($result)) {
  $fileName = $row['name'];
  $filePath = $row['path'];
  $expiration = strtotime($row['expiration']);

  // Jika waktu expired sudah lewat, hapus file video dan data dari database
  if (time() > $expiration) {
    unlink($filePath);
    $deleteQuery = "DELETE FROM videos WHERE name = '$fileName'";
    mysqli_query($conn, $deleteQuery);
  }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
