<!DOCTYPE html>
<html>
    <head>
		
		<link rel="stylesheet" href="./ressources/bootstrap/css/bootstrap.min.css">
		<script src="./ressources/jquery-3.2.1.min.js"></script>
		<script src="./ressources/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="./ressources/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="./ressources/MDL/material.min.css">
		<script defer src="./ressources/MDL/material.min.js"></script>


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
            <input id="password" name="password" placeholder="Mot de passe " type="password" class="form-control">
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
