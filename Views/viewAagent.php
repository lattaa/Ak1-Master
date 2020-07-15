<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

$this->_titre = 'Ajouter un agent'; ?>

<p><strong>--- Personnel de la Micro Finance ---</strong></p>
<table style="width:850px; border:0;" cellspacing="0" cellpadding="0">
<form data-validate="parsley" id="ajtAgent" name="ajtAgent" method="post" action="" enctype="multipart/form-data">
	<tr>
		<td style="width:660px;" valign="top">
			<fieldset><legend>Contact</legend>			
	            <table style="width:660px; border:0;" cellspacing="3" cellpadding="0">
                    <tr>
                        <td style="width:15%;">Matricule</td>
                        <td style="width:45%;">:&nbsp;--- ---</td>
                        <td style="width:40%;"><label for="entree">Date d'embauche <em>*</em></label></td>
                    </tr>
                    <tr>
                        <td><label for="nm_pers">Nom <em>*</em></label></td>
                        <td>:&nbsp;<input id="nmPers" name="nmPers" type="text" placeholder="NAMBEA" autofocus required></td>
                        <td><input id="entree" name="entree" type="date" placeholder="2018/09/20" required></td>
                    </tr>
                    <tr>
                        <td><label for="prm_pers">Pr&eacute;nom(s) <em>*</em></label></td>
                        <td>:&nbsp;<input id="prmPers" name="prmPers" type="text" placeholder="Latta David" required></td>
                        <td><label for="contrat">Contrat <em>*</em></label>&nbsp;:&nbsp;<select id="contrat" name="contrat" required>
                                        <option value="CDI" name="contrat">CDI</option>
                                        <option value="CDD" name="contrat">CDD</option>
                                    </select></td>
                    </tr>
                    <tr>
                        <td><label for="tel_pers">T&eacute;l&eacute;phone</label></td>
                        <td>:&nbsp;<input id="telPers" name="telPers" type="tel" placeholder="xx xx xx xx" pattern="[0-9]{8}"></td>
                        <td><label for="diplome">Diplôme</label></td>
                    </tr>
                    <tr>
                        <td><label for="cel1_pers">Cellulaire 1 <em>*</em></label></td>
                        <td>:&nbsp;<input id="cel1Pers" name="cel1Pers" type="tel" placeholder="xx xx xx xx" pattern="[0-9]{8}" required></td>
                        <td><input id="diplome" name="diplome" type="text" placeholder="BEPC + 3"></td>
                    </tr>
                    <tr>
                        <td><label for="cel2_pers">Cellulaire 2</label></td>
                        <td>:&nbsp;<input id="cel2Pers" name="cel2Pers" type="tel" placeholder="xx xx xx xx" pattern="[0-9]{8}"></td>
                        <td style="width:40%;" rowspan="2" align="center">
		  	                <p><i>Compl&eacute;tez le formulaire.<br />Les champs marqu&eacute;s par&nbsp;</i> <em>*</em> <i>sont</i> <em><i>obligatoires</i></em></p>
		                </td>
                    </tr>
                    <tr>
                        <td><label for="mail_pers">Email</label></td>
                        <td>:&nbsp;<input id="mailPers" name="mailPers" type="email" size="30" placeholder="nambeal@latta.tg"></td>
                    </tr>
                    <tr>
                        <td><label for="ph_pers">Photo</label></td>
                        <td colspan="2">:&nbsp;<input id="phPers" name="phPers" type="file" size="17" onChange="readURL(event)"></td>
                    </tr>
	            </table>
			</fieldset>
		</td>
		<td style="width:175px;" valign="top">
			<table style="width:175px; border:0;" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<fieldset style="margin-bottom: 14px;"><legend>Pi&egrave;ce d'identit&eacute; <em>*</em></legend>
						    <div align="center"><input id="pceIdnP" name="pceIdnP" type="text" placeholder="CNI N&deg;0500-231-5667"required></div>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td>
					<fieldset style="margin-bottom: 14px;"><legend>Photo</legend>
						<div align="center"><img id="toff" name="toff" style="width:160px; height:190px;" src="../Views/Styles/img/sys/avatar.png"/></div>
					</fieldset>
					</td>
				</tr>
			</table>
		</td>
    </tr>
    
    <tr>
        <td colspan="2">
            <table style="width:100%; border:0;" cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width:50%" valign="top">
		            <fieldset><legend>Informations Personnelles</legend>
                        <table style="width:100%; border:0;" cellspacing="3" cellpadding="0">
                            <tr>
                                <td style="width:46%;"><label for="dt_nais">Date de naissance <em>*</em></label></td>
                                <td style="width:54%;">:&nbsp;<input id="dtNais" name="dtNais" type="date" size="10" placeholder="17-09-1982" required></td>
                            </tr>
                            <tr>
                                <td><label for="lie_nais">Lieu de naissance <em>*</em></label></td>
                                <td>:&nbsp;<input id="lieNais" name="lieNais" type="text" size="15" placeholder="Kp&eacute;m&eacute;" required></td>
                            </tr>
                            <tr>
                                <td><label for="sex_pers">Sexe <em>*</em></label></td>
                                <td>:&nbsp;<select id="sexPers" name="sexPers" required>
                                        <option value="Homme" name="sexe">Homme</option>
                                        <option value="Femme" name="sexe">Femme</option>
                                    </select>
		  		                </td>
                            </tr>
                            <tr>
                                <td><label for="cd_py">Pays de r&eacute;sidence</label></td>
                                <td>:&nbsp;TOGO</td>
                            </tr>
                            <tr>
                                <td><label for="ville_pers">Ville de r&eacute;sidence <em>*</em></label></td>
                                <td>:&nbsp;<input id="villePers" name="villePers" type="text" size="15" placeholder="Lom&eacute;" required></td>
                            </tr>
                            <tr>
                                <td><label for="mleAgt">Mle Agent</label></td>
                                <td>:&nbsp;----</td>
                            </tr>
	                    </table>
		            </fieldset>	
                    </td>
                    <td style="width:50%" valign="top">
                    <fieldset><legend>Personne à prévenir</legend>
				        <table style="width:100%; border:0;" cellspacing="3" cellpadding="0">
                            <tr>
                                <td style="width:45%;"><label for="nmPrm">Nom Pr&eacute;nom(s)</label></td>
                                <td style="width:55%;">:&nbsp;<input id="nmPrm" name="nmPrm" type="text" size="15" placeholder="DOUTI Patrice"></td>
                            </tr>
                            <tr>
                                <td><label for="cel1_cas">Cellulaire 1</label></td>
                                <td>:&nbsp;<input id="cel1Cas" name="cel1Cas" type="tel" placeholder="xx xx xx xx" size="15" pattern="[0-9]{8}"></td>
                            </tr>
                            <tr>
                                <td><label for="cel2_cas">Cellulaire 2</label></td>
                                <td>:&nbsp;<input id="cel2Cas" name="cel2Cas" type="tel" placeholder="xx xx xx xx" pattern="[0-9]{8}" size="15"></td>
                            </tr>
                            <tr>
                                <td><label for="pce_idn">Pi&egrave;ce d'identit&eacute;</label></td>
                                <td>:&nbsp;<input id="pceIdn" name="pceIdn" type="text" placeholder="CNI N&deg;0500-231-5667" size="15"></td>
                            </tr>
	                    </table>
			        </fieldset>
			            <p align="center"><input type="submit" style="border: 1px solid #3079ed; font-size: 15px; height: 30px; width: 180px;" value="Enregistrer" onClick="ajAgent()"></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

</form>
</table>