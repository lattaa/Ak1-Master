<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

$this->_titre = 'Ajouter une zone'; ?>

<p><strong>--- Zones de la Micro Finance ---</strong></p>
<table style="width:850px; border:0;" cellspacing="0" cellpadding="0">
<form data-validate="parsley" id="ajtZone" name="ajtZone" method="post" action="" enctype="multipart/form-data">

	<tr>
		<td style="width:845px;" valign="top">
			<fieldset>
				<legend>Formulaire de saisie</legend>

					<table style="width:700px; border:0;" cellspacing="4" cellpadding="2">
        				<tr>
          					<td style="width:20%;">Code<em>*</em></td>
          					<td style="width:40%;">:&nbsp;<input id="code" name="code" type="text"  placeholder="Code" autofocus required></td>
          					<td style="width:40%;" rowspan="4" align="center">
		  						<p><i>Compl&eacute;tez le formulaire.<br />Les champs marqu&eacute;s par&nbsp;</i> <em>*</em> <i>sont</i> <em><i>obligatoires</i></em></p>
							</td>
        				</tr>
        				<tr>
          					<td><label for="nomZn">Nom de la zone<em>*</em></label></td>
          					<td>:&nbsp;<input id="nomZn" name="nomZn" type="text" placeholder="Nom de la zone" required></td>
        				</tr>
        				<tr>
          					<td><label for="datZn">Date de création<em>*</em></label></td>
          					<td>:&nbsp;<input id="datZn" name="datZn" type="date" size="10" required></td>
        				</tr>
        				<tr>
          					<td><label for="effZn">Effectif de la zone</label></td>
          					<td>:&nbsp;0 Membre</td>
        				</tr>
					</table>

            </fieldset>
		</td>
	</tr>
	<tr>
		<td>
			<p><input type="submit" style="border: 1px solid #3079ed; font-size: 15px; height: 30px; width: 180px;" value="Enregistrer" onClick="ajZone()"></p>
		</td>
	</tr>
</form>
</table>

<br/>