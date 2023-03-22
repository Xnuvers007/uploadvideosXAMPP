<?php

include "connection.php";

// Connect ke database
# $conn = mysqli_connect("localhost", "root", "", "stream");

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
      // Menghapus file jika tanggal kedaluwarsa telah lewat
      if (file_exists($path))
      {
        unlink($path);
        echo "File removed: " . $path . "<br>";

        // Menghapus data pada tabel "videos" yang bersangkutan
        $delete_sql = "DELETE FROM videos WHERE id = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("i", $id);
        $delete_stmt->execute();

        echo "Data removed from the table with ID: " . $id . "<br>";
      }
      else
      {
        echo "File not found: " . $path . "<br>";
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