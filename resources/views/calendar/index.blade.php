@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
          <h1>Calendario</h1>
@stop

@section('content')
<div>

    <!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2">
            <div class="sticky-top mb-3">
              
              <!-- /.card -->
              {{-- <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Crear Nueva Tarea</h3>
                </div>
                <div class="card-body">
                    <div class="input-group">
                      <button type="button" class="btn btn-block btn-outline-primary btn-flat" data-toggle="modal" data-target="#modalcategoria">Crear Tarea</button>
                    </div>
                </div>
              </div> --}}
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-10">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR aqui se encuentra el objeto calendario en donde se mostraran los eventos -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->
  



</div>
@stop

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="css/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/css/adminlte.min.css">
@stop

@section('js')
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <script src="js/js/adminlte.min.js"></script>
    <script src="js/moment/moment.min.js"></script>
    <script src="js/fullcalendar/main.js"></script>
    <script>
    $(function () {
    
        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()   
        var d    = date.getDate(),  
            m    = date.getMonth(),
            y    = date.getFullYear()
    
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;
    
        // var containerEl = document.getElementById('external-events');
        // var checkbox = document.getElementById('drop-remove');
       var calendarEl = document.getElementById('calendar'); // grab element reference
    

      //quiero hacer que si es un usuario profesor se pueda editar y si no no pueda

      
          var edi = @json($permiso);
          console.log(edi);
          // capturamos el valor recibido de events y lo convertimos en json
          var tareas = @json($events);
          // aqui es donde se crea el calendario
          var calendar = new Calendar(calendarEl, {
            headerToolbar: {
              left  : 'prev,next,today',
              center: 'title',
              right : 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            themeSystem: 'bootstrap',
            timeZone: 'local',
            locale: 'es',
            //Random default events
            events: tareas,
            //selectable: true,
            //   selectHelper: true,
            select     : function(start,end,allDays){ 
                
            },
            editable  : edi,
            // este sirve para que se pueda mover los eventos es decir las tareas
            eventDrop: function(info) { // si se mueve un evento
                    // igualamos el id del evento a la variable id, startDate a la variable startDate y endDate a la variable endDate
                    var id = info.event.id; 
                    var startDate = moment(info.event.start).format('YYYY-MM-DD HH:mm:ss');
                    var endDate = moment(info.event.end).format('YYYY-MM-DD HH:mm:ss');
                    var tipo = info.event.extendedProps.tipo;

                    //  console.log(tipo);
                    // Hace una petición ajax para actualizar la fecha de inicio y fin de la tarea
                    $.ajax({
                      url: "{{ route('updateTarea', '')}}" + '/' + id,
                      type: 'PUT',
                      dataType: 'json',
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: {
                        startDate: startDate,
                        endDate: startDate,
                        tipo: tipo,
                      },
                      success: function(response) {
                        // console.log(response);
                      },
                      error: function(error) {
                        console.log(error);
                        
                      }
                    });
            },
            eventClick: function(info) { // si se hace click en un evento
                    // igualamos el id del evento a la variable id,
                    var id = info.event.id; 
                    var tipo = info.event.extendedProps.tipo;

                    if(tipo == 'tarea'){
                      window.location.href = "{{ route('tareas.show', '') }}" + '/' + id;
                    }else{
                    window.location.href = "{{ route('anuncios.show', '') }}" + '/' + id;
                    }

            },

            droppable : true, // this allows things to be dropped onto the calendar !!!
            drop      : function(info) {
              // is the "remove after drop" checkbox checked?
              if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
              }
            },

          });
       
        




        calendar.render(); 
       //  $('#calendar').fullCalendar()  //! este tira error noc si sea necesario quitar si estorba

      })
    </script>
@stop