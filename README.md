CONTENTS:

- [intro](https://github.com/Xnuvers007/uploadvideosXAMPP#upload-video-with-xampp-mysql-html--php)
- [Indonesia](https://github.com/Xnuvers007/uploadvideosXAMPP#indonesia)
- [English](https://github.com/Xnuvers007/uploadvideosXAMPP#english)
- [Catatan](https://github.com/Xnuvers007/uploadvideosXAMPP#catatan)
- [Notes](https://github.com/Xnuvers007/uploadvideosXAMPP#notes)
- [Images/Gambar](https://github.com/Xnuvers007/uploadvideosXAMPP#images--gambar)

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

![gambar](https://user-images.githubusercontent.com/62522733/224536150-a6958393-6d72-4933-b7ff-690cbe9bb936.png)

![gambar](https://user-images.githubusercontent.com/62522733/224536162-ebe57d4d-6aba-4813-9f95-f799fcd19c09.png)

![gambar](https://user-images.githubusercontent.com/62522733/224536184-0d01b3de-d093-49a7-82e4-5c210feefa62.png)

![gambar](https://user-images.githubusercontent.com/62522733/224536209-73ed5246-e70f-4d2a-9163-e871da14b910.png)

