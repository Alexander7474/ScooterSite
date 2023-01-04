<?php

if(isset($_POST['formsend'])){

    extract($_POST);

    if(!empty($password) && !empty($cpassword) && !empty($email) && !empty($pseudo)){

        if($password == $cpassword){

            
            $hashpass = sha1($password);

            include "database.php";
            global $db; 

            $c = $db->prepare("SELECT email FROM users WHERE email = :email");
            $c->execute(['email' => $email]);
            $result = $c->rowCount();

            if($result == 0){

                $c = $db->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
                $c->execute(['pseudo' => $pseudo]);
                $result = $c->rowCount();

                if($result == 0){

                    $q = $db->prepare("INSERT INTO users(email,password,pseudo) VALUE(:email,:password,:pseudo)");
                    $q->execute([
                        'pseudo' => $pseudo,
                        'email' => $email,
                        'password' => $hashpass
                    ]);
                    header('Location:index.php');  
                    echo "le compte a été creer";

                }else {
                    echo "erreur pseudo deja existant";
                }

            }else {
                echo "erreur email deja existant";
            }

                    

        }else {
            echo "les mot de pass ne sont pas les meme";
        }

    }else {
        echo "les champs ne sont pas tous rempli";
    }
    
}

?>