<h2><?= $cim ?></h2><br>
<small class="osszetevo-datum">Létrehozva: <?php echo $osszetevo['osszetevo_letrehozva']?></small>
<p><small>
	<?php
		$katnev = $osszetevo['osszetevo_kategoria_nev'];
		if(preg_match('/(?i)^[aeiouy]+/', $katnev))
		{
			echo('Az <a href="/osszetevok/kategoriak/' . $katnev . '">' . $katnev . '</a>');
		}
		else
		{
			echo('A <a href="/osszetevok/kategoriak/' . $katnev . '">' . $katnev . '</a>');
		}
	?> kategóriában</small></p>
<div class="osszetevo-torzs">
	<?= $osszetevo['osszetevo_torzs'] ?>
</div><br>
