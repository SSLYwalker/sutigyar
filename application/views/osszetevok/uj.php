<h2><?= $cim ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('osszetevok/uj'); ?>
  <div class="form-group">
    <label for="osszetevoNevInput">Összetevő neve</label>
    <input type="text" class="form-control" name="osszetevo_nev" placeholder="Add meg az összetevő nevét">
  </div>
  <div class="form-group">
    <label for="osszetevoKategoriaSelect">Összetevő kategória</label>
    <select name="osszetevoKategoriaSelect">
    	<?php foreach ($osszetevo_kategoriak as $osszetevo_kategoria) : ?>
    		<option value="<?php echo($osszetevo_kategoria['id']); ?>"><?php echo($osszetevo_kategoria['nev']); ?></option>
    	<?php endforeach; ?>
    </select>
    <a class="btn btn-primary btn-xs" href="<?php echo site_url('/osszetevok/uj-kategoria'); ?>" >ÚJ</a><br>
  </div>
  <div class="form-group">
    <label for="osszetevoLeirasaTextarea">Összetevő Leírása</label>
    <textarea class="form-control" name="osszetevo_torzs" id="osszetevoLeirasaTextarea" placeholder="Add meg az összetevő leírását"></textarea>
  </div>
  <button type="submit" class="btn btn-default">Felvitel</button>
</form>