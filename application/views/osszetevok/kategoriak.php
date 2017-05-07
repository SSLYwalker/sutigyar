<h2><?= $cim ?></h2>
<a class="btn btn-primary btn-xs" href="<?php echo site_url('/osszetevok/uj-kategoria'); ?>" >ÚJ</a><br>
<?php foreach ($osszetevo_kategoriak as $osszetevo_kategoria) : ?>
	<div class="panel panel-primary osszetevo-kategoria-panel">
  		<div class="panel-heading">
    		<h3 class="panel-title"><?php echo $osszetevo_kategoria['nev'] ?></h3>
		</div>
  		<div class="panel-body">
			<p><a class="btn btn-info" href="">Kategoria elemei</a></p>
		</div>
	</div>
<?php endforeach; ?>