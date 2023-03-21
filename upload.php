<?php
#
include "connection.php";
# var_dump($conn);
// Set maximum file size untuk 200MB
$maxFileSize = 200 * 1024 * 1024;

// Set waktu expired video menjadi 7 hari
$expiration = time() + (7 * 24 * 60 * 60);

// Cek apakah user sudah melakukan submit form

if (isset($_POST['submit'])) {
  // Cek apakah ada file yang diupload
  # var_dump($conn);
  
  if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
    // Cek apakah ukuran file tidak melebihi maximum file size
    
    if ($_FILES['video']['size'] <= $maxFileSize) {
      
      // Membuat nama file unik dengan menggabungkan waktu saat ini dan nama file
      // $fileName = time() . '_' . $_FILES['video']['name'];

      // Membuat direktori streaming jika belum ada
      if (!is_dir('output/streaming')) {
        mkdir('output/streaming', 0777, true);
      }

      // Menentukan path untuk menyimpan video
      // $fileName = basename($_FILES['video']['name']);
      // give name file with time
      // Sanitize and validate file name
      $fileName = filter_var(basename($_FILES['video']['name']), FILTER_SANITIZE_STRING);
      $fileName = preg_replace('/\s+/', '_', $fileName); // replace whitespace with underscore
      if (empty($fileName)) {
        die("File name is invalid");
      }

      // Generate unique file name to prevent path traversal
      $fileName = time(). '_'. $fileName;

      // Set file paths
      $uploadPath = __DIR__ . '/output/' . $fileName;
      $streamPath = __DIR__ . '/output/streaming/' . $fileName;

      // Move uploaded file to output directory
      if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath)) {

        // Copy file to streaming directory
        if (copy($uploadPath, $streamPath)) {
          // Output success message with sanitized file name
          echo "File berhasil diupload: <a href='output/" . htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8') . "'>Download</a> | <a href='output/stream.php?file=" . htmlspecialchars($fileName, ENT_QUOTES, 'UTF-8') . "' target='_blank'>Streaming</a>";
        } else {
          echo "Gagal membuat file streaming";
        }

      } else {
        echo "Gagal mengupload file";
      }

      // $fileName = time(). '_'. $_FILES['video']['name'];
      // $uploadPath = __DIR__ . '/output/' . $fileName;
      // $streamPath = __DIR__ . '/output/streaming/' . $fileName;

      // // Pindahkan file video yang diupload ke folder uploads
      // if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath)) {

      //   // Copy file video ke direktori streaming
      //   if (copy($uploadPath, $streamPath)) {
      //     echo "File berhasil diupload: <a href='output/$fileName'>Download</a> | <a href='output/stream.php?file=$fileName' target='_blank'>Streaming</a>";
      //   } else {
      //     echo "Gagal membuat file streaming";
      //   }

      // } else {
      //   echo "Gagal mengupload file";
      // }


//       // Menentukan path untuk menyimpan video
//       $uploadPath = 'output/' . basename($_FILES['video']['name']);

//       // Validasi path upload
//       if (!preg_match('/^(output\/[\w.-]+)$/', $uploadPath)) {
//           die('Invalid upload path');
//       }

//       // Pindahkan file video yang diupload ke folder uploads
//       if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath)) {
//           // file berhasil diupload
//           header('Content-Type: application/octet-stream');
//           header('Content-Description: File Transfer');
//           header('Content-Disposition: attachment; filename="' . basename($uploadPath) . '"');
//           header('Content-Transfer-Encoding: binary');
//           header('Expires: 0');
//           header('Cache-Control: must-revalidate');
//           header('Pragma: public');
//           header('Content-Length: ' . filesize($uploadPath));
//           ob_clean();
//           flush();
//           readfile($uploadPath);
//           exit;
//       } else {
//           // file gagal diupload
//           header('Location: error.php');
//           exit;
// }

      // // Menentukan path untuk menyimpan video
      // $uploadPath = 'output/' . $fileName;

      // // Pindahkan file video yang diupload ke folder uploads
      // move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath);

      // Tambahkan data video ke database
      $query = mysqli_prepare($conn, "INSERT INTO videos (name, path, expiration) VALUES (?, ?, ?)");
      mysqli_stmt_bind_param($query, "sss", $fileName, $uploadPath, $expiration);
      mysqli_stmt_execute($query);
      // mysqli_query($conn, $query);
      
      mysqli_close($conn);
      
      # var_dump($conn);

      echo "Video berhasil diunggah dan akan dihapus dalam 7 hari.";
      echo "Video ada di: " . htmlspecialchars($uploadPath, ENT_QUOTES, 'UTF-8');
      
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
