<h2><?= $cim ?></h2>
<?php echo form_open('receptek/uj'); ?>
  <div class="form-group">
    <label for="receptNevInput">Recept neve</label>
    <input type="text" class="form-control" name="recept_nev" placeholder="Add meg a recept nevét">
  </div>
  <div class="form-group">
    <label for="receptLeirasaTextarea">Recept Leírása</label>
    <textarea class="form-control" name="recept_leirasa" id="receptLeirasaTextarea" placeholder="Add meg a recept leírását"></textarea>
  </div>
  <div>
    <table class="table table-striped table-hover ">
    <thead>
      <th>Mozgató</th>
      <th>Összetevő</th>
      <th>Mértékegység</th>
      <th>Megjegyzés</th>
    </thead>
    <tbody>
      <tr id="egy" class="tabledropzone">
        <td ><a draggable="true" ondragstart="event.dataTransfer.setData('text/plain',null)"href="#" title="Átrendezés húzással"><div class="fogo">&nbsp;</div></a></td>
        <td class="adatmezo1">Összetevő1</td>
        <td class="adatmezo1"><select><option value="n">-</option></select></td>
        <td class="adatmezo1">Megjegyzés1</td>
      </tr>
      <tr id="ketto" class="tabledropzone">
        <td ><a draggable="true" ondragstart="event.dataTransfer.setData('text/plain',null)"href="#"><div class="fogo">&nbsp;</div></a></td>
        <td class="adatmezo1">Összetevő2</td>
        <td class="adatmezo1"><select><option value="n">-</option></select></td>
        <td class="adatmezo1">Megjegyzés2</td>
      </tr>
      <tr id="harom" class="tabledropzone">
        <td ><a draggable="true" ondragstart="event.dataTransfer.setData('text/plain',null)"href="#"><div class="fogo">&nbsp;</div></a></td>
        <td class="adatmezo1">Összetevő3</td>
        <td class="adatmezo1"><select><option value="n">-</option></select></td>
        <td class="adatmezo1">Megjegyzés3</td>
      </tr>
      <tr id="negy" class="tabledropzone">
        <td ><a draggable="true" ondragstart="event.dataTransfer.setData('text/plain',null)"href="#"><div class="fogo">&nbsp;</div></a></td>
        <td class="adatmezo1">Összetevő4</td>
        <td class="adatmezo1"><select><option value="n">-</option></select></td>
        <td class="adatmezo1">Megjegyzés4</td>
      </tr>
    </tbody>
  </table>
  <button class="btn btn-default">Új Összetevő</button>
  </div>
  <button type="submit" class="btn btn-default">Felvitel</button>
</form>

<script>
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace( 'receptLeirasaTextarea', {language: 'hu', extraPlugins : 'confighelper'});
  var dragged, mit, mivel;
  /* events fired on the draggable target */
  document.addEventListener("drag", function( event ) {

  }, false);

  document.addEventListener("dragstart", function( event ) {
    // store a ref. on the dragged elem
    dragged = event.target;
    //Az elem aminek a gyermekeit majd kicseréljük egy másik elem gyermekeivel
    mit = findAncestorWithClass(dragged, "tabledropzone");
    // make it half transparent
    //event.target.style.opacity = .5;
  }, false);

  document.addEventListener("dragend", function( event ) {
    // reset the transparency
    event.target.style.opacity = "";
  }, false);

  /* events fired on the drop targets */
  document.addEventListener("dragover", function( event ) {
    // prevent default to allow drop
    event.preventDefault();
  }, false);

  document.addEventListener("dragenter", function( event ) {
    // highlight potential drop target when the draggable element enters it
    if ( event.target.className == "dropzone" ) {
      event.target.style.background = "purple";
    }
  }, false);

  document.addEventListener("dragleave", function( event ) {
    // reset background of potential drop target when the draggable element leaves it
    if ( event.target.className == "dropzone" ) {
      event.target.style.background = "";
    }
  }, false);

  document.addEventListener("drop", function( event ) {
    // prevent default action (open as link for some elements)
    event.preventDefault();
    // move dragged elem to the selected drop target
    if ( event.target.className == "dropzone" ) {
      event.target.style.background = "";
      dragged.parentNode.removeChild( dragged );
      event.target.appendChild( dragged );
    }
    //Ezen elem gyermekeivel fogjuk cserélni a mit gyermekeit
    if ( mivel = findAncestorWithClass(event.target, "tabledropzone") ) {
      swapHtmlChilds(mit, mivel);
      //celsor.insertBefore(eztTemp, celsor.children[i]);
      //console.log(ezt.item(i));
      //mozgosor.insertBefore(erreTemp, mozgosor.children[i]);
      //console.log(erre.item(i));
    }
  }, false);

  /*Visszaadja egy elemnek az első olyan ősét ami rendelkezik a paraméter
  * css osztállyal (amennyiben létezik ilyen)
  */
  function findAncestorWithClass (element, clss) {
    while ((element = element.parentElement) && !element.classList.contains(clss));
    return element;
  }

  //két HTML elem gyermekit cseréli ki pl.: táblázat két sorát
  function swapHtmlChilds (mit, mivel) {
  //Ez a fv fogja beszurni a gyermekeket a megfelelő helyre
  let insertChildAtIndex = function(parent, child, index) {
    if (!index) index = 0;
    if (index > parent.children.length) {
      parent.appendChild(child);
    } else {
      parent.insertBefore(child, parent.children[index]);
    }
  };
  //A gyermekek amiket ki kell cserélni
  mitGyermekek = mit.children;
  mivelGyermekek = mivel.children;
  //A maximális gyermekek száma
  let length;
  //Ha a gyermekek száma eltérő
  if(mitGyermekek.length > mivelGyermekek.length){
    length = mitGyermekek.length;
  } else {
      length = mivelGyermekek.length;
  }

  for(i = 0; i<length; i++){
    //Logikai értékek jelölik, van-e még gyermek elem
    mitTempExists = false;
    mivelTempExists = false;
    //vizsgálat, hogy van-e gyermek elem
    if(mitTemp = mitGyermekek.item(i)){
      mitTempExists = true;
    }
    //vizsgálat, hogy van-e gyermek elem
    if(mivelTemp = mivelGyermekek.item(i)){
      mivelTempExists = true;
    }
    //Ha van akkor csere
    if(mitTempExists){
      insertChildAtIndex(mivel, mitTemp, i);
    }
    //Ha van akkor csere
    if (mivelTempExists) {
      insertChildAtIndex(mit, mivelTemp, i);
    }
  }
}

/*  function dragstart_handler(ev) {
 console.log(ev.target.parentElement.parentElement.id);
 // Add the target element's id to the data transfer object
 ev.dataTransfer.setData("text/plain", ev.target.id);
}*/
</script>
