<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
	<head>
		<meta charset="utf-8" />
		<meta name="description" content="Latta & Co. - Ak1: MENU GENERAL" />
		<title>Latta & Co. - Ak1: <?= $titre ?></title>
				
		<link rel="stylesheet" href="Views/Styles/css/menu.css" />
		<link rel="shortcut icon" type="image/x-icon" href="Views/Styles/img/sys/rac.ico" />
		<link rel="icon" type="image/ico" href="Views/Styles/img/sys/rac.ico" />
		
		<!-- Vérification de session --> 
			<?php include('Controllers/compteUser.php'); ?>
			
		<!-- fonction javascript -->
			<script src="Controllers/functionsFrontend.js"></script>

	</head> 
		
	<body>
		<div id="page">
			<header>
				<div id="header">
					<h1>Ak1: MAIN DIVINE</h1>
					<p>Bienvenu(e), vous &ecirc;tes&nbsp;<?= $_SESSION['nom'] ?>,&nbsp;<?= $_SESSION['lib_n'] ?>.
						<br><script type="text/javascript">setDateLettre();</script>&nbsp;|&nbsp;
						<strong id="Hre"><script type="text/javascript">setHeure();</script></strong>&nbsp;|&nbsp;
						<strong>
							<a class="a_lien" href="Controllers/RouterActions.php?act=Exit">Déconnecter</a>
						</strong>
					</p>
				</div>
			</header>

			<!-- Les à-cotés de la page -->
			<aside>
				<?php include('Models/Cnx.php'); ?>
				<?php 	$a=0;
					$sql = $pdo->prepare('SELECT `cd_tp_m`,`lb_tp_m` FROM `v_menu_ok` WHERE `login` = :logTxt group by `cd_tp_m`');
					$sql -> bindParam(':logTxt',$_SESSION['login']);
					$sql -> execute();
					$a   = $sql -> rowCount(); ?>
				
				<!-- Nav. principale de la page -> site -->
				<div class="sidebar">
					<nav class="dr-menu">
						<div class="dr-trigger">
							<span class="dr-icon dr-icon-menu"></span>
							<a class="dr-label">Menu G&eacute;n&eacute;ral</a>
						</div>
						<ul id="nav">
							<?php while($a!=0) { $res = $sql -> fetch(PDO::FETCH_ASSOC); $a--; ?>
							<li class="dir">&nbsp;<?= $res['lb_tp_m'] ?><!-- n1 -->
								<ul>
									<?php $sql1=$pdo->prepare('SELECT lb_me,lien_me FROM v_menu_ok WHERE login = "'.$_SESSION['login'].'" and cd_tp_m = "'.$res['cd_tp_m'].'" group by cd_me');
                		  			$sql1 -> execute();
            	    	  			$b = $sql1 -> rowCount();
									while($b!=0) { $res1 = $sql1 -> fetch(PDO::FETCH_ASSOC); $b--; ?>
									<li><a href="../<?= $res1['lien_me'] ?>"><?= $res1['lb_me'] ?></a></li><!-- n2 -->
									<?php } $sql1->closeCursor(); ?>
								</ul>
							</li>
							<?php } $sql->closeCursor(); ?>
						</ul>
					</nav>
				</div>
			</aside>
			<script src="Views/Styles/js/ytmenu.js"></script>

			<!-- Contenu des pages -->
			<article>
				<div id="content" align="center" >
					<?php if(isset($_SERVER['REQUEST_URI'])) { list($url,$act) = explode('?c=', $_SERVER['REQUEST_URI']); ?>
					
						<?php if(isset($act) && ($act == "1")) { ?>

                        	<span class="msg">... Ligne supprimée avec succès ...</span>

                    	<?php } elseif(isset($act) && ($act == "2")) { ?>

                        	<span class="msg">... Saisie enregistrée avec succès ...</span>

                    	<?php } elseif(isset($act) && ($act == "3")) { ?>

                        	<span class="msg">... Modification enregistrée avec succès ...</span>

                    	<?php } elseif(isset($act) && ($act == "4")) { ?>

                        	<span class="msg">... Erreur dans le traitement ...</span>

                    <?php } } ?>

					<?= $content ?>
				</div>
			</article>
		
			<!-- Pied-de-page de la page -->
			<footer>
				<div id="footer">
    				<p>Copyright &copy; <?= date('Y') ?> Latta & Co. pour MAIN DIVINE! Tous Droits R&eacute;serv&eacute;s<p>
				</div>
			</footer>
		</div>
	</body> 
</html>
