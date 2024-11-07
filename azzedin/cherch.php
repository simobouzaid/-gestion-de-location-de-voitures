<?php 
if(isset($_POST['go'])){
  $name=  $_post['name'];
  include 'db/db.php';
  $sql=$pdo->prepare("SELECT * FROM client where nameclient=? LIKE'%search_term%';");
  $sql->execute([$name]);

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><form action="" method="post">
    <input type="text" name="name">
    <input type="submit" name="go">
</form>
<?php ?>
    
</body>
</html>