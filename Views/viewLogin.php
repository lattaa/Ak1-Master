<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Latta & Co. - Ak1: Authentification" />		
		<title>Latta & Co. - Ak1: Authentification</title>
		<link href="Views/Styles/css/auth.css" rel="stylesheet" type="text/css"/>
		<link rel="shortcut icon" type="image/x-icon" href="Views/Styles/img/sys/rac.ico" />
        <link rel="icon" type="image/ico" href="Views/Styles/img/sys/rac.ico" />
	</head>

	<body>
		<div class="wrapper">

			<div  class="latta-header-bar  centered">
				<div class="header content clearfix">
					<div class="logo logo-w" aria-label="Latta & Co."></div>
				</div>
			</div>
	
			<div class="main content clearfix">
	
				<div class="banner">
					<h1>Identifiez-vous avec vos paramètres.</h1>
					<h2 class="hidden-small">Connectez-vous pour accéder à Ak1.</h2>
				</div>

				<div class="main-content no-name">
		
					<div  class="card signin-card pre-shift no-name">
			
  						<div id="cc_iframe_parent"></div>
  						<div  class="circle-mask" style="">
							<canvas id="canvas" class="circle" width="96" height="96"></canvas>
						</div>
				
						<form data-validate="parsley" name="auth" method="post" action="" id="auth">
    
							<div class="form-panel first valid" id="auth_form">
		
								<div  class="slide-out ">
			
									<div class="input-wrapper focused">
				
										<div id="identifier-shown">
											<div>
												<label  class="hidden-label" for="Email">Login</label>
												<input id="Email" name="Email" type="email" value="" spellcheck="false" placeholder="Saisissez votre login" autofocus class="medField" required>
											</div>
											<br>
											<div>
												<label  class="hidden-label" for="Passwd">Mot de passe</label>
												<input  id="Passwd" name="Passwd" type="password" placeholder="Saisissez votre mot de passe" class="medField" required>
											</div>
										</div>
									</div>
								</div>
			
			<?php if(isset($_GET['erreur']) && ($_GET['erreur'] == "incorrect")) { $erreur=$_GET["erreur"]; ?>

				<span class="error-msg">Désolé, paramètres incorrects!</span>
			
			<?php  } elseif(isset($_GET['erreur']) && ($_GET['erreur'] == "aurevoir")) {  $erreur=$_GET["erreur"]; ?>
			
				<span class="error-msg">Vous êtes déconnectés... Aurevoir.</span>
				
			<?php  } else echo"<br>"; ?>
			
			<input id="signIn" name="signIn" class="rc-button rc-button-submit" type="submit" value="Connecter" onClick="envoyerAuth()">
			  <a class="need-help" href="#">J'ai oublié mes paramètres</a>
							</div>
						</form>
					</div>
				</div>
			</div>
	
<!-- PIED -->
				<div  class="latta-footer-bar">
					<div class="footer content clearfix">
						<ul id="footer-list">
							<li><a href="https://www.lattaco.tg" target="_blank">A propos de Ak1</a></li>
							<li><a href="https://" target="_blank">Règles de confidentialité</a></li>
							<li><a href="https://" target="_blank">Conditions d'utilisation</a></li>
							<li><a href="http://" target="_blank">Aide</a></li>
						</ul>
					</div>
				</div>
<!-- FIN PIED -->
			</div>
		</div>
	</body>
</html>