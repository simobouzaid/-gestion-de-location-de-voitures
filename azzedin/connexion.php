<?php 
if(isset($_POST['cxn'])){
$email=$_POST['email'];
$password=$_POST['password'];
if(!empty($email&&$password)){
    include 'db/db.php';
    include 'classdb.php';
    $db =new db($pdo);
    $return=$db->connexion($email,$password);
    if(empty($return)){?>
        <div class="alert alert-danger text-center" role="alert">
            ERROR EMAIL OU LE MOTS DE PASS
        
       </div>
       <?php
    }else{
        echo"$return";
        setcookie("cxn",$email,time() + (86400*365));
        setcookie("pass",$password,time() + (86400*365));

        header("location:index.php?id=$return");
    }
}

}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<h1 align="center">connexion</h1>
<body>
<div class="container mt-5">
    <form action="connexion.php" method="post">
    <div class="mb-3">
        <input type="email" name="email" class="form-control" placeholder="email" >
    </div>
    <div class="mb-3">
        <input type="password" name="password" class="form-control" placeholder="le motn de pass ">
    </div>
    <div class="mb-3 text-center">
    <input type="submit" name="cxn" value="connexion" class="btn btn-success"></div>
    <div class="mb-3 text-center">
    <a href="inscription.php" class="btn btn-primary">inscription</a>
</div>

    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>