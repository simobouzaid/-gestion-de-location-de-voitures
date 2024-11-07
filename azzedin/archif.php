<?php
include 'navbar.php';
include 'classdb.php';
include 'db/db.php';
$id_user= $_COOKIE["id"];
$admin=0;
$nom=$_COOKIE["nom"];
$db=new db($pdo);
$archif=$db->archif($id_user,$admin);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>archif</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <h1 align="center">BONJOURE:<?php echo "$nom"; ?></h1>
      <style>
       
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px 15px;
        }
        th {
            background-color: #f4b084;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<table border="3" class="table-bordered table-hover">
  <thead>
    <tr>
    <th >nomvoiture</th>
        <th scope="col">nomclient</th>
        <th scope="col">prix</th>
        <th scope="col">date sotie</th>
        <th scope="col">date entrer</th>
    </tr>
  </thead>
  <?php foreach($archif as $a){ ?>
  <tbody>
    <tr>
    
      <td><?php echo $a['nomvoiture'] ?></td>
      <td><?php echo $a['nomclient'] ?></td>
      <td><?php echo $a['prix'] ?>dh</td>
      <td><?php echo $a['datesortie'] ?></td>
      <td><?php echo $a['dateentrer'] ?></td>
      
    </tr>
   
  </tbody>
  <?php } ?>
</table>
    
</body>
</html>
