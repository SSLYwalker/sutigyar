<h2><?= $cim ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('osszetevok/uj-kategoria'); ?>
  <div class="form-group">
    <label for="osszetevoKategoriaNevInput">Összetevő kategória neve</label>
    <input type="text" class="form-control" name="osszetevo_kategoria_nev" id="osszetevoKategoriaNevInput" placeholder="Add meg az összetevő kategória nevét">
  </div>
  <button type="submit" class="btn btn-default">Felvitel</button>
</form>