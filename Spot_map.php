<?php include "profil.php"; ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hasard tricks</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet"> 
    </head>
    <body>
    
<!-- menu de nav -->

<?php include 'config/nav.php'; ?>
<br/>

    <header>
        <!-- navigation -->
        <div class="Div1">
        <h3>Voici la map de tous les spots d'avignon</h3>
        </div>
        <iframe class="Carte1" src="https://www.google.com/maps/d/u/0/embed?mid=13ePtxk04jtG7cU9mXCfO11TokYFEOtLP" width="640" height="480"></iframe>
        <h3>Si tu connait des spots qui ne sont pas référencé envoie une demande d'ajout ici</h3>
        <?php
        if(isset($_SESSION['email'])){
        ?>
        <form method="post">
            <input class="text_area" class="demande" type="text" name="name_sp" id="name_sp" placeholder="Nom du spot" required>
            <br/>
            <TEXTAREA class="demande" sizeof="50" type="text" name="adresse" id="adresse" placeholder="Adresse" required></TEXTAREA>
            <br/>
            <input class="button_under" type="submit" name="spot_dm" id="spot_dm" value="Envoyer">
            <br/>
            <br/>
            <br/>
        </form>
        <?php
            include 'config/dm_spot.php';
        ?>
        <?php 
        }
        else
        {
            echo "soyez connecté pour envoyez des demandes d'ajout <br>";
            ?> 
            <a class="button_little" href="register.php"><p>Se connecter</p></a>
            <?php
        }

        if(isset($_SESSION['email']) && $_SESSION['email'] == 'alexandre.lanternier@outlook.fr'){
            
            echo 'tu est admin';
            // affichage de demande d ajout
            $q = $db->prepare("SELECT * FROM spot_add");
            $q->execute([]);
            while ($result_sp = $q->fetch())
            {
                echo "<p>De : " . $result_sp['pseudo_user'] . "/" . $result_sp['email_user'] . 
                "<br> Nom du spot : " . $result_sp['spot'] . 
                "<br> Adresse : " . $result_sp['adresse'] . 
                "<br> Le : " . $result_sp['date'];
            }
        
        }

        ?>
    </header>
    </body> 
</html>