<?php require 'views/header.php';?>
<?php require 'views/navSupervisor.php';?>
<?php   include_once 'models/proforma.php';
include_once 'models/vehiculo.php';?>

    <div style="display:flex; justify-content:space-around;margin-top:100px;flex-wrap:wrap;align-content:space-around;">
        <div style="height: 400px;width:400px;margin-bottom:50px;">
            <canvas id="vehiculosK" width="400" height="400" ></canvas>
        </div>

        <div style="height: 400px;width:400px">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>

        <div style="height: 400px;width:400px">
            <canvas id="myChart4" width="400" height="400"></canvas>
        </div>

        <div style="height: 400px;width:400px">
            <canvas id="myChart3" width="400" height="400"></canvas>
        </div>
        
        <div style="height: 400px;width:400px">
            <canvas id="myChart3" width="400" height="400"></canvas>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js"
        integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var ctx = document.getElementById('vehiculosK').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php 
                    
                    foreach($this->vehiculos as $row) {
                    $vehiculos = new Vehiculo();
                    $vehiculos = $row;
                    ?>
                    '<?php echo $vehiculos->modelo." ". $vehiculos->patente?>',
                    <?php } ?>

                ],
                datasets: [{
                    label: 'Kilometraje',
                    data: [ 
                        <?php 
                    
                    foreach($this->vehiculos as $row) {
                    $vehiculos = new Vehiculo();
                    $vehiculos = $row;
                    ?>
                    '<?php echo $vehiculos->kilometraje?>',
                    <?php } ?>
                    0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title:{
                    display: true,
                    text: 'Kilometraje'
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    <?php 
                    
                    foreach($this->items as $row) {
                    $items = new Proforma();
                    $proforma = $row;
                    ?>
                    '<?php echo $proforma->numero?>',
                    <?php } ?>

                ],
                datasets:  [{
                        label: 'Costeo Real',
                        data: [
                            <?php 
                        
                        foreach($this->items as $row) {
                        $items = new Proforma();
                        $proforma = $row;
                        ?>
                        '<?php echo $proforma->total_r?>',
                        <?php } ?>
                        ],
                        fill: false,
                        borderColor: 'rgba(255, 99, 132, 1)',
                        tension: 0.1
                    },{
                        label: 'Costeo Estimado',
                        data: [
                            <?php 
                    
                            foreach($this->items as $row) {
                            $items = new Proforma();
                            $proforma = $row;
                            ?>
                            '<?php echo $proforma->total_e?>',
                            <?php } ?>
                        ],
                        fill: false,
                        borderColor: 'rgba(54, 162, 235, 1)',
                        tension: 0.1
                    }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

     <script>
        var ctx = document.getElementById('myChart3').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php 
                    foreach($this->vehiculos as $row) {
                    $vehiculos = new Vehiculo();
                    $vehiculos = $row;
                    ?>
                    '<?php echo $vehiculos->modelo?>',
                    <?php } ?>

                ],
                datasets: [{
                    label: '# Años',
                    data: [ 
                        <?php 
                    foreach($this->vehiculos as $row) {
                    $vehiculos = new Vehiculo();
                    $vehiculos = $row;
                    ?>
                    '<?php echo $vehiculos->anio_fabricacion?>',
                    <?php } ?>
                    0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title:{
                    display: true,
                    text: 'Año de fabricacion'
                },
                scales: {
                    yAxes: [{

              stacked: false,
               ticks: {
                  min: 1990,
                  stepSize: 2022,
              }

          }]
                }
            }
        });
    </script>

    <script>
        var ctx = document.getElementById('myChart4').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: [
                    <?php 
                    foreach($this->vehiculos as $row) {
                    $vehiculos = new Vehiculo();
                    $vehiculos = $row;
                    ?>
                    '<?php echo $vehiculos->modelo?>',
                    <?php } ?>

                ],
                datasets: [{
                    label: '# of Votes',
                    data: [ 
                        <?php 
                    foreach($this->vehiculos as $row) {
                    $vehiculos = new Vehiculo();
                    $vehiculos = $row;
                    ?>
                    '<?php echo $vehiculos->max_combustible?>',
                    <?php } ?>
                    0],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                title:{
                    display: true,
                    text: 'combustible maximo'
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
<?php require 'views/footer.php';?>