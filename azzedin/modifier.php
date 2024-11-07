<?php
include 'navbar.php';
include 'db/db.php';
include 'classdb.php';
$db= new db($pdo);
$id=$_GET['id']; 

$us=$db->modifier($_COOKIE['id'],$id);
$id_user=$_COOKIE['id'];

foreach($us as $u){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>modifier un client </title>
</head>
<body>
<div class="container mt-5">
    <form action="" method="post">
        <div class="mb-3">
        <input type="text" name="nomvoiture" class="form-control" placeholder="Nom de voiture" value="<?php echo $u['nomvoiture']; ?>">
        </div>
        <div class="mb-3">
            <input type="text" name="nomclient" class="form-control" placeholder="Nom de client" value="<?php echo $u['nomclient']?>">
        </div>
        <div class="mb-3">
            <input type="number" name="prix" class="form-control" placeholder="Prix" value="<?php echo $u['prix'] ?>">
        </div>
        <div class="mb-3">
            <label for="datesortie" class="form-label">Date de sortie</label>
            <input type="date" name="datesortie" id="datesortie" class="form-control" value="<?php echo $u['datesortie']?>">
        </div>
        <div class="mb-3">
            <label for="dateentrer" class="form-label">Date d'entrée</label>
            <input type="date" name="dateentrer" id="dateentrer" class="form-control" value="<?php echo $u['dateentrer'] ?>">
        </div>
        <div class="mb-3">
            <input type="submit" name="modifier" class="btn btn-success" value="modifier">
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php }

if(isset($_POST['modifier'])){
   



$nv=$_POST['nomvoiture'];
$nc=$_POST['nomclient'];
$prix=$_POST['prix'];
$ds=$_POST['datesortie'];
$de=$_POST['dateentrer'];

$db->updateclient($nv,$nc,$prix ,$ds,$de,$id,$id_user);
header("location: index.php");


    
}
?>
