<?php

include "connection.php";

// Connect ke database
# $conn = mysqli_connect("localhost", "root", "", "stream");

// Define the allowed directory for video files
$allowed_dir = "output/";

// Ambil semua data video dari database
$query = "SELECT * FROM videos";

$result = $conn->query($query);

if ($result->num_rows > 0)
{
  // Menghapus file untuk setiap baris yang ditemukan
  while ($row = $result->fetch_assoc())
  {
    $path = $row["path"];
    $expiration = $row["expiration"];
    $id = $row["id"];
    $current_date = new DateTime();
    $expiration_date = new DateTime($expiration);

    // Memeriksa apakah tanggal kedaluwarsa telah lewat
    if ($current_date > $expiration_date)
    {
      // Check if the path is allowed (i.e. within the allowed directory)
      $real_path = realpath($allowed_dir . $path);
      if ($real_path !== false && strpos($real_path, $allowed_dir) === 0 && file_exists($real_path))
      {
        unlink($real_path);
        echo "File removed: " . $real_path . "<br>";

        // Menghapus data pada tabel "videos" yang bersangkutan
        $delete_sql = "DELETE FROM videos WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);
        $delete_stmt->execute();

        echo "Data removed from the table with ID: " . $id . "<br>";
      }
      else
      {
        echo "File not found or not allowed: " . $path . "<br>";
      }
    }
  }
}
else
{
  echo "0 results";
}

// Menutup koneksi database
$conn->close();
