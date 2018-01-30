<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-indigo.min.css">
<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>

        <title>Login</title>
        <meta charset="utf-8" />
		<style>

img {
    /* Set rules to fill background */
  min-height: 10%;
  min-width: 1024px;

  /* Set up proportionate scaling */
  width: 100%;
  height: auto;

  /* Set up positioning */
  position: fixed;
  top: 0;
  left: 0;
}

#header{
	width: 100%;
}

.btn-primary,
.btn-primary:hover,
.btn-primary:active,
.btn-primary:visited,
.btn-primary:focus {
    background-color: white;
    font-weight: bold;
    border-color: #bf9473;
    color: #bf9473
}

.input-group-addon{
    background-color:#4a392c ;
    border-color: #bf9473;
    font-weight: bold;
    color: white;
}
.form-control{
    color: #bf9473 ;
    border-color: #bf9473;
}


</style>



    </head>
    <body>
    
    <div id="header">
             <img src="ressources/logo.png" alt="starting" style="width: 100%;" />
    </div>


<!--
<div>
<div style= "position: absolute;
top: 300px; left: 170px; z-index=40 ; "> 
		<form method="post" action="/login/login.php">
			<p>
                
				<input type="text" placeholder="Nom" name="name" /> <br />
				<input type="password" placeholder="Mot de passe" name="password" /> <br />

				<input type="submit" value = "Valider" />
				<br/>
				<br/>
			</p>

		</form>
        </div>
        </div> -->
        <div style= "position: absolute;
top: 300px; left: 120px; z-index=40 ; ">   

        <form class="form-horizontal" method="post" action="./login/login.php" >
        <div class="form-group">
        <label for="name" class="control-label col-xs-5"></label> 
        <div class="col-xs-7">
          <div class="input-group">
            <div class="input-group-addon">Nom d'utilisateur</div> 
            <input id="name" name="name" placeholder="Nom" type="text" required="required" class="form-control">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="password" class="control-label col-xs-5"></label> 
        <div class="col-xs-7">
          <div class="input-group">
            <div class="input-group-addon">Mot de passe</div> 
            <input id="password" name="password" placeholder="Mot de passe " type="text" class="form-control">
          </div>
        </div>
      </div> 
      <div class="form-group row">
        <div style="position:absolute ; left: 230px ;   font-weight: bold; ">
          <button name="submit" type="submit" class="btn btn-primary">Valider</button>
        </div>
      </div>
</form>

</div>

    </body>
</html>
