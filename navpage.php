<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/events_app/navigation.php">SportYou</a>
    </div>
    <ul class="nav navbar-nav">
     <li class="active"><a href="#">ACCUEIL</a></li>

     <li><a href="#">SPORTS</a></li>
     <li><a href="#">PRÉSENTATIONS</a></li>
     <li class="dropdown">
       <a class="dropdown-toggle" data-toggle="dropdown" href="#">CONTACT
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Gmail</a></li>
          <li><a href="#">Twitter</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php 
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
      if(!isset($_SESSION['email'])){?>
        <li><a href="/events_app/?p=register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="/events_app/?p=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <?php }else {?>
        <li><a href="/events_app/?p=competitions"><span class=""></span><?=$_SESSION['email']?></a></li>
        <li><a href="/events_app/?p=logout">Log out<span class="glyphicon glyphicon-log-out" style="padding-left: 6px;"></span></a></li>
      <?php }?>

    </ul>
  </div>
</nav>                 