<link rel="stylesheet" type="text/css" href="navigationstyle.css"/>
<script src="/events_app/bootstrap/js/jquery.min.js"></script>
 <link rel="stylesheet" href="/events_app/bootstrap/css/bootstrap.min.css">
 <script src="/events_app/bootstrap/js/bootstrap.min.js"></script>
<?php include("../../navpage.php");?>     
<div class="container">
 <div class="row">
  <div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
      <div class="panel-heading">Se connecter</div>
      <div class="panel-body">
       <form class="form-horizontal" role="form" method="POST" action="/events_app/auth/scripts/login.script.php">
          <div class="form-group">
            <label for="email" class="col-md-4 control-label">Adrese E-mail</label>
            <div class="col-md-6">
             <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
            </div>
          </div>
          <div class="form-group">
            <label for="password" class="col-md-4 control-label">Mot de Pass</label>
            <div class="col-md-6">
             <input id="password" type="password" class="form-control" name="password" required>
            </div>
          </div>
          <div class="form-group">
           <div class="col-md-6 col-md-offset-4">
             <div class="checkbox">
              <label>
              <input type="checkbox" name="remember"> Reppelez moi
              </label>
             </div>
           </div>
          </div>
          <div class="form-group">
           <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Login</button>
            <a class="btn btn-link" href="">Mot de Pass Oublié?</a>
           </div>
          </div>
       </form>
      </div>
    </div>
   </div>
  </div>
</div>
