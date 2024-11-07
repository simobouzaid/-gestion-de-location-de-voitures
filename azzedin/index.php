<?php 
include 'navbar.php';

if (empty($_COOKIE["cxn"] && $_COOKIE['pass'])) {
  header("location:connexion.php");
}
$nom = $_COOKIE["nom"];
$id = $_COOKIE["id"];

include 'classdb.php';
include 'db/db.php';

$admin = 1;
$db = new db($pdo);
$client = $db->afficher($id, $admin);
if (isset($_POST['complet'])) {
  $id1 = $_POST['id'];
  $db->update($id1, $id);
  $n=$_POST['s']?>
        <div class="alert alert-success text-center" role="alert">
 <?php echo $n ?> a ete complet le service
</div>


<?php }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
  <title>location</title>

</head>
<h1 align="CENTER">BANJOUR:<?php echo "$nom"; ?></h1>
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

<body>


  <table class="table-bordered table-hover" border="2">
    <thead>
      <tr>
        <th scope="col">LE NOM DE VOITURE</th>
        <th scope="col">LE NOM DE CLIENT</th>
        <th scope="col">LE PRIX</th>
        <th scope="col">LE DATE DE SORTIRE</th>
        <th scope="col">LE DATE D'ENTRER</th>
        <th scope="col">LES PROCEDURE</th>
        <th scope="col">MODIFIER</th>
      </tr>
    </thead>
    <?php foreach ($client as $as) { ?>
      <tbody>
        <tr>

          <td scope="row"> <?php echo $as['nomvoiture']  ?> </td>
          <td><?php echo $as['nomclient'] ?> </td>
          <td><?php echo $as['prix'] ?> dh</td>
          <td><?php echo $as['datesortie'] ?> </td>
          <td><?php echo $as['dateentrer'] ?> </td>
          <td>
          <?php
$date1 = new DateTime($as['dateentrer']);
$date = new DateTime();
$date->format('Y-m-d'); 
if ($date1 <= $date) {
    $diff = $date1->diff($date);
    echo "retard: " . $diff->days . " jours";
?>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $as['id']; ?>">
        <input type="hidden" name="s" value="<?php echo $as['nomclient']; ?>">
        <input type="submit" value="Complet" name="complet" class="btn btn-primary">
    </form>
<?php
} else if($date1 > $date) {
    $diff = $date->diff($date1);
    echo "jour: " . ($diff->format('%a')+1) . " jours";
}
?>
<td><a href="modifier.php?id=<?php echo $as['id']; ?>" class="btn btn-success">modifier</a></td>

        </tr>
      </tbody>
    <?php } ?>
  </table>
</body>

</html>