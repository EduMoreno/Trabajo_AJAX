
$(document).ready(function () {
 
//--------Dialogo Alta-------------------------------//
  $("#dialogoalta").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    buttons: {
      "Guardar": function () {
       if ($("#formulario_alta").valid()) {
        $.post("../Controller/Alta.php", {
          idAlta: $("#idAlta").val(),
          fechaAlta: $("#fechaAlta").val(),
          generoAlta: $("#generoAlta").val(),
          edadAlta: $("#edadAlta").val(),
          provinciaAlta: $("#provinciaAlta").val(),
          tipoAlta: $("select#idtipoAlta").val()
        }, function (data, status) {
            load(1);
        });		
        $(this).dialog("close");
      }
      },
      "Cancelar": function () {
        $(this).dialog("close");

      }
    }
  });
  $(document).on("click", "#nuevo", function () {
    $("#dialogoalta").dialog("open");
  });  
//--- Fin Alta

//-----Validate alta
  $("#formulario_alta").validate({
     errorClass: "rojo",
    rules: {
      fechaalta: {
        required: true
      },
      genero: {
        required: true
        
      },
      edad: {
        required: true,
        minlength: 1
      },
      
      provincia: {
        required: true
      },
      idtipo: {
        required: true,
        minlength: 1}
    },
    messages: {
      fechaalta:{
       required: "Introduzca una fecha"
       },
     
     genero: "Introduzca un genero",
      
       edad:{
        required:"Introduzca una edad",
         minlength:"Debes introducir mas digitos"
      },
      provincia: "Introduzca una provincia",
      idtipo: "Introduzca un tipo de animal"
    }

  });
  
//-- Borrar 
  
  $("#dialogoborrar").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    buttons: {
      "Borrar": function () {
        $.get("../Controller/Borrar.php", {"idanimal": idanimal}, function (data, status) {
          $("#animal_" + idanimal).fadeOut(1000);
        });		
        $(this).dialog("close");
      },
      "Cancelar": function () {
        $(this).dialog("close");
      }
    }	        
  });//Fin de dialogo borrar

  $(document).on("click", "#borrar", function () {
    idanimal = $(this).parents("tr").data("idanimal");
    $("#dialogoborrar").dialog("open");
  });
//-----Modificar------
  
  //Boton Modificar	
   $(document).on("click", "#modificar", function () {
    idanimal = $(this).parents("tr").data("idanimal");
    $("#idModificar").val($(this).parent().siblings("td.id").html());
    $("#fechaAltaModificar").val($(this).parent().siblings("td.alta").html());
    $("#generoModificar").val($(this).parent().siblings("td.genero").html());
    $("#edadModificar").val($(this).parent().siblings("td.edad").html());
    $("#provinciaModificar").val($(this).parent().siblings("td.provincia").html());

    var idtipomodificar = $(this).parent().siblings("td.idtipo").attr("name");
    $("#tipoModificar option[value='" + idtipomodificar + "']").attr("selected", true);
    $("#dialogomodificar").dialog("open");

  });

  $("#dialogomodificar").dialog({
    autoOpen: false,
    resizable: false,
    modal: true,
    buttons: {
      "Guardar": function () {
        if ($("#formulario_modificar").valid()) {

              $.post("../Controller/Modificar.php", {
            idModificar: idanimal,
            fechaAltaModificar: $("#fechaAltaModificar").val(),
            generoModificar: $("#generoModificar").val(),
            edadModificar: $("#edadModificar").val(),
            provinciaModificar: $("#provinciaModificar").val(),
            tipoModificar: $("#tipoModificar").val()

              }, function (data, status) {
            $("#animal_" + idanimal + " td.alta").html($("#fechaAltaModificar").val());
            $("#animal_" + idanimal + " td.genero").html($("#generoModificar").val());
            $("#animal_" + idanimal + " td.edad").html($("#edadModificar").val());
            $("#animal_" + idanimal + " td.provincia").html($("#provinciaModificar").val());
            $("#animal_" + idanimal + " td.idtipo").html($("#tipoModificar").val());
          load(1);
          });		
          
           $(this).dialog("close");
        }
      },
      "Cancelar": function () {
        $(this).dialog("close");
      }
    }
  });//Fin de dialogo modificar
 
  //Validate Modificar
   $("#formulario_modificar").validate({
     errorClass: "rojo",
    rules: {
      alta: {
        required: true
      },
      genero: {
        required: true
      },
      edad: {
        required: true,
        minlength: 1

      },
      
      provincia: {
        required: true
      },
      idtipo: {
        required: true
       }
    },
    messages: {
      alta: {
       required: "Introduzca la fecha"
              },
      genero: "Introduzca un genero",
      edad: "Introduzca una edad",
      provincia: "Introduzca una provincia",
      idtipo: "Introduzca un tipo de animal"
    }

  });
 
 //Ordenar
  $('select#campos').on('change', function () {
    load(1);
  });
  $('select#forma').on('change', function () {
    load(1);
  });
  load(1);
//Fin de ordenar

$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '&#x3c;Ant',
		nextText: 'Sig&#x3e;',
		currentText: 'Hoy',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
		dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
		weekHeader: 'Sm',
                dateFormat: 'dd-mm-yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['es']);
        
$("#fechaAlta").datepicker({
  });
  
 $("#fechaAltaModificar").datepicker({
  });

});
//--- PAGINACION -------------------------------------------------

function load(page) {
  var ordena_Formas = $("select#forma").val();
  var ordena_Campos = $("select#campos").val();
  var parametros = {"action": "ajax", "page": page, "ordenar": ordena_Campos, "forma": ordena_Formas};
  $.ajax({
    url: 'listado_controlador.php',
    data: parametros,
       success: function (data) {
      $(".outer_div").html(data).fadeIn('slow');
      }
  });

}