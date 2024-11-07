<?php
if(isset($_POST['connexion'])){
    header("location:connexion.php");
}
if(isset($_POST['inscription'])){
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    if(!empty($prenom&&$nom&&$email&&$password)){
        include 'db/db.php';
        include 'classdb.php';
        $db = new db($pdo);
       $r= $db->db($email);
       if($r==null){
        $db->inscription($prenom,$nom,$email,$password);
        $r= $db->db($email);
        header("location:connexion.php?id=$r");
     }else{?>
        <div class="alert alert-danger text-center" role="alert">
            vous avez changer email
        
       </div> <?php
     }

        
       


    }else{
       
        ?>
        <div class="alert alert-danger text-center" role="alert">
           TOUTS LES CHAMPES ET OBLIGATOIRE
        
       </div> <?php


    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<h1 align="center">inscription</h1>
<body>
   <form action="" method="post">
    <div  class="container mt-5">
    <div class="mb-3">

        <input type="text" name="prenom" placeholder="prenom" class="form-control"></div>
        <div class="mb-3">

        <input type="text" name="nom" placeholder="nom"class="form-control"></div>
        <div class="mb-3">

        <input type="email" name="email" placeholder="email" class="form-control"></div>
        <div class="mb-3">

        <input type="password" name="password" placeholder=" le mot de pass" class="form-control"></div>
        <div class="mb-3 text-center">

        <input type="submit" name="inscription" value="inscription" class="btn btn-success"></div>
        <div class="mb-3 text-center">

        <input type="submit" name="connexion" value="connexion" class="btn btn-primary"></div>
        
    </div>
   </form> 
</body>
</html>