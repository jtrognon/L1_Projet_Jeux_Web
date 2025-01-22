<?php
    $debeug=False; 

    $result = mysqli_query($conn , "select * from connexion");

    /*---------------------------------------
    CRUD: Profil
    ---------------------------------------*/

    /*Permet de modifier le nom de l'utilisateur*/ 
    function update_name_perso($conn,$login,$id){
        $sql="UPDATE `connexion` SET `login`='$login' WHERE `id`=$id" ; 
        global $debeug ;
        if($debeug) echo $sql ; 
        $res=mysqli_query($conn, $sql) ; 
        return $res ; 
    }

    /*Permet de modifier le mot de passe de l'utilisateur*/ 
    function update_passwd_perso($conn,$passwd,$id){
        $sql="UPDATE `connexion` SET `passwd`='$passwd' WHERE `id`=$id" ; 
        global $debeug ;
        if($debeug) echo $sql ; 
        $res=mysqli_query($conn, $sql) ; 
        return $res ; 
    }



?>