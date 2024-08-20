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
    <?php
      $file = filter_input(INPUT_GET, 'file', FILTER_SANITIZE_STRING);
      $safeFile = htmlspecialchars($file, ENT_QUOTES, 'UTF-8');
      if (preg_match('/^[\w,\s-]+\.(mp4)$/i', $safeFile)) {
          echo '<source src="streaming/' . $safeFile . '" type="video/mp4">';
      } else {
          echo 'Invalid file type.';
      }
    ?>
    Your browser does not support the video tag.
  </video>
  <script>
    var video = document.getElementsByTagName('video')[0];
    video.style.height = window.innerHeight + 'px';
    window.addEventListener('resize', function() {
      video.style.height = window.innerHeight + 'px';
    });
  </script>
</body>
</html>
