

    <form id="formulario_alta">

      <div>Fecha</div> <div id="td"><input type="text" name="fechaalta" id="fechaAlta"><br></div>
      <div>Genero </div><div id="td"> <input type="text" name="genero" size="10" id="generoAlta" autofocus required><br></div>
      <div>Edad</div><div id="td"> <input type="number" name="edad" size="2" id="edadAlta" min="0" max="1000" required><br></div>
      <div>Provincia</div><div><input type="text" name="provincia" size="10" id="provinciaAlta" required><br></div><br>
     <div>Tipo<select placeholder="Tipo" name="idtipo" id="idtipoAlta" >
          <?php
          foreach ($data['listadoTipo'] as $fila2) {
            ?>
            <option value="<?php echo $fila2->getIdTipo(); ?>"><?php echo$fila2->getNombreTipo(); ?></option>
          <?php } //while  ?>
        </select></div>

    </form>


