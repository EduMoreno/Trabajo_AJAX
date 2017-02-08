      <form id="formulario_modificar">
    
        <div>Codigo</div>
         <div> <input type="number" id="idModificar"  disabled></div>
          
         <div>Fecha Alta</div>
          <div> <input type="text" name="alta" class="fecha" id="fechaAltaModificar"></div>
     
        <div>Genero</div>
         <div><input type="text" name="genero" id="generoModificar" value="" size="10" autofocus></div>
         
         <div>Edad</div>
         <div> <input type="number" name="edad" size="2" id="edadModificar" min="0" max="1000" ></div>
       
        <div>Provincia</div>
          <div> <input type="text" name="provincia" id="provinciaModificar" value="" size="10" ></div>
          
         <div>Tipo</div>
           <div><select placeholder="Tipo" name="idtipo" id="tipoModificar">
            <?php
            foreach ($data['listadoTipo'] as $fila2) {
              ?>
              <option value="<?php echo $fila2->getIdTipo(); ?>"><?php echo$fila2->getNombreTipo(); ?></option>
            <?php } ?>
          </select></div>
      </form>

