<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link href='<?php echo base_url();?>assets/fullcalendar/fullcalendar.css' rel='stylesheet' />
<link href='<?php echo base_url();?>assets/fullcalendar/fullcalendar.print.css' rel='stylesheet' media='print' />
<!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assets/dist/css/AdminLTE.min.css">

<script src="<?php echo base_url();?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>

<script src='<?php echo base_url();?>assets/fullcalendar/lib/moment.min.js'></script>
<!-- <script src='<?php echo base_url();?>assets/fullcalendar/lib/jquery.min.js'></script> -->
<script src='<?php echo base_url();?>assets/fullcalendar/fullcalendar.min.js'></script>
<script src='<?php echo base_url();?>assets/fullcalendar/locale/es.js'></script>


<script>


$(document).ready(function() {
  $("#calendar").fullCalendar({
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay"
    },

    locale: 'es',

    defaultView: "month",
    navLinks: true, 
    editable: true,
    eventLimit: true, 
    selectable: true,
    selectHelper: false,

//Nuevo Evento
  select: function(start, end){
      $("#exampleModal").modal();
      $("input[name=fecha_inicio]").val(start.format('DD-MM-YYYY'));
       
      var valorFechaFin = end.format("DD-MM-YYYY");
      var F_final = moment(valorFechaFin, "DD-MM-YYYY").subtract(1, 'days').format('DD-MM-YYYY'); //Le resto 1 dia
      $('input[name=fecha_fin').val(F_final);  

    },
      
   


//Eliminar Evento
eventRender: function(event, element) {
    element
      .find(".fc-content")
      .prepend("<span id='btnCerrar'; class='closeon material-icons'>&#xe5cd;</span>");
    
    //Eliminar evento
    element.find(".closeon").on("click", function() {

  var pregunta = confirm("Deseas Borrar este Evento?");   
  if (pregunta) {

    $("#calendar").fullCalendar("removeEvents", event._id);

     $.ajax({
            type: "POST",
            url: 'deleteEvento.php',
            data: {id:event._id},
            success: function(datos)
            {
              $(".alert-danger").show();

              setTimeout(function () {
                $(".alert-danger").slideUp(500);
              }, 3000); 

            }
        });
      }
    });
  },


//Moviendo Evento Drag - Drop
eventDrop: function (event, delta) {
  var idEvento = event._id;
  var start = (event.start.format('DD-MM-YYYY'));
  var end = (event.end.format("DD-MM-YYYY"));

    $.ajax({
        url: 'drag_drop_evento.php',
        data: 'start=' + start + '&end=' + end + '&idEvento=' + idEvento,
        type: "POST",
        success: function (response) {
         // $("#respuesta").html(response);
        }
    });
},

//Modificar Evento del Calendario 
eventClick:function(event){
    var idEvento = event._id;
    $('input[name=idEvento').val(idEvento);
    $('input[name=evento').val(event.title);
    $('input[name=fecha_inicio').val(event.start.format('DD-MM-YYYY'));
    $('input[name=fecha_fin').val(event.end.format("DD-MM-YYYY"));

    $("#modalUpdateEvento").modal();
  },


  });


//Oculta mensajes de Notificacion
  setTimeout(function () {
    $(".alert").slideUp(300);
  }, 3000); 


});



</script>
<style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<body>

	<div id='calendar'></div>


	<!-- Modal Cierre -->
	<div class="modal fade" id="modalEvento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header bg-red">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="mtitulo"></h4>
	      </div>

	      <div class="modal-body">

	            <!-- form start -->
	            <form class="form-horizontal">
	            	<input type="hidden" id="mhdnIdEvento">
	              <div class="box-body">
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-2 control-label">Banda R&P</label>

	                  <div class="col-sm-10">
	                    <input type="text" class="form-control" id="txtBandaRP">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-2 control-label">Web</label>

	                  <div class="col-sm-10">
	                    <input type="text" class="form-control" id="txtWeb">
	                  </div>
	                </div>
	              </div>
	              <!-- /.box-body -->
	              <!-- <div class="box-footer">
	                <button type="submit" class="btn btn-default">Cancel</button>
	                <button type="submit" class="btn btn-info pull-right">Sign in</button>
	              </div> -->
	              <!-- /.box-footer -->
	            </form>
	          <!-- /.box -->
	      </div>

	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" id="btnCerrarModal" data-dismiss="modal">Cancelar</button>
	        <button type="button" class="btn btn-danger" id="btnUpdEvento">Guardar</button>
	      </div>
	    </div>
	  </div>
	</div>

<script type="text/javascript">
	$('#btnUpdEvento').click(function(){
		var nome = $('#txtBandaRP').val();
		var web = $('#txtWeb').val();
		var ide = $('#mhdnIdEvento').val();

		$.post("<?php echo base_url();?>ccalendar/updEvento2",
		{
			nom: nome,
			web: web,
			id: ide
		},
		function(data){
			if (data == 1) {
				$('#btnCerrarModal').click();
			}
		})
	})
</script>

</body>
</html>
