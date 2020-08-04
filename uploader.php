<?php

$pdo = new PDO("mysql:host=$dbServer;dbname=$dbName", $dbUser, $dbPassword);
 
//Get the name that is being searched for.
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
 
//The simple SQL query that we will be running.
$sql = "SELECT `id`, `email` FROM `users` WHERE `email` = :email";
 
//Prepare our SELECT statement.
$statement = $pdo->prepare($sql);
 
//Bind the $name variable to our :name parameter.
$statement->bindValue(':email', $email);
 
//Execute the SQL statement.
$statement->execute();
 
//Fetch our result as an associative array.
$userInfo = $statement->fetch(PDO::FETCH_ASSOC);
 
//If $userInfo is empty, it means that the submitted email
//address has not been found in our users table.
if(empty($userInfo)){
    echo 'That email address was not found in our system!';
    exit;
}
 
//The user's email address and id.
$userEmail = $userInfo['email'];
$userId = $userInfo['id'];
 
//Create a secure token for this forgot password request.
$token = openssl_random_pseudo_bytes(16);
$token = bin2hex($token);
 
//Insert the request information
//into our password_reset_request table.
 
//The SQL statement.
$insertSql = "INSERT INTO password_reset_request
              (user_id, date_requested, token)
              VALUES
              (:user_id, :date_requested, :token)";
 
//Prepare our INSERT SQL statement.
$statement = $pdo->prepare($insertSql);
 
//Execute the statement and insert the data.
$statement->execute(array(
    "user_id" => $userId,
    "date_requested" => date("Y-m-d H:i:s"),
    "token" => $token
));
 
//Get the ID of the row we just inserted.
$passwordRequestId = $pdo->lastInsertId();
 
 
//Create a link to the URL that will verify the
//forgot password request and allow the user to change their
//password.
$verifyScript = 'https://your-website.com/forgot-pass.php';
 
//The link that we will send the user via email.
$linkToSend = $verifyScript . '?uid=' . $userId . '&id=' . $passwordRequestId . '&t=' . $token;
 
//Print out the email for the sake of this tutorial.
echo $linkToSend;
?>
```````````````

<form action="" method="post" enctype="multipart/form-data">
  <h3>Upload image</h3>

  <div class="user-image mb-3 text-center">
    <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
      <img src="..." class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
    </div>
  </div>

  <div class="custom-file">
    <input type="file" name="fileUpload" class="custom-file-input" id="chooseFile">
    <label class="custom-file-label" for="chooseFile">Select file</label>
  </div>
  <?php
  echo'<img src="'.$img.'">';
  ?>
  <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
    Upload File
  </button>


<?php

$query = "SELECT img from artistlocation";

try{
    $db = new db();
    $db = $db->connect(); 
    $stmt = $db->query($sql);
    $data = array();
    while($result = $stmt->fetch(PDO::FETCH_OBJ))
    {
        $data[] = base64_encode($result['img']);
    }
   print_r ($data);
}
catch(PDOException $e){
    echo '{"error": {"text": '.$e->getMessage().'}';
} 

?>