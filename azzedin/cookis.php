<?php

if (isset($_COOKIE["pass"])) {
    setcookie("pass", "", time() - (3600*365*24), "/");
    if (isset($_COOKIE["cxn"])){
        setcookie("cxn", "", time() - (3600*365*24), "/");
        if(isset($_COOKIE["nom"])){

            setcookie("nom", "", time() - (3600*365*24), "/");
        }
        if(isset($_COOKIE["id"])){

            setcookie("id", "", time() - (3600*365*24), "/");
            header("location:connexion.php");
        }



    }

} else{
    echo"non";
}



?>