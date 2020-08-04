<?PHP

  include "header.php";
  include "footer.php";
  if(isset($_POST['submit']))
  {
    $photo = $_POST['photo'];
    $uploader = md5($_POST['uploader']);
    $pic = $_POST['img'];
    echo "<script type='text/javascript'>alert('$pic')</script>";
    try{
      $con = new PDO("mysql:host=localhost;dbname=camagru_","root","qiniso123");
      $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $con->prepare()->exec("INSERT INTO `images`(photo, uploader) VALUES ($photo, $uploader)");
      print_r($photo);


      // $photos="INSERT INTO images(photo, uploader) VALUES ($photo, $uploader)";
      // $con->exec($photos);
  }
  catch(PDOException $e)
  {
      echo "error".$e->getMessage();
  }
     $table = $con->prepare("INSERT INTO `images`(`id`, `photo`, `uploader`, `likes`) VALUES (photo,uploader)");
    # get user name for upploading
     $table->execute([$pic, 'DAVE']);
  }
?>
<html>
<head>
      <title>Camagru</title>
    <link rel="stylesheet" href="css/horizontalmenu.css">
</head>
<body>
<div class ="nav">
  <ul>
    <a class="home" href="home.php">Home</a>
    <a class="gallery" href="gallery.php">Gallery</a>
    <a class="Pfile" href="account.php">Profile</a>
    <a class="Logout" href="logout.php">Log Out</a>
    <a class="Forgotpass" href="forgot_password.php">Forgot-Password</a>
  </ul>
</div>
    <div class="booth">
        <video id="video"></video>
        <img id="image" height="640px" width="480px" style="display:none;"/>
        <button id="snap_button" onclick="javascript:Shot()">Take Picture</button>
        <canvas id="canvasvideo" width="400" height="300"></canvas>
        <form action="" method="post" enctype="multipart/form-data">
        <input name='img' id='img' type='hidden'/>
            <input name="submit" id="submit" type="submit" name="Save" value="Save">
            <input name='' id='user' type='hidden' value='<?=$_SESSION[login];?>'/>
        </form>
    </div>
    <script src="webcam.js"></script>
    <input type='file' accept="image/*" onchange="readURL(this);" />
   <br/>
   <img id="image" height="640px" width="480px" style="display: none;"/>
 </div>
 </article>
    <form id="img_filter">
    <label for="counter" class="counter">
      <input type="radio" name="img_filter" value="img/counter.png" id="counter" onchange="myimage('counter')">
      <img class="img" src="img/counter.png" height="64" width="64">
    </label>
    <label for="oat" class="oat">
      <input type="radio" name="img_filter" value="img/oat.png" id="oat" onchange="myimage('oat')">
      <img class="img" src="img/oat.png" height="64" width="64">
    </label>
    <label for="egg" class="egg">
      <input type="radio" name="img_filter" value="img/egg.png" id="egg" onchange="myimage('egg')">
      <img class="img" src="img/egg.png" height="64" width="64">
    </label>
    <label for="emma" class="emma">
      <input type="radio" name="img_filter" value="img/emma.png" id="emma" onchange="myimage('emma')">
      <img class="img" src="img/emma.png" height="64" width="64">
    </label>
    <br/>
    <label for="hero" class="hero">
      <input type="radio" name="img_filter" value="img/hero.png" id="hero" onchange="myimage('hero')">
      <img class="img" src="img/hero.png" height="64" width="64">
    </label>
     </form>
   <div class="videobox">
   <h3>Your photo's</h3>
   <div id="canvas"></div>
   <form method='post' accept-charset='utf-8' name='form'>
     <input name='user' id='user' type='hidden' value='<?=$_SESSION[login];?>'/>
   </form>
 </div>
</html>
</body>
</html>
<?php
include 'footer.php'
 ?>