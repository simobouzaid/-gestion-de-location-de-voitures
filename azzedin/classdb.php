<?php
class db
{
    private $pdo;

    public function db($email)
    {
        $sqltate = $this->pdo->prepare('SELECT*FROM user where email=?');
        $sql = $sqltate->execute([$email]);

        if ($sqltate->rowCount() >= 1 && $sql) {
            $user = $sqltate->fetch(PDO::FETCH_ASSOC);

            return $user['id'];
        } else {
            return null;
        }
    }


    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    public function inscription($prenom, $nom, $email, $password)
    {


        $sqltate = $this->pdo->prepare('INSERT INTO user (prenom,nom,email,password) value(?, ?, ?, ?)');
        $sqltate->execute([$prenom, $nom, $email, $password]);

    }



    public function connexion($email, $password)
    {
        $sqltate = $this->pdo->prepare('SELECT*FROM user where email=? and password=? ');
        $sql = $sqltate->execute([$email, $password]);

        if ($sqltate->rowCount() >= 1 && $sql) {
            $user = $sqltate->fetch(PDO::FETCH_ASSOC);
            setcookie("nom",$user['prenom'],time()+(86400*365));
            setcookie("id",$user['id'],time()+(86400*365));


            return $user['id'];

        } else {
            return null;
        }
    }
    public function voiture($nomvoiture,$nomclient,$prix,$datesortie,$dateentrer,$admin,$id_user)
    {


        $sqltate = $this->pdo->prepare('INSERT INTO client (nomvoiture,nomclient,prix,datesortie,dateentrer,admin,id_user) value(?, ?, ?, ?,?,?,?)');
        $sqltate->execute([$nomvoiture,$nomclient,$prix,$datesortie,$dateentrer,$admin,$id_user]);

    }
    public function afficher($id,$a)
    {
        $a=1;
        $admin=$a;



        $sqltate = $this->pdo->prepare('SELECT*FROM client where id_user=? and admin=?');
        $sqltate->execute([$id,$admin]);
        $client=$sqltate->fetchAll(PDO::FETCH_ASSOC);
        return $client;

    }
    public function update($id,$id_user)
    {
      



        $sqltate = $this->pdo->prepare('UPDATE client SET admin=0 where id=? and id_user=? ');
        $sqltate->execute([$id,$id_user]);
        
        }
        public function archif($id_user,$admin)
        {
         $admin=0;
    
    
    
            $sqltate = $this->pdo->prepare('SELECT*FROM client where id_user=? and admin=?');
            $sqltate->execute([$id_user,$admin]);
            $client=$sqltate->fetchAll(PDO::FETCH_ASSOC);
            return $client;
    
        }
        public function modifier($id_user,$id)
        {
         
    
    
    
            $sqltate = $this->pdo->prepare('SELECT*FROM client where id_user=? and id=?');
            $sqltate->execute([$id_user,$id]);
            $client=$sqltate->fetchAll(PDO::FETCH_ASSOC);
            return $client;
    
        }
        public function updateclient($nv,$nc,$prix,$ds,$de,$id,$id_user)
        {
          
    
    
    
            $sqltate = $this->pdo->prepare('UPDATE client SET nomvoiture=? ,nomclient=?,prix=?,datesortie=?,dateentrer=? where id=? and id_user=? ');
            $sqltate->execute([$nv,$nc,$prix,$ds,$de,$id,$id_user]);
            
            }






    
}
