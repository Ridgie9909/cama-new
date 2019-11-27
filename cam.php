<html>
<body>
<video id="video" width="400" height="300" autoplay></video>
<button id="snap">Snap Photo</button>
        <canvas id="canvas" width="400" height="300"></canvas>
        <form method="post" action="cam.php">
          <input name="imgsrc" id="imgsrc" type="hidden" value="">
          <button type="submit" name="submit" id="submitphoto">Submit Photo</button>
        </form>
        <script src="js/cam.js"></script>
</body>
</html>