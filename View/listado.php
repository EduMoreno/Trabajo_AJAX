
  <table  class="table table-bordered" >
    <tr id="trcabecera">
                <th id="cabecera" colspan="7">
                    Animales
                </th>
            </tr>
    <tr id="primeraFila"> 

      <td>ID</td>
      <td>Fecha Alta</td>
      <td>Genero</td>
      <td>Edad</td>
      <td>Provincia</td>
      <td>Tipo de Animal</td> 
      <td colspan="2">Botones</td>

    </tr>
    <?php
    foreach ($data['listado'] as $animal) {
      ?>
      <tr id="animal_<?= $animal->getId() ?>" align="center" data-idanimal="<?= $animal->getId() ?>">

        <td class="id"><?= $animal->getId() ?></td>
        <td class="alta"><?= $animal->getFechaAlta() ?></td>
        <td class="genero"><?= $animal->getGenero() ?></td>
        <td class="edad"><?= $animal->getEdad() ?></td>
        <td class="provincia"><?= $animal->getProvincia() ?></td>
        <td class="idtipo" name="<?=$animal->getTipo()?>"><?=$animal->getNombreTipo()?></td>
        <td class="accion"> <button id="borrar" type="button" class="btn btn-danger">Borrar</button>
         &nbsp; <button id="modificar" type="button" class="btn btn-warning" >Editar</button></td>

      </tr>


      <?php
    }
    ?>
  </table>
  <div class="table-pagination pull-right">
    <?php echo  paginate($reload, $page, $total_pages, $adjacents,$o,$f); ?>
  </div>

  

