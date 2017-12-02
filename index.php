<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <meta charset="utf-8" />
		<style>
div {
    width: 100px;
    height: 100px;

    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;

    margin: auto;
}
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
</style>



    </head>
    <body>
      <div id="wrapperHeader">
    <div id="header">
             <img src="ressources/logo.png" alt="starting" style="width: 100%;" />
    </div>
</div>

	 <div align="justify">
		 <h2>Login</h2>
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
    </body>
</html>
