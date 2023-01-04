
<nav class="navigation">
  <ul class="container">
    <li><a href='/../index.php'>Home</a></li>
    <li class='dropdown'>
      <a href='#'>O.U.T <i class="fa fa-angle-down"></i></a>
      <div class='mega-menu'>
      	<div class="container">
          <div class="item">
              <h3>Home Page</h3>
              <ul>
                <li><a href='/../out-park.php'>O.U.T park</a></li>
                <li><a href='/../out-street.php'>O.U.T street</a></li>
                <li><a href='/../typeTricks.php'>Type de tricks</a></li>
              </ul>
        </div><!-- /.container -->
      </div><!-- /.mega-menu -->
    </li><!-- /.dropdown -->
    <li><a href='/../forum.php'>Forum</a></li>
    <li><a href='/../Spot_map.php'>Map</a></li>
    <li><a href='/../register.php'>Connexion / S'inscrire</a></li>
    <li><a href=<?php 
    if(isset($_SESSION['id']))
    {
      echo "profil.php?id=" . $_SESSION['id'];
    }
    else{
      echo "profil.php?id=1";
    }
    ?>>Profil</a></li>
  </ul><!-- .container -->
</nav>