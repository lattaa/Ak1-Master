<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

$this->_titre = 'Liste du personnel'; ?>

<p><strong>--- Personnel de la Micro Finance ---</strong></p>
<table style="width:850px; border:0;" cellspacing="0" cellpadding="0">
	<tr>
		<td style="width:845px;" valign="top">
			<fieldset>
				<legend>Liste</legend>
									
                <table style="width:845px; border:0; align=center;" cellspacing="1" cellpadding="0">
                    <tr style="height:1px; background-color:#fff;">
                        <td colspan="8"></td>
                    </tr>
                    <tr style="background-color:#93BEE2; height:30px;">
                        <th style="width:75px;" rowspan="2">MLE</th>
                        <th style="width:300px;" rowspan="2">NOM ET PRENOM(S)</th>
                        <th style="width:300px;" colspan="3">DATE</th>
                        <th style="width:90px;" rowspan="2">TEL</th>
                        <th style="width:80px;" rowspan="2" colspan="2">ACTIONS</th>
                    </tr>
                    <tr style="background-color:#93BEE2; height:30px;">
                        <th style="width:100px;">NAISS</th>
                        <th style="width:100px;">ENTREE</th>
                        <th style="width:100px;">DEPART</th>
                    </tr>
                    <tr style="height:1px; background-color:#fff;">
                        <td colspan="8"></td>
                    </tr>
	            
                <?php $a = 0; foreach($agents as $agent): ?>
			        <tr onMouseOver="this.style.color='black';this.style.background='#fff';" onMouseOut="this.style.color='white';this.style.background=''">
                        <td align="center"><?= $agent->mlea() ?></td>
                        <td>&nbsp;<?= $agent->nom().' '.$agent->prm() ?></td>
                        <td align="center"><?= $agent->nais() ?></td>
                        <td align="center"><?= $agent->entree() ?></td>
                        <td align="center"><?= $agent->retraite() ?></td>
                        <td align="center"><?= $agent->cel1() ?></td>
                        <th style="width=40px;"><a href="../Dagent?cd=<?= $agent->mlea() ?>"><img src="Views/Styles/img/sys/affiche.gif" border="0"></a></th>
                        <th style="width=40px;"><a href="../Magent?cd=<?= $agent->mlea() ?>"><img src="Views/Styles/img/sys/button_edit.png" border="0"></a></th>
                    </tr>
                <?php $a++; endforeach; ?>

                    <tr style="height:1px; background-color:#fff;">
                        <td colspan="8"></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="4"><?= $a ?> agent(s).</td>
                        <td colspan="8"></td>
                    </tr>
                </table>
  
			</fieldset>
		</td>
    </tr>
</table>

<br/><br/>