<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Streaming Video</title>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    video {
      width: 100%;
      height: 100%;
      object-fit: fill;
    }
  </style>
</head>
<body>
  <video controls autoplay>
    <source src="<?php echo 'streaming/' . $_GET['file']; ?>" type="video/mp4">
    Your browser does not support the video tag.
  </video>
  <script>
    // Mengatur tinggi video sama dengan tinggi layar
    var video = document.getElementsByTagName('video')[0];
    video.style.height = window.innerHeight + 'px';
    window.addEventListener('resize', function() {
      video.style.height = window.innerHeight + 'px';
    });
  </script>
</body>
</html>
