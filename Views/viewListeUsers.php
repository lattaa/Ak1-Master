<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

$this->_titre = 'Liste des utilisateurs'; ?>

<p><strong>--- utilisateurs de la Micro Finance ---</strong></p>
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
                        <th style="width:250px;" rowspan="2">NOM ET PRENOM(S)</th>
                        <th style="width:150px;" rowspan="2">LOGIN</th>
                        <th style="width:100px;" colspan="2">ETAT</th>
                        <th style="width:190px;" rowspan="2">DRN</th>
                        <th style="width:80px;" rowspan="2" colspan="2">ACTIONS</th>
                    </tr>
                    <tr style="background-color:#93BEE2; height:30px;">
                        <th style="width:50px;">ACT</th>
                        <th style="width:50px;">CNX</th>
                    </tr>
                    <tr style="height:1px; background-color:#fff;">
                        <td colspan="8"></td>
                    </tr>
	            
                <?php $a = 0; foreach($users as $user): ?>
			        <tr onMouseOver="this.style.color='black';this.style.background='#fff';" onMouseOut="this.style.color='white';this.style.background=''">
                        <td align="center"><?= $user->mlea() ?></td>
                        <td>&nbsp;<?= $user->nom().' '.$user->prm() ?></td>
                        <td>&nbsp;<?= $user->login() ?></td>
                        <td align="center"><?= $user->actif() ?></td>
                        <td align="center"><?= $user->connecte() ?></td>
                        <td align="center"><?= $user->dt() ?></td>
                        <th style="width=40px;"><a href="../Duser?cd=<?= $user->mlea() ?>"><img src="Views/Styles/img/sys/affiche.gif" border="0"></a></th>
                        <th style="width=40px;"><a href="../Muser?cd=<?= $user->mlea() ?>"><img src="Views/Styles/img/sys/button_edit.png" border="0"></a></th>
                    </tr>
                <?php $a++; endforeach; ?>

                    <tr style="height:1px; background-color:#fff;">
                        <td colspan="8"></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="4"><?= $a ?> utilisateur(s).</td>
                        <td colspan="8"></td>
                    </tr>
                </table>
  
			</fieldset>
		</td>
    </tr>
</table>

<br/><br/>