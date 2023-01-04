<?php 
session_start();

include "config/database.php";
global $db; 

if(isset($_GET['id']) && $_GET['id'] > 0)
{

    $getid = intval($_GET['id']);
    $requser = $db->prepare('SELECT * FROM users WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasard tricks</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script src="js/recherche.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
</head>

<body>
    
    <!-- menu de nav -->

    <?php include 'config/nav.php'; ?>
    <br/>


    <header>

    <h1>profil</h1>
    </br>
    <?php 
    if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
    {
    ?>
    <!-- info compte -->

    

    <p>Pseudo : <?php echo $userinfo['pseudo']; ?></p>
    <p>Email : <?php echo $userinfo['email']; ?></p>
    
    <p style="color:red;">Changer le pseudo</p>

    <form method="post">
        <input class="text_area" type="text" name="chg_pseudo" id="chg_pseudo" placeholder="Nouveau pseudo" required>
        <br/>
        <input class="text_area" type="password" name="chg_ps_mdp" id="chg_ps_mdp" placeholder="Mot de pass" required>
        <br/>
        <input class="button_under" type="submit" name="change_pseudo" id="change_pseudo" value="Changer">
        <br/>
    </form>

    <?php include "config/changement_method.php"; ?>

    <p></p>
    <a class="button" href="config/deconnexion.php">Deconnexion</a>
    
    <?php
    }
    else{
        echo "pas de profil connecté !";
        ?> 
        <a class="button_little" href="register.php"><p>Se connecter</p></a>
        <?php
        if(isset($_SESSION['id']))
        {
             header("location:profil.php?id=" . $_SESSION['id']);
        }
    }
    
    ?>
    </header>

</body>
</html>

<?php
}

?>
