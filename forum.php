<?php include "profil.php"; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes/Questions</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>

<!-- menu de nav -->

<?php include 'config/nav.php'; ?>
<br/>

<header>

<!-- affichage des demandes dans l'ordre de l'id -->

<div class="Div2">
    <h1>Forum</h1>
</div>

<?php include "config/forum_method.php" ?>
<br/>

<!-- ouverteure d un nouveau sujet de discussion -->

    <div class="Div3">
        <p>Nouveau sujet</p>
    </div>    
    <?php 
    if(isset($_SESSION['email'])){
    ?>
    <form method="post">
        <input class="text_area" class="demande" type="text" name="sujet" id="sujet" placeholder="Sujet" required>
        <br/>
        <TEXTAREA class="demande" sizeof="50" type="text" name="demande" id="demande" placeholder="Demande" required></TEXTAREA>
        <br/>
        <input class="button_under" type="submit" name="formsend" id="formsend" value="Ouvrir">
        <br/>
        <br/>
        <br/>
    </form>
    <?php 
    }
    else
    {
        echo "soyez connecté pour envoyez des demandes <br>";
        ?> 
        <a class="button_little" href="register.php"><p>Se connecter</p></a>
        <?php
    }
    ?>

</header>

</body>
</html>