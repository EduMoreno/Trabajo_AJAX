<?php

class Contenido {

  private $id;
  private $fecha;
  private $genero;
  private $edad;
  private $provincia;
  private $tipo;
  private $nombreTipo;
 
 function __construct($idanimal, $fecha_alta,$genero,$edad,$provincia,$tipo,$nombreTipo) {
    $this->id = $idanimal;
    $this->fecha = $fecha_alta;
    $this->genero = $genero;
    $this->edad = $edad;
    $this->provincia = $provincia;
    $this->tipo = $tipo;
    $this->nombreTipo=$nombreTipo;
   
  }

  public function getId() {
    return $this->id;
  }

  public function getFechaAlta() {
    return $this->fecha;
  }

   public function getGenero() {
    return $this->genero;
  }
  
  public function getEdad() {
    return $this->edad;
  }
  
   public function getProvincia() {
    return $this->provincia;
  }
  
  public function getTipo() {
    return $this->tipo;
  }
   
  public function getNombreTipo() {
    return $this->nombreTipo;
  }


//Insertar
  public function insert() {
    require_once 'conexion.php';
    $conexion = Zoo::conectar();
    $insertar = "INSERT INTO animal (idanimal,fecha,genero,edad,provincia,idtipo) "
            . "VALUES (\"" . $this->id . "\", \"" .$this->fecha . "\", \"" . $this->genero . "\", \"" . $this->edad . "\", \"" . $this->provincia . "\", \"" . $this->tipo . "\")";
    $conexion->exec($insertar);
  }

//Modificar
  public function update() {
    require_once 'conexion.php';
    $conexion = Zoo::conectar();

    $modificar = "UPDATE animal SET  idanimal=\"$this->id\",fecha=\"$this->fecha\",genero=\"$this->genero\",edad=\"$this->edad\",provincia=\"$this->provincia\",idtipo=\"$this->tipo\" WHERE idanimal=\"$_POST[idModificar]\"";
    echo $modificar. " Esta es la consulta"; 
    $conexion->exec($modificar);
  }

//Borrar
  public function delete() {
    require_once 'conexion.php';
    $conexion = Zoo::conectar();
    $borrar = "DELETE FROM animal WHERE idanimal=" . $this->id;
    echo $borrar;
    $conexion->exec($borrar);
  }

  public static function contador() {
    require_once 'conexion.php';
    $conexion = Zoo::conectar();
    $count_query = $conexion->query("SELECT * FROM animal");
    $numrows = $count_query->rowCount();
    return $numrows;
  }


  public static function getListZoo($o,$f) {
    $ordenar=$o;
    $forma=$f;
    require_once 'conexion.php';
    $conexion = Zoo::conectar();
    include 'paginacion.php'; 
    include 'lista.php';
 
    $seleccion = "SELECT a.idanimal,DATE_FORMAT(a.fecha,'%d/%m/%Y') as FechaAlta,a.idtipo,a.provincia,a.edad,a.genero,c.nombre as nombretipo  FROM animal a , tipo c WHERE a.idtipo = c.idtipo ORDER BY  $ordenar $forma LIMIT $offset,$per_page";
    $consulta = $conexion->query($seleccion);

    $lista = [];

    while ($registro = $consulta->fetchObject()) {
      $lista[] = new contenido($registro->idanimal, $registro-> FechaAlta, $registro->genero, $registro->edad, $registro->provincia, $registro->idtipo,$registro->nombretipo);
    }
   
    return $lista;
  }

}
