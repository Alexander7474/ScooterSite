
<?php

if(isset($_POST['change_pseudo'])){

    extract($_POST);

    if(!empty($chg_pseudo) && !empty($chg_ps_mdp)){

        $c = $db->prepare("SELECT pseudo FROM users WHERE pseudo = :pseudo");
        $c->execute(['pseudo' => $chg_pseudo]);
        $result = $c->rowCount();

        if($result == 0){

            $hashpass = sha1($chg_ps_mdp);

            $q = $db->prepare("SELECT * FROM users WHERE id = :id");
            $q->execute(['id' => $_GET['id']]);
            $result = $q->fetch();
            
            if($hashpass == $result['password']){

                $q = $db->prepare("UPDATE users SET pseudo = :pseudo WHERE id = :id");
                $q->execute([
                    'id' => $_GET['id'],
                    'pseudo' => $chg_pseudo
                ]);
                header("location: profil.php?id=" . $_SESSION['id']);
            }
            else{
                echo "Mauvais mot de pass";
            }
        }else{
            echo "Pseudo deja existant";
        }

    }
    else{
        echo "remplir les champs";
    }
}
