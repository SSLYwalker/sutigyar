<h2><?= $cim ?></h2>
<a class="btn btn-primary btn-xs" href="<?php echo site_url('/receptek/uj'); ?>" >ÚJ</a>
<?php foreach ($receptek as $recept) : ?>
	<h3><?php echo $recept['cim'] ?></h3>
	<small class="recept-datum">Beküldve: <?php echo $recept['letrehozva']; ?></small><br>
	<?php echo $recept['torzs']; ?>
	<p><a href="<?php echo site_url('/receptek/' .$recept['slug']); ?>">Részletek</a></p>
<?php endforeach; ?>
