<?php require 'views/header.php';?>
<?php require 'views/navEncargado.php';?>
<head>
<meta charset='utf-8' />
<link href='../fullcalendar/main.css' rel='stylesheet' />
<script src='../fullcalendar/main.js'></script>
<script src='../fullcalendar/locales/es.js'></script>
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'es';
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialDate: '2021-07-11',
      locale: initialLocaleCode,
      navLinks: true, // can click day/week names to navigate views
      businessHours: true,
      selectable: true,
      events: [<?php 
            include_once 'models/vehiculo.php';
                foreach($this->vehiculos as $row) {
                    $vehiculo = new Vehiculo();
                    $vehiculo = $row;
                
            ?>

            {
            title: "service: <?php echo $vehiculo->patente; ?>",
            start: "<?php echo $vehiculo->service; ?>"
            },

            <?php } ?>
      ]
    });

    calendar.render();
  });

</script>
<style>

  #calendar {
    max-width: 1000px;
    margin: 0 auto;
    margin-top:100px;
  }

</style>
</head>


  <div id='calendar'></div>


<?php require 'views/footer.php';?>
