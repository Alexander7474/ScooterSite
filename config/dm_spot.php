<?php

if(isset($_POST['spot_dm'])){

    extract($_POST);

    if(!empty($name_sp) && !empty($adresse)){

        $q = $db->prepare("INSERT INTO spot_add(pseudo_user,email_user,spot,adresse) VALUE(:pseudo_user,:email_user,:spot,:adresse)");
        $q->execute([
            'pseudo_user' => $_SESSION['pseudo'],
            'email_user' => $_SESSION['email'],
            'spot' => $name_sp,
            'adresse' => $adresse
        ]);
        header('Location:Spot_map.php');

    }
    else{
        echo "remplir les champs";
    }
}