<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
</head>
<body>

<!-- menu de nav -->

<?php include 'config/nav.php'; ?>
<br/>

<header>

<!-- formulaire de connexion -->

<div class="Div3">
    <h1>login</h1>
</div>

    <form method="post">
        <input class="text_area" type="email" name="lemail" id="lemail" placeholder="email" required>
        <br/>
        <input class="text_area" type="password" name="lpassword" id="lpassword" placeholder="mot de pass" required>
        <br/>
        <input class="button_under" type="submit" name="formlogin" id="formlogin" value="login">
    </form>
    <?php include "config/login_method.php" ?>


    

<div class="Div3">
    <h1>Sign in</h1>
</div>

    <form method="post">
        <input class="text_area" type="text" name="pseudo" id="pseudo" placeholder="pseudo" required>
        <br/>
        <input class="text_area" type="email" name="email" id="email" placeholder="email" required>
        <br/>
        <input class="text_area" type="password" name="password" id="password" placeholder="mot de pass" required>
        <br/>
        <input class="text_area" type="password" name="cpassword" id="cpassword" placeholder="confirmer mot de pass" required>
        <br/>
        <input class="button_under" type="submit" name="formsend" id="formsend" value="signin">
    </form>
    <?php include "config/register_method.php" ?> 

      

</header>


</body>
</html>