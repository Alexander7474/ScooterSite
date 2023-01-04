<?php 
session_start();

    if(isset($_POST['formlogin'])) {

        extract($_POST);

        if(!empty($lemail) && !empty($lpassword)) {

            include "database.php";
            global $db; 

            $q = $db->prepare("SELECT * FROM users WHERE email = :email");
            $q->execute(['email' => $lemail]);
            $result = $q->fetch();
            
            if($result == true){
                if(sha1($lpassword) == $result['password']){
                    $_SESSION['id'] = $result['id'];
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['pseudo'] = $result['pseudo'];
                    $_SESSION['date'] = $result['date'];
                    header("location: profil.php?id=" . $_SESSION['id']);
                }
                else{
                    echo "Mauvais mot de pass !";
                }
            }            
            else {
                echo "compte innexistant";
            }
        }
        else {
            echo "completer les champs";
        }

    }

    

?>