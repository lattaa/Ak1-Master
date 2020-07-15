/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*
* Toutes les fonctions JavaScript
*/

// Envoyer l'authentification
function envoyerAuth(auth)
{ document.auth.action="Controllers/RouterActions.php?act=User"; /* Lance de l'action à mener */ }

// Envoyer les modifications de zones
function mdZone(modZone)
{ document.modZone.action="Controllers/RouterActions.php?act=mdZone"; /* Lance de l'action à mener */ }

// Envoyer l'ajout zone
function ajZone(ajtZone)
{ document.ajtZone.action="Controllers/RouterActions.php?act=ajtZone"; /* Lance de l'action à mener */ }

// Envoyer l'ajout agent
function ajAgent(ajtAgent)
{ document.ajtAgent.action="Controllers/RouterActions.php?act=ajtAgent"; /* Lance de l'action à mener */ }

// Envoyer les modifications
function mdfAgent(mdAgent)
{ document.mdAgent.action="Controllers/RouterActions.php?act=mdAgent"; /* Lance de l'action à mener */ }

// Chargement photo
function readURL(event){
	
	var getImagePath = URL.createObjectURL(event.target.files[0]);
	
		document.getElementById("toff").src=getImagePath;
	 }
	

// Affiche l'heure en continu
function setHeure() {
	var H = new Date;
	heure = H.getHours();
	mins = H.getMinutes();
	sec = H.getSeconds();
	var s =  (sec < 10) ? s0 = "0" : s0 = "";
	var m = (mins < 10) ? m0 = "0" : m0 = "";
	var h = (heure < 10) ? h0 = "0" : h0 = "";
	var setThisHour = h0 + heure + ":" + m0 + mins + ":" + s0 + sec;
	var obj = document.getElementById('Hre');
	var child = obj.firstChild;
	(child !=null) ? obj.removeChild(child) : "" ;
	var texte = document.createTextNode(setThisHour);
	obj.appendChild(texte);
	tmp = setTimeout("setHeure()", 1000)
}

///////// Affiche la date en lettre
function setDateLettre() {
	var D  = new Date;
		jr_s  = D.getDay();
		jr    = D.getDate(); jr = ( jr < 10) ? jr = "0"+jr : jr;
		ms	  = D.getMonth();
		annee = D.getFullYear();
		
	var tp = ["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"]; 
	var mois = ["janvier","f&eacute;vrier","mars","avril","mai","juin","juillet","ao&ucirc;t","septembre","octobre","novembre","d&eacute;cembre"]; 
	var dat = tp[jr_s]+", le "+jr+" "+mois[ms]+" "+annee;	
	
	document.write(dat);
}

///////////// Traite les pages
function envoieRequete(url,id)
{
	var xhr_object = null;
	var position = id;
	
	if( window.XMLHttpRequest)  xhr_object = new XMLHttpRequest();
	else if (window.ActiveXObject)  xhr_object = new ActiveXObject("Microsoft.XMLHTTP"); 

	// On ouvre la requete vers la page désirée
	xhr_object.open("GET", url, true);
	
	xhr_object.onreadystatechange = function(){
		if ( xhr_object.readyState == 4 )
		{
			// j'affiche dans la DIV spécifiées le contenu retourné par le fichier
			document.getElementById(position).innerHTML = xhr_object.responseText;
		}
	}
	
	// dans le cas du get
	xhr_object.send(null);
}

