<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

$this->_titre = 'Détail d\'un agent'; ?>

<p><strong>--- Personnel de la Micro Finance ---</strong></p>
<table style="width:850px; border:0;" cellspacing="0" cellpadding="0">
<?php foreach($Dagent as $agent): ?>
	<tr>
		<td style="width:660px;" valign="top">
			<fieldset><legend>Contact</legend>			
	            <table style="width:660px; border:0;" cellspacing="12" cellpadding="0">
                    <tr>
                        <td style="width:18%;">ID Agent</td>
                        <td style="width:42%;">:&nbsp;<?= $agent->mlep() ?></td>
                        <td style="width:40%;">Date d'embauche <em>*</em></td>
                    </tr>
                    <tr>
                        <td>Nom <em>*</em></td>
                        <td>:&nbsp;<?= $agent->nom() ?></td>
                        <td>:&nbsp;<?= $agent->entree() ?></td>
                    </tr>
                    <tr>
                        <td>Pr&eacute;nom(s) <em>*</em></td>
                        <td>:&nbsp;<?= $agent->prm() ?></td>
                        <td>Contrat <em>*</em>&nbsp;:&nbsp;<?= $agent->contrat() ?></td>
                    </tr>
                    <tr>
                        <td>T&eacute;l&eacute;phone</td>
                        <td>:&nbsp;<?= $agent->tel() ?></td>
                        <td>Diplôme</td>
                    </tr>
                    <tr>
                        <td>Cellulaire 1 <em>*</em></td>
                        <td>:&nbsp;<?= $agent->cel1() ?></td>
                        <td>:&nbsp;<?= $agent->diplome() ?></td>
                    </tr>
                    <tr>
                        <td>Cellulaire 2</td>
                        <td>:&nbsp;<?= $agent->cel2() ?></td>
                        <td style="width:40%;" rowspan="3" align="center">
		  	                <p><i>Vérifiez le formulaire.<br />Les champs marqu&eacute;s par&nbsp;</i> <em>*</em> <i>sont</i> <em><i>obligatoires</i></em></p>
		                </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>:&nbsp;<?= $agent->mail() ?></td>
                    </tr>
                    <tr>
                        <td>Photo</td>
                        <td colspan="2">:&nbsp;<?= $agent->photo() ?></td>
                    </tr>
	            </table>
			</fieldset>
		</td>
		<td style="width:175px;" valign="top">
			<table style="width:175px; border:0;" cellspacing="0" cellpadding="0">
				<tr>
					<td>
						<fieldset style="margin-bottom: 14px;"><legend>Pi&egrave;ce d'identit&eacute; <em>*</em></legend>
						    <div align="center"><?= $agent->pce() ?></div>
						</fieldset>
					</td>
				</tr>
				<tr>
					<td>
					<fieldset style="margin-bottom: 14px;"><legend>Photo</legend>
						<div align="center"><img id="toff" name="toff" style="width:150px; height:182px;" src="Views/Styles/img/photos/<?= $agent->photo() ?>"/></div>
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
                        <table style="width:100%; border:0;" cellspacing="6" cellpadding="0">
                            <tr>
                                <td style="width:46%;">Date de naissance <em>*</em></td>
                                <td style="width:54%;">:&nbsp;<?= $agent->nais() ?></td>
                            </tr>
                            <tr>
                                <td>Lieu de naissance <em>*</em></td>
                                <td>:&nbsp;<?= $agent->lieu() ?></td>
                            </tr>
                            <tr>
                                <td>Sexe <em>*</em></td>
                                <td>:&nbsp;<?= $agent->sexe() ?></td>
                            </tr>
                            <tr>
                                <td>Pays de r&eacute;sidence</td>
                                <td>:&nbsp;TOGO</td>
                            </tr>
                            <tr>
                                <td>Ville de r&eacute;sidence <em>*</em></td>
                                <td>:&nbsp;<?= $agent->ville() ?></td>
                            </tr>
                            <tr>
                                <td>Mle Agent</td>
                                <td>:&nbsp;<b><?= $agent->mlea() ?></b></td>
                            </tr>
	                    </table>
		            </fieldset>	
                    </td>
                    <td style="width:50%" valign="top">
                    <fieldset><legend>Personne à prévenir</legend>
				        <table style="width:100%; border:0;" cellspacing="6" cellpadding="0">
                            <tr>
                                <td style="width:45%;">Nom Pr&eacute;nom(s)</td>
                                <td style="width:55%;">:&nbsp;<?= $agent->pnm() ?></td>
                            </tr>
                            <tr>
                                <td>Cellulaire 1</td>
                                <td>:&nbsp;<?= $agent->cell1() ?></td>
                            </tr>
                            <tr>
                                <td>Cellulaire 2</td>
                                <td>:&nbsp;<?= $agent->cell2() ?></td>
                            </tr>
                            <tr>
                                <td>Pi&egrave;ce d'identit&eacute;</td>
                                <td>:&nbsp;<?= $agent->pce1() ?></td>
                            </tr>
	                    </table>
			        </fieldset>
			            <p align="right"><a href="../Magent?cd=<?= $agent->mlea() ?>"><img src="Views/Styles/img/sys/button_edit.png" border="0"></a></p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
<?php endforeach; ?>
</table>
<br>