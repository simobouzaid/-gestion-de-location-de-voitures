<?php
include 'navbar.php';

 if(empty($_COOKIE["cxn"]&&$_COOKIE['pass'])){
    header("location:connexion.php");}
    $nom=$_COOKIE["nom"];
    $id=$_COOKIE["id"];
   echo" <h1 align='center'>bonjour:$nom</h1>";

    if(isset($_POST['ajouter'])){
       $n= $_POST['nomvoiture'];
        $p=$_POST['nomclient'];
        $prix=$_POST['prix'];
        $ds=$_POST['datesortie'];
        $de=$_POST['dateentrer'];
        $admin=1;
        if(!empty($n&&$p&&$ds&&$de&&$prix)){
            include 'classdb.php';
            include 'db/db.php';
            $db = new db($pdo);
            $db->voiture($n,$p,$prix,$ds,$de,$admin,$id);
            ?>
            <div class="alert alert-success" role="alert">
 le client a ete ajouter
</div><?php

        }

    }







?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>ajouter un client </title>
</head>
<body>



<div class="container mt-5">
    <form action="" method="post">
        <div class="mb-3">
            <input type="text" name="nomvoiture" class="form-control" placeholder="Nom de voiture">
        </div>
        <div class="mb-3">
            <input type="text" name="nomclient" class="form-control" placeholder="Nom de client">
        </div>
        <div class="mb-3">
            <input type="number" name="prix" class="form-control" placeholder="Prix">
        </div>
        <div class="mb-3">
            <label for="datesortie" class="form-label">Date de sortie</label>
            <input type="date" name="datesortie" id="datesortie" class="form-control">
        </div>
        <div class="mb-3">
            <label for="dateentrer" class="form-label">Date d'entrée</label>
            <input type="date" name="dateentrer" id="dateentrer" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" name="ajouter" class="btn btn-success" value="Ajouter">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>