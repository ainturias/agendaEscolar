@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Calendario</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Calendario</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
@stop

@section('content')
<div>
     <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->


    <!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Crear</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="descripcion de el evento">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
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
  
  <!-- /.content-wrapper -->

  {{-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}


</div>
@stop

@section('css')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/fontawesome-free/css/all.min.css">
    <!-- fullCalendar -->
    <link rel="stylesheet" href="css/fullcalendar/main.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/css/adminlte.min.css">

@stop

@section('js')
        <!-- jQuery -->
    <script src="js/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI -->
    <script src="js/jquery-ui/jquery-ui.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/js/adminlte.min.js"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/fullcalendar/main.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="js/js/demo.js"></script>
    <script>
    $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {
    
            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            }
    
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)
    
            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex        : 1070,
              revert        : true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            })
    
          })
        }
    
        ini_events($('#external-events div.external-event'))
    
        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date()
        var d    = date.getDate(),  
            m    = date.getMonth(),
            y    = date.getFullYear()
    
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;
    
        var containerEl = document.getElementById('external-events');
        var checkbox = document.getElementById('drop-remove');
        var calendarEl = document.getElementById('calendar');
    
        // initialize the external events
        // -----------------------------------------------------------------
    
        new Draggable(containerEl, {
          itemSelector: '.external-event',
          eventData: function(eventEl) {
            return {
              title: eventEl.innerText,
              backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
              borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
              textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
            };
          }
        });
        
       






          // capturamos el valor recibido de events y lo convertimos en json
          var tareas = @json($events);
          // aqui es donde se crea el calendario
          var calendar = new Calendar(calendarEl, {
            headerToolbar: {
              left  : 'prev,next today',
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
            editable  : true,
            eventDrop: function(info) { // si se mueve un evento
                    // igualamos el id del evento a la variable id, startDate a la variable startDate y endDate a la variable endDate
                    var id = info.event.id; 
                    var startDate = moment(info.event.start).format('YYYY-MM-DD HH:mm:ss');
                    var endDate = moment(info.event.end).format('YYYY-MM-DD HH:mm:ss');
                    // Hace una petición ajax para actualizar la fecha de inicio y fin de la tarea
                    $.ajax({
                      url: "{{ route('updateTarea', '')}}" + '/' + id,
                      type: 'PUT',
                      dataType: 'json',
                      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: {
                       // _token: $('meta[name="csrf-token"]').attr('content'), // Incluye el token CSRF en la solicitud
                        startDate: startDate,
                        endDate: startDate,
                      },
                      success: function(response) {
                        console.log(response);
                      },
                      error: function(error) {
                        console.log(error);
                        
                      }
                    });
            },
            eventClick: function(info) { // si se hace click en un evento
                    // igualamos el id del evento a la variable id,
                    var id = info.event.id; 
                    window.location.href = "{{ route('pagTarea', '') }}" + '/' + id;
                    // Hace una petición ajax para actualizar la fecha de inicio y fin de la tarea
                    // $.ajax({
                    //     url: "{{ route('showTarea', '')}}" + '/' + id,
                    //     type: 'GET',
                    //     dataType: 'json',
                    //     headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    //     success: function(response) {
                    //       window.location.href = "{{ route('pagTarea', '') }}" + '/' + response.id;
                    //     },
                    //     error: function(error) {
                    //       console.log(error);
                          
                    //     }
                    // });
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
        // $('#calendar').fullCalendar()
    
        /* ADDING EVENTS */
        var currColor = '#3c8dbc' //Red by default
        // Color chooser button
        $('#color-chooser > li > a').click(function (e) {
          e.preventDefault()
          // Save color
          currColor = $(this).css('color')
          // Add color effect to button
          $('#add-new-event').css({
            'background-color': currColor,
            'border-color'    : currColor
          })
        })
        $('#add-new-event').click(function (e) {
          e.preventDefault()
          // Get value and make sure it is not null
          var val = $('#new-event').val()
          if (val.length == 0) {
            return
          }
    
          // Create events
          var event = $('<div />')
          event.css({
            'background-color': currColor,
            'border-color'    : currColor,
            'color'           : '#fff'
          }).addClass('external-event')
          event.text(val)
          $('#external-events').prepend(event)
    
          // Add draggable funtionality
          ini_events(event)
    
          // Remove event from text input
          $('#new-event').val('')
        })
      })
    </script>
@stop