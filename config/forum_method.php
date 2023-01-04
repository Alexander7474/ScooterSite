
<!-- affichage des sujets -------------------------------------------------------------------------------------------------------------------------------------------------------->

<!-- si un sujets est selectionné dans l'id sur get -->
<?php // afficher le sujet
if (isset($_GET['id_sujet']) && $_GET['id_sujet'] > 1)
{
    $c = $db->prepare("SELECT id_demande FROM forum WHERE id_demande = :id_demande");
    $c->execute(['id_demande' => $_GET['id_sujet']]);
    $result = $c->rowCount();

    if($result == 0){
        header("location:forum.php");
    }
    else{
            
        // affichege de email personne + sa demande
        $q = $db->prepare("SELECT * FROM forum WHERE id_demande = :id_demande");
        $q->execute(['id_demande' => $_GET['id_sujet']]);
        $result = $q->fetch();
        echo '<h3 style="color:red">Ouvert par ' . $result['email'] . ": " . $result['sujet'] . "</h3>"; // affichage du sujet en balise h2
        echo '<p class="forum_user_affiche">De : ' . $result['email'] . "<br> Le : " . $result['date'] . "</p>";
        echo '<p class="forum_chat_affiche">' . $result['demande'] . "</p> <br>";

        // affichage des reponses
        $q = $db->prepare("SELECT * FROM forum_rp WHERE id_dm = :id_dm");
        $q->execute(['id_dm' => $_GET['id_sujet']]);
        while ($result_rp = $q->fetch())
        {
            echo '<p class="forum_user_affiche">De : ' . $result_rp['email_rp'] . "<br> Le : " . $result_rp['date'] . "</p>";
            echo '<p class="forum_chat_affiche">' . $result_rp['reponse'] . "</p> <br>";
        }

        // rafraichir
        header("refresh: 10");

        // formulaire pour repondre a la personne si connecté

        if (isset($_SESSION['email'])){
        ?>
        <form method="post">
            <TEXTAREA class="demande" sizeof="50" type="text" name="rp" id="rp" placeholder="Réponse(255 caractères maximum)" required></TEXTAREA>
            <br/>
            <input class="button_under" type="submit" name="reponse" id="reponse" value="Répondre">
            <br/>
        </form>
        <?php
        }
        else{
            ?><p></p><?php
            echo ' <br> soyez connecté pour repondre a demande';
            ?> 
            <a class="button_little" href="register.php"><p>Se connecter</p></a>
            <?php

        }
    }



    // envoie des reponse du formulaire dans la base de donné

    if (isset($_POST['reponse'])){

        extract($_POST);

        if (!empty($rp) && isset($_SESSION['email'])){

            $q = $db->prepare("INSERT INTO forum_rp(id_dm,reponse,email_rp) VALUE(:id_dm,:reponse,:email_rp)");
            $q->execute([
                'id_dm' => $result['id_demande'],
                'reponse' => $rp,
                'email_rp' => $_SESSION['email']
            ]);  
            header('Location:forum.php?id_sujet=' . $_GET['id_sujet']);


        }
        else{
            echo 'les champs ne sont pas tous tous remplie';
        }
    }

} // si aucun sujet est selectionne dans id get
else // selection des demande
{
    $q = $db->prepare("SELECT * FROM forum WHERE 1");
    $q->execute();
    $result = $q->fetch();
    ?>
    <div class="Div3">
        <p>Sujet de discussion</p>
    </div> 
    <?php
    while ($forum = $q->fetch()) {
    ?><a href="<?php echo "/../forum.php?id_sujet=" . $forum['id_demande']; ?>"> <?php
    echo "Sujet : " . $forum['sujet']. "<br>";
    ?></a> <?php
    } 
    
// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
}

?>

<!-- envoie de demande/sujet dans la base de donné-->

<?php

if(isset($_POST['formsend'])){

    extract($_POST);
    

    if(!empty($demande) && !empty($sujet)){

            $q = $db->prepare("INSERT INTO forum(sujet,demande,email) VALUE(:sujet,:demande,:email)");
            $q->execute([
                'sujet' => $sujet,
                'demande' => $demande,
                'email' => $_SESSION['email']
            ]); 
            echo "demande envoyer";
            header('Location:/../forum.php');  

    }else {
        echo "les champs ne sont pas tous rempli";
    }
    
    
}

?>
