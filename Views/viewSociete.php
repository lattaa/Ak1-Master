<?php $this->_titre = 'Identité Société'; ?>

<p><strong>--- Soci&eacute;t&eacute; de Micro Finance ---</strong></p>
<table style="width:850px; border:0;" cellspacing="0" cellpadding="0">
	<tr>
		<td style="width:670px;" valign="top">
			<fieldset>
				<legend>Identit&eacute;</legend>
									
	            <?php foreach($societes as $soc): ?>
                <table style="width:670px; border:0;" cellspacing="3" cellpadding="2">
                    <tr>
                        <td style="width:20%;">Code</td>
                        <td style="width:30%;">:&nbsp;<em><?= $soc->cdsoc() ?></em></td>
                        <td style="width:50%;" rowspan="4" align="center"><img src="<?= $soc->logo() ?>" width="150" height="150"></td>
                    </tr>
                    <tr>
                        <td><label for="raison">Raison Sociale <em>*</em></label></td>
                        <td>:&nbsp;<?= $soc->rs() ?></td>
                    </tr>
                    <tr>
                        <td><label for="adresse">Adresse <em>*</em></label></td>
                        <td>:&nbsp;<?= $soc->ad() ?></td>
                    </tr>
                    <tr>
                        <td><label for="tel1">T&eacute;l&eacute;phone </label></td>
                        <td>:&nbsp;<?= $soc->tl1() ?></td>
                    </tr>
                    <tr>
                        <td><label for="cel1">Cellulaire<em>*</em></label></td>
                        <td>:&nbsp;<?= $soc->tl2() ?></td>
                        <td style="width:50%;" rowspan="2" align="center">
		  	                <p><i>V&eacute;rifiez les saisies, notez les erreurs<br /><em> et informez votre sup&eacute;rieur hi&eacute;rarchique.</em></i></p>
		                </td>
                    </tr>
                    <tr>
                        <td><label for="mail">Email </label></td>
                        <td>:&nbsp;<?= $soc->ml() ?></td>
                    </tr>
                    <tr>
                        <td><label for="cnss">CNSS</label></td>
                        <td>:&nbsp;<?= $soc->cnss() ?></td>
                        <td>:&nbsp;<?= $soc->dtcnss() ?></td>
                    </tr>
                </table>
                <?php endforeach; ?>
  
			</fieldset>
		</td>
    </tr>
</table>

<br/><br/>