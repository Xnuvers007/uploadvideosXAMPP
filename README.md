CONTENTS:

- [intro](https://github.com/Xnuvers007/uploadvideosXAMPP#upload-video-with-xampp-mysql-html--php)
- [update](https://github.com/Xnuvers007/uploadvideosXAMPP#update)
- [Indonesia](https://github.com/Xnuvers007/uploadvideosXAMPP#indonesia)
- [English](https://github.com/Xnuvers007/uploadvideosXAMPP#english)
- [Catatan](https://github.com/Xnuvers007/uploadvideosXAMPP#catatan)
- [Notes](https://github.com/Xnuvers007/uploadvideosXAMPP#notes)
- [Images/Gambar](https://github.com/Xnuvers007/uploadvideosXAMPP#images--gambar)

# Update

1:15 AM 03/22/2023 (Indonesia)
- 1. Fix bug SQLI
```   
      // Tambahkan data video ke database
      # $conn = mysqli_connect("localhost:8080", "root", "root", "stream");
      $query = "INSERT INTO videos (name, path, expiration) VALUES ('$fileName', '$uploadPath', '$expiration')";
      mysqli_query($conn, $query);
```
[Fix Bug In Here](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/upload.php#L128C1-L130C35)

- 2. Fix Bug XSS
```     
      # var_dump($conn);

      echo "Video berhasil diunggah dan akan dihapus dalam 7 hari.";
      echo "Video ada di: " . $uploadPath;
```
[Fix Bug In Here](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/upload.php#L137-L138)

- 3. Fix Bug Path Traversal
```
      // Menentukan path untuk menyimpan video
      $uploadPath = 'output/' . $fileName;

      // Pindahkan file video yang diupload ke folder uploads
      move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath);
```
[Fix Bug In Here](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/upload.php#L38-L71)

- 4. Fix Bug Use of Hardcoded Credentials
```
<?php

$conn = mysqli_connect("127.0.0.1", "root", "root", "stream"); # IP, Username, Password, Databases
?>
```
[Fix Bug In Here](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/connection.php#L7-L13)

- 5. add file [config.php](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/config.php)

- 6. add file [stream.php](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/output/stream.php) for streaming videos

- 7. add Stream and download videos from user want [check this](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/upload.php#L41-L45)

- 8. add [index.php](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/output/index.php) in output to patch directory listing

- 9. fix bug Xss
```
if (copy($uploadPath, $streamPath)) {
          echo "File berhasil diupload: <a href='output/$fileName'>Download</a> | <a href='output/stream.php?file=$fileName' target='_blank'>Streaming</a>";
```
[fix bug here](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/upload.php#L53)

- 10. fix Bug path traversal
```
      if (move_uploaded_file($_FILES['video']['tmp_name'], $uploadPath)) {
```
```
        if (copy($uploadPath, $streamPath)) {
```
[fix bug here](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/upload.php#L38-L71)

- 11. Fix Bug Xss
```
<body>
  <video controls autoplay>
    <source src="<?php echo 'streaming/' . $_GET['file']; ?>" type="video/mp4">
```
[Fix Bug in here](https://github.com/Xnuvers007/uploadvideosXAMPP/blob/master/output/stream.php#L18-L23)

# Upload Video With XAMPP, Mysql, HTML & PHP
how to upload and stream video using xampp and mysql

# INDONESIA
- Pertama-tama, pastikan bahwa server MySQL sudah berjalan di XAMPP.

- Buka command prompt atau terminal, lalu jalankan perintah berikut untuk masuk ke shell MySQL:
```mysql -u root -p```

- Setelah itu, ketik perintah berikut untuk membuat database baru:
```CREATE DATABASE stream;```

- Setelah itu, Buat table videos pada databases ***stream***
- Command MySQL untuk membuat table videos 
```
CREATE TABLE videos (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    expiration DATE NOT NULL
);
```

Jika kalian malas untuk membuat databases stream beserta tabelnya, saya sudah Mengekspor tabel dari basis data "stream" yang saya buat

[ada disini](https://raw.githubusercontent.com/Xnuvers007/uploadvideosXAMPP/master/stream.sql)

[jika kalian ingin mendownload repositori ini, klik ini](https://github.com/Xnuvers007/uploadvideosXAMPP/archive/refs/heads/master.zip)

# English
- First of all, make sure that the MySQL server is already running on XAMPP.
- Open a command prompt or terminal, then run the following command to enter the MySQL shell:
```mysql -u root -p```

- After that, type the following command to create a new database:
```CREATE DATABASE stream;```

- After that, create a videos table in the ***stream*** databases.
- MySQL command to create the videos table
```
CREATE TABLE videos (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    path VARCHAR(255) NOT NULL,
    expiration DATE NOT NULL
);
```

If you are too lazy to create a stream database with tables, I have exported the tables from the "stream" database that I created.

[in here](https://raw.githubusercontent.com/Xnuvers007/uploadvideosXAMPP/master/stream.sql)

[if you want to download this repository, click this](https://github.com/Xnuvers007/uploadvideosXAMPP/archive/refs/heads/master.zip)


### CATATAN
CATATAN: UNTUK MENJALAKANNYA, DOWNLOAD REPOSITORY INI DAN MASUKAN KE DALAM FOLDER/LOKASI ```C:\xampp\htdocs\```
SETELAH ITU BUKA XAMPP DAN NYALAKAN INI ```(APACHE & MYSQL)```

![gambar](https://user-images.githubusercontent.com/62522733/224535800-4c90b24d-1128-43e9-9958-30371bdb0fb0.png)

[Tekan ini Untuk mendownload XAMPP](https://www.apachefriends.org/download.html)

Oh iya, untuk XAMPP ini username adalah root dan password adalah kosong

### NOTES
NOTES: TO DO IT, DOWNLOAD THIS REPOSITORY AND INSERT IT INTO THE FOLDER/LOCATION ```C:\xampp\htdocs\```
AFTER THAT OPEN XAMPP AND TURN ON THIS ```(APACHE & MYSQL)```

![gambar](https://user-images.githubusercontent.com/62522733/224535800-4c90b24d-1128-43e9-9958-30371bdb0fb0.png)

[Press this to download XAMPP](https://www.apachefriends.org/download.html)

Oh yes, for this XAMPP username is root and password is blank

# IMAGES / GAMBAR

![gambar](https://user-images.githubusercontent.com/62522733/224535984-5f9a5d39-7866-4c9f-a0ad-762649eb65dd.png)

![gambar](https://user-images.githubusercontent.com/62522733/224536053-8282d705-45ed-4861-90a7-dc4d80d5345b.png)

![gambar](https://user-images.githubusercontent.com/62522733/224536067-f294ce43-5a9a-4ae4-aaf2-8fe5f93990e9.png)

![gambar](https://user-images.githubusercontent.com/62522733/226693384-9e75e5bc-8e48-405b-b6a0-65fb9db9deeb.png)

![gambar](https://user-images.githubusercontent.com/62522733/226693477-53568cf4-0bb0-45e0-b0ab-1b06114267a1.png)

<h1> If User Choice Download </h1>

![gambar](https://user-images.githubusercontent.com/62522733/226693643-3692d264-0c8a-4636-aac7-e790644f5139.png)

<h1> if user choice streaming </h1>

![gambar](https://user-images.githubusercontent.com/62522733/226693803-d0091284-2bb4-4421-9b07-b887a49d18ed.png)

