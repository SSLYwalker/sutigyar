<h2><?= $cim ?></h2>
<a class="btn btn-primary btn-xs" href="<?php echo site_url('/osszetevok/uj'); ?>" >ÚJ</a><br>
<?php foreach ($osszetevok as $osszetevo) : ?>
	<div class="panel panel-primary osszetevo-panel">
  		<div class="panel-heading">
    		<h3 class="panel-title"><?php echo $osszetevo['osszetevo_nev'] ?></h3>
		</div>
  		<div class="panel-body">
			<small>Kategória: <?php echo $osszetevo['osszetevo_kategoria_nev']; ?></small><br>
			<?php echo $osszetevo['osszetevo_torzs']; ?>
			<p><a class="btn btn-info" href="<?php echo site_url('/osszetevok/' .$osszetevo['osszetevo_slug']); ?>">Részletek</a></p>
		</div>
	</div>
<?php endforeach; ?>