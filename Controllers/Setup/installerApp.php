<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

header('Content-Type: text/html; charset=UTF-8');
//require_once("../lib/global.inc.php");
$nomFichier = "config.php";

function testEcritureSetup() {
	$ok = 'no';
	if ($f = @fopen("test", "w")) {
		@fputs($f, '<'.'?php $ok = "yes"; ?'.'>');
		@fclose($f);
		include("test");
		$del = @unlink("test");
	}
	return $ok;
}


function beginHtml() {
?>

<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Expires" content="0" />

<title>Installation de Ak1</title>

<link rel="stylesheet" type="text/css" href="../../Views/Styles/css/index.css" />
<link rel="shortcut icon" type="image/x-icon" href="../../Views/Styles/img/rac.ico" />
<link rel="icon" type="image/ico" href="../../Views/Styles/img/rac.ico" />
</head>

<body>
	<div style="width: 30em; margin: auto;">
<?php
}

function endHtml() {
	?>
	</div>
</body>
</html>
<?php
}

unset($etape);
$etape = isset($_POST["etape"]) ? $_POST["etape"] : (isset($_GET["etape"]) ? $_GET["etape"] : NULL);
$ipm = $_SERVER['REMOTE_ADDR'];

if (file_exists($nomFichier)) {
	require_once("config.php");
	
	if (@($GLOBALS["mysqli"] = mysqli_connect("$dbHost",  "$dbUser",  "$dbPass"))) {
		if (@((bool)mysqli_query($GLOBALS["mysqli"], "USE `$dbDb`"))) {
			$call_test = @mysqli_query($GLOBALS["mysqli"], "SELECT * FROM t_machines WHERE ip='".$ipm."'");
			$test2 = @mysqli_num_rows($call_test);
			$call_test = @mysqli_query($GLOBALS["mysqli"], "SELECT * FROM t_agents");
			$test3 = @mysqli_num_rows($call_test);
			if (($test2 !=0) and ($test3 !=0)) {
				beginHtml();
				if ($etape == 5) {
					echo "<br /><h2 class='info1'>Dernière étape : C'est terminé !</h2>\n";
					echo "<p class='info1'>&nbsp;</p>\n";
					echo "<p class='info1'>Vous pouvez maintenant commencer à utiliser <b>Ak1</b> ...</p>\n";
					echo "<p class='info1'>Pour vous connecter la première fois en tant qu'administrateur, utilisez le login \"Admin\" et le mot de passe \"7572\". N'oubliez pas de changer ce mot de passe !</p>\n";
					echo "<br/><center class='info1'><a href = '../routeurLogin.php'>Se connecter à <b>Ak1</b></a></center>\n";
				} else {
					echo "<h2 class='info1'>Espace de travail interdit - <b>Ak1</b> est déjà installé.</h2>\n";
				}
				endHtml();
				die();
			}
		}
	}
}

if ($etape == 4) {

	beginHtml();

	echo "<br /><h2 class='info1'>Quatrième étape : Tables de la base</h2>\n";
	echo "<p>";

	$link = ($GLOBALS["mysqli"] = mysqli_connect($_POST['adresse_db'],  $_POST['login_db'],  $_POST['pass_db']));

	if ($_POST['choix_db'] == "new_plus") {
		$sel_db = $_POST['table_new'];
		$result=mysqli_query($GLOBALS["mysqli"], "CREATE DATABASE `$sel_db`;");
	}
	else {
		$sel_db = $_POST['choix_db'];
	}
	((bool)mysqli_query($GLOBALS["mysqli"], "USE `$sel_db`"));
	mysqli_query($GLOBALS["mysqli"], "SET NAMES UTF8");
	$queryBase = mysqli_query($GLOBALS["mysqli"], "ALTER DATABASE  CHARACTER SET utf8 COLLATE utf8_general_ci");
	

	$fd = fopen("sql/structure_bd.sql", "r");
	$result_ok = 'yes';
	while (!feof($fd)) {
		$query=" ";
		while ((mb_substr($query,-1)!=";") && (!feof($fd))) {
			$t_query = fgets($fd, 8000);
			if (mb_substr($t_query,0,3)!="-- ") $query.=$t_query;
			$query = trim($query); 
		}

		if ($query!="") {
			$reg = mysqli_query($GLOBALS["mysqli"], $query);
			if (!$reg) {
				echo "<p class='info1'><font color=red>ERROR</font> : '$query' : ";
				echo "<p class='info1'>Erreur retournée S= ".mysqli_error($GLOBALS["mysqli"])."</p>\n";
				$result_ok = 'no';
			}
		}
	}
	fclose($fd);

	if ($result_ok == 'yes') {
		$fd = fopen("sql/donnees_bd.sql", "r");
		while (!feof($fd)) {
			$query = fgets($fd, 5000);
			$query = trim($query);
			//=============================================
			// MODIF: boireaus 20080218
			//if (mb_substr($query,-1)==";") {
			if((mb_substr($query,-1)==";")&&(mb_substr($query,0,3)!="-- ")) {
			//=============================================
				$reg = mysqli_query($GLOBALS["mysqli"], $query);
				if (!$reg) {
					echo "<p class='info1'><font color=red>ERROR</font> : '$query'</p>\n";
					echo "<p class='info1'>Erreur retournée D= ".mysqli_error($GLOBALS["mysqli"])."</p>\n";
					$result_ok = 'no';
				}
			}
		}
		fclose($fd);
	}

	if ($result_ok == 'yes') {
		$ok = 'yes';
		if (file_exists($nomFichier)) @unlink($nomFichier);
		if (file_exists("connect.cfg")) @unlink("connect.cfg");
		$f = @fopen($nomFichier, "wb");
		if (!$f) {
			$ok = 'no';
		} else {
			$url = parse_url($_SERVER['REQUEST_URI']);

			$pluspath = mb_substr($url['path'], 0, -24);
			$conn = "<"."?php\n";
			$conn .= "# Les cinq lignes suivantes sont à modifier selon votre configuration\n";
			$conn .= "#\n";
			$conn .= "# Ligne suivante : le nom du serveur qui héberge votre base de données.\n";
			$conn .= "# Si c'est le même que celui qui héberge les scripts, mettre \"localhost\"\n";
			$conn .= "\$dbHost=\"".$_POST['adresse_db']."\";\n";
			$conn .= "#\n";
			$conn .= "# Ligne suivante : le nom de votre base mysql\n";
			$conn .= "\$dbDb=\"$sel_db\";\n";
			$conn .= "#\n";
			$conn .= "# Ligne suivante : le nom d'utilisateur principal de la base de données\n";
			$conn .= "\$dbUser=\"".$_POST['login_db']."\";\n";
			$conn .= "#\n";
			$conn .= "# Ligne suivante : le mot de passe de l'utilisateur ci-dessus\n";
			$conn .= "\$dbPass=\"".$_POST['pass_db']."\";\n";
			$conn .= "#\n";
			$conn .= "# Chemin relatif vers Ak1\n";
			$conn .= "\$plusPath=\"$pluspath\";\n";
			$conn .= "#\n";
			$conn .= "?".">";

			@fputs($f, $conn);
			if (!@fclose($f)) $ok='no';
		}


		if ($ok == 'yes') {
			echo "<B class='info1'>La structure de votre base de données est installée.</B>\n<p class='info1'>Vous pouvez passer à l'étape suivante.</p>\n";
			echo "<FORM ACTION='installerApp.php' METHOD='post'>\n";
			echo "<INPUT TYPE='hidden' NAME='etape' VALUE='5' />\n";
			echo "<DIV align='right'><INPUT TYPE='submit' CLASS='fondl' NAME='Valider' VALUE='Suivant >>' /></div>\n";
			echo "</FORM>\n";
		}
	}

	if (($result_ok != 'yes') || ($ok != 'yes')) {
		echo "<p class='info1'><strong>L'opération a échoué.</strong> Retournez à la page précédente, sélectionnez une autre base ou créez-en une nouvelle. Vérifiez les informations fournies par votre hébergeur.</p>\n";
	}

	endHtml();

}

else if ($etape == 3) {

	beginHtml();

	echo "<h1 class='info1'>Troisième étape : Choix de la BD</h1>\n";
	echo "<p>&nbsp;</p>\n";

	echo "<form action='installerApp.php' method='post'>\n";
	echo "<p><input type='hidden' name='etape' value='4' />\n";
	echo "<input type='hidden' name='adresse_db'  value=\"".$_POST['adresse_db']."\" size='40' />\n";
	echo "<input type='hidden' name='login_db' value=\"".$_POST['login_db']."\" />\n";
	echo "<input type='hidden' name='pass_db' value=\"".$_POST['pass_db']."\" /></p>\n";

	$link = @($GLOBALS["mysqli"] = mysqli_connect($_POST['adresse_db'], $_POST['login_db'], $_POST['pass_db']));
	$result = @(($___mysqli_tmp = mysqli_query($GLOBALS["mysqli"], "SHOW DATABASES")) ? $___mysqli_tmp : false);

	echo "<fieldset class='info1'><label><strong>Choisissez votre base :</strong><br /></label>\n";
	$checked = false;
	if ($result AND (($n = @mysqli_num_rows($result)) > 0)) {
		echo "<p class='info1'><strong>Le serveur contient plusieurs bases de données.<br />Sélectionnez celle dans laquelle vous voulez implanter Ak1</strong></p>\n";
		echo "<ul>\n";
		$bases = "";
		for ($i = 0; $i < $n; $i++) {
			$table_nom = ((mysqli_data_seek($result,  $i) && (($___mysqli_tmp = mysqli_fetch_row($result)) !== NULL)) ? array_shift($___mysqli_tmp) : false);
			//$base = "<input name=\"choix_db\" value=\"".$table_nom."\" type='radio' id='tab$i'";
			//$base_fin = " /><label for='tab$i'>".$table_nom."</label><br />\n";
			$base = "<li style='list-style-type:none;'><input name=\"choix_db\" value=\"".$table_nom."\" type='radio' id='tab$i'";
			$base_fin = " /><label for='tab$i'>".$table_nom."</label></li>\n";
			if ($table_nom == $_POST['login_db']) {
				$bases = "$base checked='checked'$base_fin".$bases;
				$checked = true;
			}
			else {
				$bases .= "$base$base_fin\n";
			}
		}
		echo $bases."</ul>\n";
		echo "<p class='info1'>ou... </p>";
	}
	else {
		echo "<strong>Le programme d'installation n'a pas pu lire les noms des bases de données installées.</strong>Soit aucune base n'est disponible, soit la fonction permettant de lister les bases a été désactivée pour des raisons de sécurité.</p>\n";
		if ($_POST['login_db']) {
			echo "<p class='info1'>Dans la seconde alternative, il est probable qu'une base portant votre nom de connexion soit utilisable :<p>\n";
			echo "<ul>\n";
			echo "<input name=\"choix_db\" value=\"".$_POST['login_db']."\" type='radio' id='stand' CHECKED />\n";
			echo "<label for='stand'>".$_POST['login_db']."</label><br />\n";
			echo "</ul>\n";
			echo "<p>ou... </p>";
			$checked = true;
		}
	}
	echo "<INPUT NAME=\"choix_db\" VALUE=\"new_plus\" TYPE=Radio id='nou'";
	if (!$checked) echo " CHECKED";
	echo " /> <label for='nou'>Créer une nouvelle base de données :</label> ";
	echo "<INPUT TYPE='text' NAME='table_new' CLASS='fondo' VALUE=\"Ak1bd\" SIZE='20' /></fieldset>\n\n";
	echo "<p class='info1'><b>Attention</b> : lors de la prochaine étape :</p>\n";
	echo "<ul>\n";
	if (file_exists($nomFichier)) echo "<li class='info1'>Le fichier \"".$nomFichier."\" sera actualisé avec les données que vous avez fourni,</li>\n";
	echo "<LI class='info1'>les tables Ak1 seront créées dans la base sélectionnée. Si celle-ci contient déjà des tables Ak1, ces tables, ainsi que les données qu'elles contiennent, seront supprimées et remplacées par une nouvelle structure.</LI>\n</ul>\n";

	echo "<div style='text-align:right'><input type='submit' class='fondl' name='Valider' value='Suivant >>' /></div>\n";


	echo "</form>\n";

	endHtml();

}

else if ($etape == 2) {
	beginHtml();

	echo "<br /><h2 class='info1'>Deuxième étape : Test Base de données</h2>\n";

	echo "<!--";
	$link = ($GLOBALS["mysqli"] = mysqli_connect($_POST['adresse_db'], $_POST['login_db'], $_POST['pass_db']));
	$db_connect = ((is_object($GLOBALS["mysqli"])) ? mysqli_errno($GLOBALS["mysqli"]) : (($___mysqli_res = mysqli_connect_errno()) ? $___mysqli_res : false));
	echo "-->\n";

	//echo "<p>\n";

	if (($db_connect=="0") && $link){
		echo "<B class='info1'>La connexion a réussi.</B><p class='info1'> Vous pouvez passer à l'étape suivante.</p>\n";

		echo "<form action='installerApp.php' method='post'>\n";
		echo "<p><input type='hidden' name='etape' value='3' />\n";
		echo "<input type='hidden' name='adresse_db'  value=\"".$_POST['adresse_db']."\" size='40' />\n";
		echo "<input type='hidden' name='login_db' value=\"".$_POST['login_db']."\" />\n";
		echo "<input type='hidden' name='pass_db' value=\"".$_POST['pass_db']."\" /></p>\n";

		echo "<div style='text-align:right'><p><input type='submit' class='fondl' name='Valider' value='Suivant >>' /></p></div>\n";

		echo "</form>\n";
	}
	else {
		echo "<B>La connexion au serveur de base de données a échoué.</B>\n";
		echo "<p>Revenez à la page précédente, et vérifiez les informations que vous avez fournies.</p>\n";
		echo mysqli_error($GLOBALS["mysqli"]);
	}

	endHtml();

}
else if ($etape == 1) {
	beginHtml();

	echo "<br />\n<h2 class='info1'>Première étape : Serveur de base de données</h2>\n";

	echo "<P class='info1'>Vous devez avoir en votre possession les codes de connexion au serveur. Si ce n'est pas le cas, contactez votre hébergeur ou bien l'administrateur technique du serveur sur lequel vous voulez implanter <b>Ak1</b>.</p>\n";

	unset($adresse_db);
	$adresse_db = isset($_POST["adresse_db"]) ? $_POST["adresse_db"] : 'localhost';
	$login_db = '';
	$pass_db = '';

	echo "<FORM ACTION='installerApp.php' METHOD='post'>\n";
	echo "<INPUT TYPE='hidden' NAME='etape' VALUE='2' />\n";
	echo "<fieldset class='info1'><label><B>Adresse de la base de donnée</B><br /></label>\n";
	echo "(Souvent cette adresse correspond à celle de votre Serveur BD, parfois elle correspond à la mention &laquo;localhost&raquo;.)<br><br>\n";
	echo "<INPUT  TYPE='text' NAME='adresse_db' class='info1' VALUE=\"$adresse_db\" SIZE='40' /></fieldset><br />\n";
        
    echo "<fieldset class='info1'><label><B>L'identifiant de connexion</B><br /></label>\n";
    echo "<INPUT TYPE='text' NAME='login_db' class='info1'' VALUE=\"$login_db\" SIZE='40' /></fieldset><br />\n";

	echo "<fieldset style='margin:.5em' class='info1'><label><strong>Le mot de passe de connexion</strong><br /></label>\n";
	echo "<input type='password' name='pass_db' class='info1' value=\"$pass_db\" size='40' /></fieldset>\n";

	echo "<div style='text-align:right'><p><input type='submit' name='Valider' value='Suivant >>' /></p></div>\n";
	echo "</form>\n";

	endHtml();

} else if (!$etape) {
	$affiche_etape0 = 'no';
	$file_existe = 'no';
	if (file_exists($nomFichier)) {
		$affiche_etape0 = 'yes';
		$file_existe = 'yes';
	}
	// on test la possibilité d'écrire dans le répertoire
	$test_write = testEcritureSetup();
	if ($test_write == 'no') $affiche_etape0 = 'yes';

	if ($affiche_etape0 == 'yes') {
		beginHtml();
		echo "<h1 class='gepi'>Installation de la base de données</h1>\n";
		echo "<form action='installerApp.php' method='post'>\n";
		if ($test_write == 'no') {
			echo "<h3 class='gepi'>Problème de droits d'accès :</h3>\n";
			echo "<p>Le répertoire \"/Setup\" n'est pas accessible en écriture.</p>\n";
			echo "<P>Utilisez votre client FTP afin de régler ce problème ou bien contactez l'administrateur technique. Une fois cette manipulation effectuée, vous pourrez continuer en cliquant sur le bouton en bas de la page.</p>\n";
			echo "<INPUT TYPE='hidden' NAME='etape' VALUE='' />\n";
		} else {
			echo "<input type='hidden' name='etape' value='1' /></p>\n";
		}
		if ($file_existe == 'yes') {
			echo "<h3 class='info1'>Présence d'un fichier ".$nomFichier." :</h3>\n";
			echo "<p>Un fichier nommé <b>\"config.php\"</b> est actuellement présent dans le répertoire \"/Setup\".
			C'est peut-être la trace d'une ancienne installation. Par ailleurs, ce fichier contient peut-être les informations de connexion à la base de données que vous souhaitez conserver.
			<br /><b>Attention : ce fichier et ce qu'il contient sera supprimé lors de cette nouvelle installation</b>.</p>\n";
		}


		echo "<p><input type='submit' class='fondl' Value = 'Continuer' name='Continuer' /></p>\n";
		echo "</form>\n";
		endHtml();
	} else {
		header("Location: ./installerApp.php?etape=1");
	}
}
?>
