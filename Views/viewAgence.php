<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

$this->_titre = 'Identité Agence'; ?>

<p><strong>--- Agence de la Micro Finance ---</strong></p>
<table style="width:850px; border:0;" cellspacing="0" cellpadding="0">
	<tr>
		<td style="width:670px;" valign="top">
			<fieldset>
				<legend>Identit&eacute;</legend>
									
	            <?php foreach($agences as $agence): ?>
                <table style="width:670px; border:0;" cellspacing="3" cellpadding="2">
                    <tr>
                        <td style="width:20%;">Code</td>
                        <td style="width:30%;">:&nbsp;<em><?= $agence->cdag() ?></em></td>
                        <td style="width:50%;" rowspan="4" align="center"><img src="<?= $agence->logo() ?>" width="150" height="150"></td>
                    </tr>
                    <tr>
                        <td><label for="raison">Raison Sociale <em>*</em></label></td>
                        <td>:&nbsp;<?= $agence->nom() ?></td>
                    </tr>
                    <tr>
                        <td><label for="adresse">Adresse <em>*</em></label></td>
                        <td>:&nbsp;<?= $agence->ad() ?></td>
                    </tr>
                    <tr>
                        <td><label for="tel1">T&eacute;l&eacute;phone </label></td>
                        <td>:&nbsp;<?= $agence->tl1() ?></td>
                    </tr>
                    <tr>
                        <td><label for="cel1">Cellulaire<em>*</em></label></td>
                        <td>:&nbsp;<?= $agence->tl2() ?></td>
                        <td style="width:50%;" rowspan="2" align="center">
		  	                <p><i>V&eacute;rifiez les saisies, notez les erreurs<br /><em> et informez votre sup&eacute;rieur hi&eacute;rarchique.</em></i></p>
		                </td>
                    </tr>
                    <tr>
                        <td><label for="mail">Email </label></td>
                        <td>:&nbsp;<?= $agence->ml() ?></td>
                    </tr>
                    <tr>
                        <td><label for=""></label></td>
                        <td>:&nbsp;</td>
                        <td>:&nbsp;</td>
                    </tr>
                </table>
                <?php endforeach; ?>
  
			</fieldset>
		</td>
    </tr>
</table>

<br/><br/>