<?php
/*
* Copyright 2017, 2018 Latta & Co.
*
* Ak1 est un logiciel open source;
* selon les termes des Licenses GNU publiés par Latta & Co.
*/

$this->_titre = 'Liste des zones'; ?>

<p><strong>--- Zones de la Micro Finance ---</strong></p>
<table style="width:850px; border:0;" cellspacing="0" cellpadding="0">
	<tr>
		<td style="width:845px;" valign="top">
			<fieldset>
				<legend>Liste</legend>
							
                <table style="width:845px; border:0; align=center;" cellspacing="1" cellpadding="0">
                    <tr style="height:1px; background-color:#fff;">
                        <td colspan="6"></td>
                    </tr>
                    <tr style="background-color:#93BEE2; height:30px;">
                        <th style="width:85px;">CODE</th>
                        <th style="width:500px;">NOM DE LA ZONE</th>
                        <th style="width:100px;">DATE</th>
                        <th style="width:90px;">EFFECTIF</th>
                        <th style="width:70px;" colspan="2">ACTIONS</th>
                    </tr>
                    <tr style="height:1px; background-color:#fff;">
                        <td colspan="6"></td>
                    </tr>
	            
                <?php $a = 0; foreach($zones as $zone): ?>
			        <tr onMouseOver="this.style.color='black';this.style.background='#fff';" onMouseOut="this.style.color='white';this.style.background=''">
                        <td align="center"><?= $zone->code() ?></td>
                        <td>&nbsp;<?= $zone->nom() ?></td>
                        <td align="center"><?= $zone->dats() ?></td>
                        <td align="center"><?= $zone->eff() ?></td>
                        <th style="width=35;"><a href="../Mzone?cd=<?= $zone->code() ?>"><img src="Views/Styles/img/sys/button_edit.png" border="0"></a></th>
                    <?php if($zone->eff() <= 0) { ?><th style="width=35;" onclick="return confirm('CONFIRMER LA SUPPRESSION DE: <?= $zone->code() ?> - <?= $zone->nom() ?>!');"><a href="Controllers/RouterActions.php?act=supp&cd=<?= $zone->code() ?>&nm=t_zones&id=cd_zn&fr=zones"><img src="Views/Styles/img/sys/button_empty.png" border="0"></a></th><?php } ?>
                    </tr>
                <?php $a++; endforeach; ?>

                    <tr style="height:1px; background-color:#fff;">
                        <td colspan="6"></td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td colspan="4"><?= $a ?> zone(s).</td>
                        <td colspan="2"></td>
                    </tr>
                </table>
  
			</fieldset>
		</td>
    </tr>
</table>

<br/><br/>